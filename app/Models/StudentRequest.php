<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class StudentRequest extends Model
{
    use HasFactory;

    public function getStudentRequestGroup($group_id)
    {
        return   DB::table('student')
            ->select('*')
            ->where('stu_status', '=', 3)
            ->where('group_id', '=', $group_id)
            ->get();
    }

    
}
