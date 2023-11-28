<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Status;
use App\Models\Notification;



use Illuminate\Contracts\Cache\Store;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;


class StudentController extends Controller
{

    private $student;


    private $teacher;

    private $changeStatus;

    private $notification;



    public function __construct()
    {
        $this->student = new Student();

        $this->teacher = new Teacher();

        $this->changeStatus = new Status();

        $this->notification = new Notification();
    }

    public function dashboard()
    {

        $id = session('id');

        $studentData = $this->student->getDataStudent($id);

        $studentData = $studentData[0];

        // dd($studentData);

        return view('students.dashboard', compact('studentData'));
    }

    public function getInfoStudent(Request $request)
    {
        $id = session('id');

        $studentData = $this->student->getDataStudent($id);

        $studentData = $studentData[0];


        $studentDataDetail = $this->student->getDataDetail($id);

        // dd(count($studentDataDetail));

        // dd($request);
        return view('students.infoStudent', compact('studentDataDetail', 'studentData'));
    }


    public function updateInfoStudent(Request $request)
    {

        $id = session('id');

        $studentData = $this->student->getDataStudent($id);

        $studentData = $studentData[0];

        dd($request->nick_name);

        // if ($request->hasFile('img_change')) {
            
        //     $stu_avt_change = $request->file('img_change')->getClientOriginalName();
        //     $request->file('img_change')->storeAs('public/image', $stu_avt_change);
            
        //     dd($stu_avt_change);
        // }else{
        //     $stu_desc_change = $request->desc;
            
        //     dd($stu_desc_change);
            
        // }
        
        
        
        // $stu_nickname = $request->nick_name;
        // dd($stu_nickname);

        // $this->student->updateInfo($id,$stu_desc_change,$stu_nickname,);
        
        // dd($array);


        return back();
        // dd($request->stu_skill);


    }

    public function requestJoinGroup($group_id)
    {
        $id = session('id');

        $studentData = $this->student->getDataStudent($id);

        $studentData = $studentData[0];



        $this->changeStatus->changeStatus3($id, $group_id);

        return view('error.requestJoinGroup', compact('studentData'));
    }

    public function cancelRequest(){
        $id = session('id');

        $this->changeStatus->changeStatus0($id);

        return redirect()->route('student.register');
    }

    public function cancelRequestGroup(){
        $id = session('id');

        $this->changeStatus->changeStatus2($id);

        return redirect()->route('student.register');
    }

    

    public function seeInfoRequest($stu_id)
    {
        $id = session('id');

        $studentData = $this->student->getDataStudent($id);

        $studentData = $studentData[0];

        $dataStudentRequest = $this->student->getdataStudentRequest($stu_id);

        $dataStudentRequest = $dataStudentRequest[0];
        // dd($dataStudentRequest);

        return view('students.InfoStudent_see', compact('studentData', 'dataStudentRequest'));
    }

    public function reSelectProject(){
        $id = session('id');

        $studentData = $this->student->getDataStudent($id);

        $studentData = $studentData[0];

        // $this->changeStatus->reSelectProject($id);
        $this->changeStatus->changeStatus0($id);

        return redirect()->route('student.register');
    }


    public function getCalender()
    {
        $id = session('id');

        $studentData = $this->student->getDataStudent($id);

        $studentData = $studentData[0];

        $dataCalender = $this->notification->getCalenderMeeting($studentData->group_id);

        // dd($dataCalender);

        return view('students.calendar', compact('studentData','dataCalender'));
    }

    public function showChat()
    {
        $id = session('id');

        $studentData = $this->student->getDataStudent($id);

        $studentData = $studentData[0];

        $group_id = $studentData->group_id;

        // $stu_nickname = $studentData->stu_nickname;

        
        if (empty($group_id) || $studentData->stu_status !=4) {
            return view('error.errorContact', compact('studentData'));
        } else {
            $dataNameMessage = $this->notification->getNameMessage($group_id);
            
            $dataGroup1 = $this->student->getDataGroup($group_id);
            
            $dataMessage = $this->notification->getMessage($group_id);
            
            // dd($dataMessage);
            return view('students.contact', compact('studentData', 'dataGroup1', 'dataMessage','dataNameMessage'));
        }
    }

    public function handlePostMessage(Request $request)
    {

        $message = $request->message;

        $stu_id = session('id');

        $studentData = $this->student->getDataStudent($stu_id);

        $studentData = $studentData[0];

        $group_id = $studentData->group_id;

        $name = $studentData->stu_nickname;
        $avt = $studentData->stu_avt;

        // dd($avt);

        // dd($group_id);

        $this->notification->upMessagefromStudent($group_id, $message, $stu_id,$name,$avt);
        return back();
    }

    public function seeInfoAllTeacher(){
        $stu_id = session('id');

        $studentData = $this->student->getDataStudent($stu_id);

        $studentData = $studentData[0];

        $dataAllTeacher = $this->teacher->getAllTeacher();

        // dd($dataAllTeacher);

        return view ('students.infoAllTeacher',compact('studentData','dataAllTeacher'));
    }

    public function SeeInfoTeacherDetail($t_id){

        $dataTeacher = $this->teacher->getDataTeacher($t_id);

        $dataTeacher = $dataTeacher[0];

        $dataTeacher_skill = $this->teacher->getDataTeacherSkill($t_id);

        $dataTeacher_ost= $this->teacher->getDataTeacherOst($t_id);


        // dd($dataTeacher_skill);

        $stu_id = session('id');

        $studentData = $this->student->getDataStudent($stu_id);

        $studentData = $studentData[0];
        return view('teachers.infoTeacher_see',compact('studentData','dataTeacher','dataTeacher_skill','dataTeacher_ost'));
    }
}
