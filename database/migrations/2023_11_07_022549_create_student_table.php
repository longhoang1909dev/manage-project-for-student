<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student', function (Blueprint $table) {
            $table->increments('stu_id');
            $table->text('stu_password');
            $table->text('stu_avt')->nullable();
            $table->text('stu_desc');
            $table->text('stu_name');
            $table->integer('stu_phone');
            $table->text('stu_major');
            $table->text('stu_email');
            $table->text('stu_nickname')->nullable();
            $table->date('stu_born');
            $table->text('stu_status')->default('0');
            $table->text('role')->default('0');
            $table->integer('group_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
