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
        Schema::create('group_rate', function (Blueprint $table) {
            $table->increments('rate_id');
            $table->integer('group_id');
            $table->text('rate_noti')->nullable();
            $table->integer('rate_score')->nullable();
            $table->timestamps();
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_rate');
    }
};
