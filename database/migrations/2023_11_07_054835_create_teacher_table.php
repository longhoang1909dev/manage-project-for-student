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
        Schema::create('teacher', function (Blueprint $table) {
            $table->increments('t_id');
            $table->text('t_name');
            $table->text('t_avt')->nullable();
            $table->text('t_password');
            $table->text('t_desc');
            $table->integer('t_phone');
            $table->text('t_email');
            $table->date('t_born');
            $table->text('t_major');
            $table->integer('role')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher');
    }
};
