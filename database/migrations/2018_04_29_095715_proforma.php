<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Proforma extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
        public function up()
        {
            Schema::create('proforma', function(Blueprint $table){
                $table->increments('file_id')->unique();
                $table->string('filename');
                $table->string('topic');
                $table->integer('groupid');
                $table->integer('admin_verify')->default(0);
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
