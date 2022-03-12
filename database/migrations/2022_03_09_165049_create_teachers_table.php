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
            $table->foreign('teacher_id')
                    ->references('id')
                    ->on('teachers')
                    ->onCascade('delete');
            $table->string('fname');
            $table->string('lname')->nullable();
            $table->string('nickname')->nullable();
            $table->integer('birth')->nullable();
            $table->string('subject')->nullable();
            
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
