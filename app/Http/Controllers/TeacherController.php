<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Teacher;

use App\Models\Student;

use App\Models\Status;

use App\Models\File;

use App\Models\Notification;

use App\Models\Project;






class TeacherController extends Controller
{
    private $teacher;
    private $student;
    private $changeStatus;
    private $file;
    private $notification;
    private $project;




    public function __construct()
    {
        $this->teacher = new Teacher();

        $this->student = new Student();

        $this->changeStatus = new Status();

        $this->file = new File();

        $this->notification = new Notification();

        $this->project = new Project();




    }

    public function getAllProject()
    {

        $id = session('id');

        $studentData = $this->student->getDataStudent($id);

        $studentData = $studentData[0];

        if ($studentData->stu_status == 0) {
            $allProject = $this->teacher->getAllProject();
            return view('students.register', compact('allProject', 'studentData'));
        } elseif ($studentData->stu_status == 1) {
            return view('error.requestJoinProject', compact('studentData'));
        } elseif ($studentData->stu_status == 2) {
            return redirect()->route('student.register_attend')->with(['studentData' => $studentData]);

        } elseif ($studentData->stu_status == 3) {
            return view('error.requestJoinGroup', compact('studentData'));
        } else {
            return view('error.registered', compact('studentData'));
        }
    }

    public function dashboard()
    {
        $t_id = session('t_id');

        $dataTeacher = $this->teacher->getDataTeacher($t_id);

        $dataTeacher = $dataTeacher[0];

        $totalStudentRegis = $this->teacher->getToltalStudentRegis();

        $totalProject = $this->teacher->getTotalProject();

        $totalTeacher = $this->teacher->getTotalTeacher();

        $totalStudentNotRegis = $this->teacher->getToltalStudentNotRegis();

        return view('teachers.TE_dashboard', compact('dataTeacher', 'totalStudentRegis', 'totalProject', 'totalTeacher', 'totalStudentNotRegis'));

    }

    public function getInfoTeacher()
    {
        $t_id = session('t_id');

        $dataTeacher = $this->teacher->getDataTeacher($t_id);

        $dataTeacher = $dataTeacher[0];

        $dataTeacher_skill = $this->teacher->getDataTeacherSkill($t_id);

        $dataTeacher_ost = $this->teacher->getDataTeacherOst($t_id);

        // dd($dataTeacher_ost);

        return view('teachers.infoTeacher', compact('dataTeacher', 'dataTeacher_skill', 'dataTeacher_ost'));
    }

    public function getAllStudentRegis()
    {
        $t_id = session('t_id');

        $dataTeacher = $this->teacher->getDataTeacher($t_id);

        $dataTeacher = $dataTeacher[0];

        $dataStudentRegis = $this->teacher->studentRegisProject($t_id);

        // dd($dataStudentRegis);

        return view('teachers.register_list', compact('dataTeacher', 'dataStudentRegis'));
    }

    public function seeInfoStudent($stu_id)
    {
        $t_id = session('t_id');

        $dataTeacher = $this->teacher->getDataTeacher($t_id);

        $dataTeacher = $dataTeacher[0];

        $dataStudentRequest = $this->student->getdataStudentRequest($stu_id);

        $dataStudentRequest = $dataStudentRequest[0];

        return view('students.infoStudent_see', compact('dataTeacher', 'dataStudentRequest'));

    }


    public function DeleteStudentFromProject($stu_id)
    {
        $checkgroupid = $this->student->getDataStudent($stu_id)[0]->group_id;

        $numbermember = $this->student->getMemberGroup($checkgroupid);

        $count = count($numbermember);

        // dd($count);

        if (!empty($checkgroupid) && $count == 1) {
            $this->changeStatus->changeStatus0($stu_id);
            $this->changeStatus->deleteGroup($checkgroupid);
        } else {
            $this->changeStatus->changeStatus0($stu_id);
        }




        return redirect()->route('teacher.register_list');
    }

    public function getAllStudentRequestProject()
    {
        $t_id = session('t_id');

        $dataTeacher = $this->teacher->getDataTeacher($t_id);

        $dataTeacher = $dataTeacher[0];

        $dataStudentRequest = $this->teacher->studentRequestPorject($t_id);


        return view('teachers.register_wait', compact('dataTeacher', 'dataStudentRequest'));

    }

