<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('user_id');
            $table->string('gender');
            $table->string('dob');
            $table->string('ethnicity');
            $table->string('zip');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('phone1');
            $table->string('phone2'); 
            $table->integer('mainimage_id'); 
            $table->string('mainimagename'); 
            $table->string('cvname');                    
            $table->string('bank');
            $table->string('accountnum'); 
            $table->string('creditcard');
            $table->string('ccnumber'); 

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
        Schema::drop('clients');
    }
}
