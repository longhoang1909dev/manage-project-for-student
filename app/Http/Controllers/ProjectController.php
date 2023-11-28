<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Status;
use App\Models\File;
use App\Models\Project;
use App\Models\StudentRequest;

class ProjectController extends Controller
{

    private $teacher;
    private $student;
    private $changeStatus;
    private $project;


    public function __construct()
    {
        $this->teacher = new Teacher();

        $this->student = new Student();

        $this->changeStatus = new Status();

        $this->project = new Project();
    }

    public function getAllProject()
    {

        $t_id = session('t_id');

        $dataTeacher = $this->teacher->getDataTeacher($t_id);

        $dataTeacher =  $dataTeacher[0];

        $dataProject = $this->project->getAllProject($t_id);

        $dataOptional = $this->project->getdataoptional();

        // dd($dataProject);

        return view('teachers.update', compact('dataTeacher', 'dataProject','dataOptional'));
    }

    public function createNewProject()
    {
        $t_id = session('t_id');

        $dataTeacher = $this->teacher->getDataTeacher($t_id);

        $dataTeacher =  $dataTeacher[0];

        // $p_id = $this->project->countP_id($t_id)->p_id;


        $dataOptional = $this->project->getdataOption();
        // dd($dataOptional);

        return view('teachers.update_new', compact('dataTeacher','dataOptional'));
    }

    public function handleCreateProject(Request $request)
    {
        $t_id = session('t_id');
        $p_name = $request->p_name;
        $p_request = $request->p_request;
        $p_major = $request->p_major;
        $p_quantity = $request->p_quantity;

        // dd($t_id);
        
        $this->project->createNewProject($t_id, $p_name,$p_request,$p_major,$p_quantity);

        $p_id = $this->project->countp_id($t_id)->p_id;
        if(count($this->project->getdataOption()) !=0){
            $this->project->updatep_id($p_id);
        }
        
        return redirect()->route('teacher.update');
    }


    public function handleNewOption(Request $request){
        $t_id = session('t_id');
        // $p_id = $this->project->countP_id($t_id)->p_id;
        
        $title_o = $request->title_o;
        $request_o = $request->request_o;

        $this->project->handleOption($title_o,$request_o);

        return back();
    }

    public function deleteProject($p_id){

        // return $p_id;
        $this->project->deleteProject($p_id);
        $dataStudent = $this->project->getdataStudent($p_id);
        
        
        
        foreach ($dataStudent as $key => $value) {
            $stu_id = $value->stu_id;
            $this->changeStatus->changeStatus0($stu_id);
        }
        
        return back();
        
    }

    
}
