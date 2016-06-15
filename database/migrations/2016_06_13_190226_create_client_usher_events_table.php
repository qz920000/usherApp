<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientUsherEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_usher_events', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('usher_id');
            $table->Integer('client_id');
            $table->Integer('event_id');
            $table->Integer('invoice_id');
            $table->float('rate');
            $table->float('unitrate');
            $table->float('amount_paid');
            $table->timestamp('date_paid');
            $table->string('status');//open,in process/paid/completed
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
        Schema::drop('client_usher_events');
    }
}
