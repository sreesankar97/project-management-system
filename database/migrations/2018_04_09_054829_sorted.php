<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('sorted', function (Blueprint $table) {


         $table->string('name');
         $table->string('email')->unique();
         $table->string('rollno')->unique();
         $table->string('cgpa');
         $table->string('group_id');

     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("sorted");
    }
}
