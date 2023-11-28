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
        Schema::create('meeting_calender', function (Blueprint $table) {
            $table->increments('meeting_id');
            $table->integer('group_id');
            $table->integer('p_id');
            $table->integer('t_id');
            $table->date('day')->nullable();
            $table->date('time')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meeting_calender');
    }
};
