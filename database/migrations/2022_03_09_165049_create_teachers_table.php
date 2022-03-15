<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->integer('school_id');
            $table->string('fname');
            $table->string('lname')->nullable();
            $table->string('nickname')->nullable();
            $table->integer('birth')->nullable();
            $table->string('subject')->nullable();
            $table->string('mobile')->nullable();
            $table->string('side')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
};
