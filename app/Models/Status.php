<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Status extends Model
{
    use HasFactory;

    // 1 - after request join project
    // 2 - after accept join project (teacher change)
    // 3 - after request join group 
    // 4 - after accept join group or create gorup (student change)

    public function changeStatus0($id)
    {
        return DB::table('student')
            ->where('stu_id', $id)
            ->update([
                'stu_status' => 0,
                'p_id' => null,
                't_id' => null,
                'group_id'=>null,
                'stu_leader' =>null
            ]);
    }


    public function changeStatus1($id, $p_id, $t_id)
    {
        return DB::table('student')
            ->where('stu_id', $id)
            ->update([
                'stu_status' => 1,
                'p_id' => $p_id,
                't_id' => $t_id,
            ]);
    }


    public function changeStatus2($id)
    {
        return DB::table('student')
            ->where('stu_id', $id)
            ->update([
                'stu_status' => 2,
                'group_id' => 0,
            ]);
    }

    public function changeStatus3($id, $group_id)
    {
        return DB::table('student')
            ->where('stu_id', $id)
            ->update([
                'stu_status' => 3,
                'group_id' => $group_id
            ]);
    }

    public function changeStatus4($id)
    {
        return DB::table('student')
            ->where('stu_id', $id)
            ->update([
                'stu_status' => 4,
            ]);
    }

    public function leaderStatus($id)
    {
        return DB::table('student')
            ->where('stu_id', $id)
            ->update([
                'stu_leader' => 1,
            ]);
    }

    public function leaveGroup($id)
    {
        return DB::table('student')
            ->where('stu_id', $id)
            ->update([
                'group_id' => null,
                'stu_leader' =>null
            ]);
    }

    public function deleteGroup($group_id){
        return DB::table('student_group')
        ->where('group_id',$group_id)
        ->delete();
    }

    


    
}
