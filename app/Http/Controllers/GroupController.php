<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Status;
use App\Models\File;
use App\Models\StudentRequest;
use App\Models\Project;





use Illuminate\Contracts\Cache\Store;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;

class GroupController extends Controller
{

    private $student;

    private $teacher;

    private $changeStatus;

    private $file;

    private $studentRequest;

    private $project;




    public function __construct()
    {
        $this->student = new Student();

        $this->changeStatus = new Status();

        $this->file = new File();

        $this->studentRequest = new StudentRequest();

        $this->teacher = new Teacher();

        $this->project = new Project();
    }


    public function studentGroup()
    {

        $id = session('id');

        $studentData = $this->student->getDataStudent($id); // pass data to header

        $studentData = $studentData[0]; // convert to object

        // dd($studentData);

        $checkstatus = $studentData->stu_status; // check status student join group yet



        if ($checkstatus != 4) {
            return view('error.notJoinGroup', compact('studentData'));
        } else {
            $group_id = $studentData->group_id;

            $dataGroup = $this->student->getDataGroup($group_id);

            $dataNotiGroup = $this->student->getNotiGroup($group_id);
            $dataUpdateFile = $this->student->getDataUpdate($group_id);
            $dataScoreGroup = $this->student->getScoreGroup($group_id);

            $dataGroup = $dataGroup[0];

            // dd($dataScoreGroup);



            return view('students.groupSV', compact('studentData', 'dataGroup', 'dataNotiGroup', 'dataUpdateFile', 'dataScoreGroup'));
        }



        // dd($dataUpdateFile);

    }

    public function getInfoGroup()
    {
        $id = session('id');

        $studentData = $this->student->getDataStudent($id); // pass data to header

        $studentData = $studentData[0]; // convert to object

        $group_id = $studentData->group_id;

        // dd($group_id);

        $dataGroup = $this->student->getDataGroup($group_id);

        $dataGroup = $dataGroup[0];


        $memberGroup = $this->student->getMemberGroup($group_id);

        // dd($memberGroup);

        // return datagroup 

        // dd($infoGroup[0]->stu_name);

        return view('students.groupSV_detail', compact('studentData', 'dataGroup', 'memberGroup'));
    }

    public function getAllGroup()
    {

        $id = session('id');

        $studentData = $this->student->getDataStudent($id); // pass data to header

        $studentData = $studentData[0]; // convert to object

        $p_id = $studentData->p_id;

        $t_id = $studentData->t_id;

        // dd($t_id);
        $dataTeacher = $this->teacher->getDataTeacher($t_id);

        $allGroup = $this->student->getAllGroup($p_id);


        // dd($dataTeacher);

        // dd($t_id);

        return view('students.register_attend', compact('allGroup', 'studentData', 'dataTeacher'));
    }

    public function requestJoinGroup(Request $request, $group_id)
    {
        $id = session('id');

        $studentData = $this->student->getDataStudent($id);

        $studentData = $studentData[0];


        $this->changeStatus->changeStatus3($id, $group_id);

        return view('error.requestJoinGroup', compact('studentData'));
    }




    public function getCreateGroup()
    {

        $id = session('id');


        $studentData = $this->student->getDataStudent($id); // pass data to header

        $studentData = $studentData[0]; // convert to object

        $p_id = $studentData->p_id;

        $getProjectName = $this->project->getNameProject($p_id);

        // dd($getProjectName);


        $count = $this->student->countGroupNumber($p_id);

        $nextNumber = $count[0]->number + 1;


        // dd($nextNumber);
        return view('students.register_create', compact('studentData', 'nextNumber', 'getProjectName'));
    }

    public function handleCreateGroup(Request $request)
    {

        $id = session('id');

        $studentData = $this->student->getDataStudent($id); // pass data to header

        $studentData = $studentData[0]; // convert to object


        $group_leader = $request->group_leader;
        $group_avt = $request->file('group_avt')->getClientOriginalName();
        $group_request = $request->group_request;
        $p_id = $studentData->p_id;
        $group_quantity = $request->group_quantity;
        $group_number = $request->group_number;
        $group_name = $request->group_name;
        $t_id = $studentData->t_id;



        if ($request->hasFile('group_avt')) {
            $request->file('group_avt')->storeAs('public/image', $group_avt); // store image into

            $this->student->createGroup($group_leader, $group_avt, $group_request, $p_id, $group_quantity, $group_number, $group_name, $t_id);

            $group_id = $this->student->getGroupIdLastest();
            $group_id = $group_id->group_id;

            // dd($group_id);

            $this->student->updateGroupId($id, $group_id);

            $this->changeStatus->changeStatus4($id);

            $this->changeStatus->leaderStatus($id);
        } else {
            return 'deo co file';
        }

        return redirect()->route('student.groupSV');
    }

    public function getUpdateProgress()
    {

        $id = session('id');


        $studentData = $this->student->getDataStudent($id); // pass data to header

        $studentData = $studentData[0]; // convert to object

        $group_id = $studentData->group_id;

        $dataNotiGroup = $this->student->getNotiGroup($group_id);

        $dataFile = $this->file->getAllFile($group_id);


        return view('students.groupSV_update', compact('studentData', 'dataNotiGroup', 'dataFile'));
    }


    public function handleUpdateFile(Request $request)
    {

        $id = session('id');


        $studentData = $this->student->getDataStudent($id); // pass data to header

        $studentData = $studentData[0];

        $group_id = $studentData->group_id;

        $file_title = $request->file_title;
        $file_name = $request->file('file_upload')->getClientOriginalName();


        // dd($file_title);
        if ($request->hasFile('file_upload')) {
            $request->file('file_upload')->storeAs('public/file', $file_name);
            $this->file->saveFile($file_name, $file_title, $group_id, $id);
            return back();
        } else {
            return "deo co file";
        }
    }

    public function downloadFile(Request $request, $file)
    {
        $path = storage_path('app\public\file\\' . $file);
        // dd($path);
        return response()->download($path);
    }

    public function getRequestJoinGroup()
    {

        $id = session('id');


        $studentData = $this->student->getDataStudent($id); // pass data to header

        $studentData = $studentData[0];

        $group_id = $studentData->group_id;

        $dataStudentRequest = $this->studentRequest->getStudentRequestGroup($group_id);

        // dd($dataStudentRequest);

        return view('students.groupSV_request', compact('studentData', 'dataStudentRequest'));
    }

    public function leaveGroup()
    {
        $id = session('id');


        $studentData = $this->student->getDataStudent($id); // pass data to header

        $studentData = $studentData[0];

        if($studentData->stu_leader == 1){
            $this->changeStatus->changeStatus0($id);
            $this->changeStatus->deleteGroup($studentData->group_id);

        }else{
            $this->changeStatus->leaveGroup($id);
            $this->changeStatus->changeStatus2($id);
        }
        
        return redirect()->route('student.register');
    }

    public function DeleteStudentFromLeader($stu_id)
    {
        $id = session('id');


        $studentData = $this->student->getDataStudent($id); // pass data to header

        $studentData = $studentData[0];

        $this->changeStatus->leaveGroup($stu_id);
        $this->changeStatus->changeStatus2($stu_id);
        return back();
    }
}
