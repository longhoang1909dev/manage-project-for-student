<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Student extends Authenticatable
{
    use HasFactory;

    public function getDataStudent($id)
    {
        return DB::table('student')
            ->where('stu_id', $id)
            ->get();
    } // get data not contain stu_skill

    public function getDataDetail($id)
    {
        return DB::table('student')
            ->join('student_skill', 'student.stu_id', '=', 'student_skill.stu_id')
            ->where('student.stu_id', '=', $id)
            ->get();
    } // fucntion using in ìnfo student 


    public function getDataGroup($group_id)
    {
        return   DB::table('student_group')
            ->select('student_group.*', 'project.p_name', 'teacher.t_name')
            ->join('project', 'project.p_id', '=', 'student_group.p_id')
            ->join('teacher', 'teacher.t_id', '=', 'student_group.t_id')
            ->where('student_group.group_id', '=', $group_id)
            ->get();
    }


    public function createSkill($id, $stu_skill, $stu_skill_detail)
    {
        return DB::table('student_skill')
            ->insert([
                'stu_id' => $id,
                'stu_skill' => $stu_skill,
                'stu_skill_detail' => $stu_skill_detail,
                'stu_id' => $id,
               'created_at' => date('Y-m-d H-s-i') 
            ]);
    }

    public function updateInfoAvatar($stu_id,$stu_avt){
        return DB::table('student')
        ->where('stu_id',$stu_id)
        ->update([
            'stu-avt'=>$stu_avt,
        ]);
    }

    public function updateInfoDesc($stu_id,$stu_desc){
        return DB::table('student')
        ->where('stu_id',$stu_id)
        ->update([
            'stu_desc'=> $stu_desc,
        ]);
    }

    public function updateInfoNickname($stu_id,$stu_nickname){
        return DB::table('student')
        ->where('stu_id',$stu_id)
        ->update([
            'stu_nickname'=> $stu_nickname,
        ]);
    }

    

    public function getNotiGroup($group_id)
    {
        return DB::table('group_rate')
        ->select('rate_noti', 'created_at')
        ->where('group_id','=',$group_id)
        ->whereNotNull('rate_noti')
        ->orderByDesc('created_at')
        ->first();
    }

  

    public function getScoreGroup($group_id)
    {
        return DB::table('group_rate')
        ->select('rate_score', 'created_at')
        ->where('group_id','=',$group_id)
        ->whereNotNull('rate_score')
        ->get();
    }

    public function getMemberGroup($groupid)
    {
        return DB::table('student')
            ->select('student.stu_name', 'student.stu_avt','student.stu_status','student.stu_id','stu_leader')
            ->where('student.group_id', '=', $groupid)
            ->get();
    }

    public function getAllGroup($p_id)
    {
        return DB::table('student_group')
            ->select(
                'student_group.group_number',
                'student_group.group_request',
                'student_group.group_leader',
                'student_group.group_name',
                'student_group.group_quantity',
                'student_group.group_id',
                'project.p_name',
                'teacher.t_name',
                'teacher.t_id',
                'project.p_id'
            )
            ->join('project', 'project.p_id', '=', 'student_group.p_id')
            ->join('teacher', 'student_group.t_id', '=', 'teacher.t_id')
            ->where('student_group.p_id', '=', $p_id)
            ->get();
    }

    //fucntion will show all group have same group 


    //this function will set group for student

    public function createGroup($group_leader, $group_avt, $group_request, $p_id, $group_quantity, $group_number, $group_name, $t_id)
    {
        return DB::table('student_group')
            ->insert([
                'group_leader' => $group_leader,
                'group_avt' => $group_avt,
                'group_request' => $group_request,
                'p_id' => $p_id,
                'group_quantity' => $group_quantity,
                'group_number' => $group_number,
                'group_name' => $group_name,
                't_id' => $t_id,
            ]);
    }
    //function will insert in database 


    public function getGroupIdLastest()
    {
        return DB::table('student_group')
            ->select('*')
            ->orderBy('group_id', 'desc')
            ->first();
    }

    public function updateGroupId($id, $group_id)
    {
        return DB::table('student')
            ->where('stu_id', $id)
            ->update([
                'group_id' => $group_id,
            ]);
    }

    public function countAllGroupId()
    {
        return  DB::table('student_group')
            ->select(DB::raw('count(student_group.group_id) as number'))
            ->get();
    }

    public function countGroupNumber($p_id)
    {
        return  DB::table('student_group')
            ->select(DB::raw('count(student_group.group_id) as number'))
            ->where('student_group.p_id', '=', $p_id)
            ->get();
    }
    // count the number of group with project

    public function getDataUpdate($group_id)
    {
        return DB::table('storage_file')
            ->select('student.stu_name', 'storage_file.*')
            ->join('student', 'student.stu_id', '=', 'storage_file.stu_id')
            ->where('storage_file.group_id', '=', $group_id)
            ->get();
    }

    public function getdataStudentRequest($stu_id){
        return DB::table('student')
        ->where('stu_id',$stu_id)
        ->get();
    }
}
