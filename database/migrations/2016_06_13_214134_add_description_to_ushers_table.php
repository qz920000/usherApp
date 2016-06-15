<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDescriptionToUshersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ushers', function (Blueprint $table) {
            $table->string('title');
            $table->string('username');
            $table->text('description'); 
            $table->string('school');
            $table->text('religion'); 
            $table->string('profession');
            $table->text('seeking'); 
            $table->string('education');
            //$table->text('description'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ushers', function (Blueprint $table) {
            //
        });
    }
}
