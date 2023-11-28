<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Teacher extends Model
{
    use HasFactory;
    
    public function getAllTeacher(){
        return DB::table('teacher')
        ->get();
    }

    public function getAllProject()
    {
        return DB::table('teacher')
            ->select('teacher.t_name', 'teacher.t_id', 'project.*')
            ->join('project', 'teacher.t_id', '=', 'project.t_id')
            ->get();
    }

    public function getDataTeacher($t_id)
    {
        return DB::table('teacher')
            ->select('*')
            ->where('t_id', '=', $t_id)
            ->get();
    }

    public function getDataTeacherSkill($t_id){
        return DB::table('teacher_skill')
        ->select('teacher_skill.t_skill', 'teacher_skill.t_skill_detail')
        ->where('t_id','=',$t_id)
        ->whereNotNull('teacher_skill.t_skill')
        ->get();
    }

    public function getDataTeacherOst($t_id){
        return DB::table('teacher_skill')
        ->select('teacher_skill.t_ost')
        ->where('t_id','=',$t_id)
        ->whereNotNull('teacher_skill.t_ost')
        ->get();
    }

    public function getToltalStudentRegis()
    {
        return  DB::table('student')
            ->select(DB::raw('count(student.stu_id) as total'))
            ->where('student.stu_status', '!=', 0)
            ->get();
    }


    public function getTotalProject()
    {
        return  DB::table('project')
            ->select(DB::raw('count(project.p_id) as total'))
            ->get();
    }


    public function getTotalTeacher()
    {
        return  DB::table('teacher')
            ->select(DB::raw('count(teacher.t_id) as total'))
            ->get();
    }

    public function getToltalStudentNotRegis()
    {
        return  DB::table('student')
            ->select(DB::raw('count(student.stu_id) as total'))
            ->where('student.stu_status', '=', 0)
            ->get();
    }

    public function studentRegisProject($t_id)
    {
        return DB::table('student')
            ->select('student.*', 'project.p_name')
            ->join('project', 'project.p_id', '=', 'student.p_id')
            ->where('student.t_id', '=', $t_id)
            ->where('stu_status', '>', 1)
            ->get();
    }

    public function studentRequestPorject($t_id)
    {
        return   DB::table('student')
            ->select('student.*', 'project.p_name')
            ->join('project', 'project.p_id', '=', 'student.p_id')
            ->where('student.t_id', '=', $t_id)
            ->where('stu_status', '=', 1)
            ->get();
    }

    public function getGroupToObserve($t_id)
    {
        return    DB::table('student_group')
            ->select('student_group.*', 'project.p_name')
            ->join('project', 'student_group.p_id', '=', 'project.p_id')
            ->where('student_group.t_id', '=', $t_id)
            ->orderBy('student_group.p_id', 'desc')
            ->get();
    }
}