    public function getObserveGroup()
    {
        $t_id = session('t_id');

        $dataTeacher = $this->teacher->getDataTeacher($t_id);

        $dataTeacher = $dataTeacher[0];

        $dataGroup = $this->teacher->getGroupToObserve($t_id);

        // dd($dataGroup);

        // dd($dataTeacher);

        return view('teachers.monitor_process', compact('dataTeacher', 'dataGroup'));
    }

    public function observeGroup($group_id)
    {

        $t_id = session('t_id');

        $dataTeacher = $this->teacher->getDataTeacher($t_id);

        $dataTeacher = $dataTeacher[0];

        $dataGroup = $this->student->getDataGroup($group_id);

        $dataGroup = $dataGroup[0];

        $memberGroup = $this->student->getMemberGroup($group_id);

        $dataFile = $this->file->getAllDataFile($group_id);

        // dd($dataFile);

        // dd($memberGroup);


        return view('teachers.monitor_group', compact('dataTeacher', 'dataGroup', 'memberGroup', 'dataFile'));
    }

    public function setNotification(Request $request, $group_id)
    {
        $set_noti = $request->long;

        $this->notification->setNotificationGroup($group_id, $set_noti);

        return back();
        // dd($group_id);
    }

    public function giveScoreGroup(Request $request, $group_id)
    {

        $score = $request->score;

        $this->notification->giveScoreGroup($group_id, $score);

        return back();
    }

    public function setMeeting(Request $request, $group_id)
    {

        $t_id = session('t_id');


        $date_meeting = $request->date('date')->format('d-m-Y');
        $stime_meeting = $request->date('stime')->format('H:i:s');
        $etime_meeting = $request->date('etime')->format('H:i:s');
        $link_meeting = $request->link;

        // dd($link_meeting);


        $this->notification->setMeeting($group_id, $date_meeting, $stime_meeting, $etime_meeting,$link_meeting,$t_id);

        return back();
        // dd($etime_meeting);
    }

    public function showChat()
    {
        $t_id = session('t_id');

        $dataTeacher = $this->teacher->getDataTeacher($t_id);

        $dataTeacher = $dataTeacher[0];

        $dataGroup = $this->notification->getDataGroupTeacher($t_id);


        $a = $this->project->getAllProject($t_id);
        // dd($dataGroup);

        return view('teachers.select_contact', compact('dataTeacher', 'dataGroup', 'a'));

    }

    public function showChatGroup(Request $request, $group_id)
    {
        $t_id = session('t_id');

        $dataTeacher = $this->teacher->getDataTeacher($t_id);

        $dataTeacher = $dataTeacher[0];

        $dataGroup = $this->notification->getDataGroupTeacher($t_id);

        $dataGroup1 = $this->student->getDataGroup($group_id);
        // dd($dataGroup1);

        $request->session()->put('group_now', $group_id);

        $dataMember = $this->student->getMemberGroup($group_id);
        $dataMessage = $this->notification->getMessage($group_id);



        // dd($dataMessage);

        return view('teachers.contact', compact('dataTeacher', 'dataGroup', 'dataMessage', 'dataMember', 'dataGroup1'));
    }

    public function handlePostMessage(Request $request)
    {

        $message = $request->message;

        if (empty($message)) {
            return back()->with('msg', 'Hãy điền trước khi bấm gửi');
        } else {

            $t_id = session('t_id');

            $group_id = session('group_now');

            $dataTeacher = $this->teacher->getDataTeacher($t_id);

            $dataTeacher = $dataTeacher[0];

            $t_name = $dataTeacher->t_nickname;

            $t_avt = $dataTeacher->t_avt;


            // dd($group_id);

            $this->notification->upMessagefromTeacher($t_id, $group_id, $message, $t_name, $t_avt);
            return back();
        }
    }

    public function showCalendar()
    {
        $t_id = session('t_id');

        $dataTeacher = $this->teacher->getDataTeacher($t_id);

        $dataTeacher = $dataTeacher[0];

        $dataCalender = $this->notification->getCalenderMeetingTeacher($t_id);

        // dd($dataCalender);

        return view('teachers.calendar', compact('dataTeacher','dataCalender'));
    }







}
