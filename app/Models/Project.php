<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Project extends Model
{
    use HasFactory;

    public function getNameProject($p_id){
        return DB::table('project')
            ->select('p_name')
            ->where('p_id',$p_id)
            ->get();
    }

    public function getAllProject($t_id){
        return DB::table('project')
        ->select('*')
        ->where('project.t_id','=',$t_id)
        ->get();
    }

    public function createNewProject($t_id,$p_name,$p_request,$p_major,$p_quantity){
        return DB::table('project')->insert([
            't_id' => $t_id,
            'p_name' => $p_name,
            'p_request' => $p_request,
            'p_major' => $p_major,
            'p_quantity' => $p_quantity

        ]);
    }

    public function countp_id($t_id){
        return DB::table('project')
        ->select('*')
        ->where('project.t_id','=',$t_id)
        ->orderBy('project.p_id', 'desc')
        ->first();
    }


    public function handleOption($title_o,$request_o){
        return DB::table('dataprojectoptional')
            ->insert([
                'p_id'=>null,
                'p_title_o'=>$title_o,
                'p_request_o'=>$request_o
            ]);
    }

    public function getdataOption(){
        return DB::table('dataprojectoptional')
        ->where('p_id',null)
        ->get();
    }

    public function updatep_id($p_id){
        return DB::table('dataprojectoptional')
        ->where('p_id',null)
        ->update([
            'p_id'=>$p_id
        ]);
    }

    public function getdataoptional(){
        return DB::table('dataprojectoptional')
        ->get();
    }

    public function deleteProject($p_id){
        return DB::table('project')
        ->where('p_id',$p_id)
        ->delete();
    }

    public function getdataStudent($p_id){
        return DB::table('student')
        ->where('p_id',$p_id)
        ->get();
    }

}
