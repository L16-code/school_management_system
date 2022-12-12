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
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('lname');
            $table->string('student_id');
            $table->string('secemail')->unique();
            $table->string('gender');
            // $table->string('email')->unique();
            $table->string('phone');
            $table->date('dob');
            // $table->string('password');
            $table->string('img');
            $table->string('address');
            $table->string('state');
            $table->bigInteger('zip');
            $table->string('city');
            $table->tinyInteger('is_delete')->deafult('0')->comment('1=delete,0=active');
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
        Schema::dropIfExists('student');
    }
};
