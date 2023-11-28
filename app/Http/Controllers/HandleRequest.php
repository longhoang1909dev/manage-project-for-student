<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Status;
use App\Models\File;

use App\Models\StudentRequest;

class HandleRequest extends Controller
{
    private $student;


    private $changeStatus;

    private $file;

    private $studentRequest;




    public function __construct()
    {
        $this->student = new Student();

        $this->changeStatus = new Status();

        $this->file = new File();

        $this->studentRequest = new StudentRequest();
    }

    public function handleRequestJoinGroup($id,$status){
        if($status == 1){
            $this->changeStatus->changeStatus4($id);
        }else{
            $this->changeStatus->changeStatus2($id);
        }

        return back();
    }

    public function requestJoinProject(Request $request, $p_id, $t_id)
    {

        $id = session('id');

        $studentData = $this->student->getDataStudent($id);

        $studentData = $studentData[0];

        // dd($p_id);

        // $this->teacher->changeStatus($id, 1, $p_id, $t_id);

        $this->changeStatus->changeStatus1($id, $p_id, $t_id);


        return back();
        // dd($this->student->getDataStudent($id)[0]->stu_status);
        //     if ($studentData->stu_status == 1) {
        //         return redirect()->route('student.register_attend')->with(['studentData' => $studentData]);
        //     }
        //     else{
        //     }
    }

    public function handleRequestJoinProject($id,$status){
        if($status == 1){
            $this->changeStatus->changeStatus2($id);
        }else{
            $this->changeStatus->changeStatus0($id);
        }

        return back();
    }

   
}
