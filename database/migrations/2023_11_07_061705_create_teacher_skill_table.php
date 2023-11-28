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
        Schema::create('teacher_skill', function (Blueprint $table) {
            $table->increments('t_skill_id');
            $table->integer('t_id');
            $table->text('t_skill')->nullable();
            // $table->integer('t_skill_detail')->nullable();
            $table->text('t_ost')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_skill');
    }
};
