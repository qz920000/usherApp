<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSavedUshersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saved_ushers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('saved_username');
            $table->integer('userid');
            $table->integer('saved_userid');
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
        Schema::drop('saved_ushers');
    }
}
