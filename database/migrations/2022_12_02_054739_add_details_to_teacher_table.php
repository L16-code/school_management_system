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
        Schema::table('teacher', function (Blueprint $table) {
            $table->tinyInteger('role_as')->deafult('0')->comment('0=users,1=admin');
            $table->tinyInteger('status')->deafult('1')->comment('1=active,0=inactive');
            $table->tinyInteger('is_delete')->deafult('0')->comment('1=delete,0=active');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teacher', function (Blueprint $table) {
            //
        });
    }
};
