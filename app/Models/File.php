<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class File extends Model
{
    use HasFactory;

    public function saveFile($file, $file_title, $group_id,$id)
    {
        return DB::table('storage_file')
            ->insert([
                'stu_id' => $id,
                'group_id' => $group_id,
                'file' => $file,
                'file_title' => $file_title,
                'created_at' => date('Y-m-d H:i:s')
            ]);
    }

    public function getAllFile($group_id)
    {
        return DB::table('storage_file')
            ->select('*')
            ->where('group_id', '=', $group_id)
            ->get();
    }

    public function getAllDataFile($group_id)
    {
        return DB::table('storage_file')
        ->select('storage_file.*', 'student.stu_name')
        ->join('student','storage_file.stu_id','=','student.stu_id')
        ->where('storage_file.group_id','=',$group_id
        )
        ->get();
    }
}
