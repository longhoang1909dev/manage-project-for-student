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
        Schema::create('student_skill', function (Blueprint $table) {
            $table->increments('stu_skill_id');
            $table->integer('stu_id');
            $table->text('stu_skill')->nullable();
            $table->integer('stu_skill_detail')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studen_skill');
    }
};
