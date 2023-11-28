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
        Schema::create('student_group', function (Blueprint $table) {
            $table->increments('group_id');
            $table->text('group_leader');
            $table->text('group_avt')->nullable();
            $table->text('group_name');
            $table->integer('p_id');
            $table->integer('t_id');
            $table->integer('group_number');
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_group');
    }
};
