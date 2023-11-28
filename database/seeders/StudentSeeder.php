<?php

namespace Database\Seeders;

use Faker\Core\Number;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;



use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('student')
        //     ->insert([
        //         'stu_password' => '123456',
        //         'stu_avt' => '123456',
        //         'stu_desc' => 'longhoang gioi vai l',
        //         'stu_name' => Str::random('10'),
        //         'stu_phone' => '213123123',
        //         'stu_major' => 'CNTT',
        //         'stu_email' => Str::random('10').'@gmail.com',
        //         'stu_nickname' => Str::random('5'),
        //         'stu_born' => Number::random('2').'/'.Str::random('1').'/'.'200'.Str::random('1'),
        //         'stu_status' => '0',
        //         'role'=>'0',
        //         'group_id'=>'1'

        //     ]);
    }
}
