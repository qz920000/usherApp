<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('user_id');
            $table->string('name');
            $table->string('zip');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('phone1');
            $table->string('phone2'); 
            $table->integer('mainimage_id'); 
            $table->string('mainimagename'); 
            $table->timestamp('event_date'); 
            $table->string('time_from');
            $table->string('time_to'); 
            $table->string('duration'); 
            $table->float('event_rate'); 
            $table->text('description');
            $table->text('special_instructions');              
            $table->string('status')->default('Open');//open,full,completed/past
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
        Schema::drop('events');
    }
}
