<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Studentmarks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentmarks', function (Blueprint $table) {
            $table->string('stu_id')->unique();
            $table->string('name');
            $table->string('email');
            $table->integer('total_class');
            $table->integer('present');
            $table->integer('groupid');
            $table->integer('review1');
            $table->integer('review2');
            $table->integer('final');
            $table->rememberToken();
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
        //
    }
}
