<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
             $table->Integer('payment_id');
            $table->Integer('client_id');
            $table->Integer('event_id');
            $table->Integer('noofushers');
            $table->float('rate');
            $table->float('unitrate');
            $table->float('amount_paid');
            $table->timestamp('date_paid');
            $table->string('status');//open,in process/paid/completed
            $table->string('paymenttype'); //cc, bank
            $table->string('ccnumber');
            $table->string('accountnumber');
            $table->string('bankname');
            $table->string('cctype');
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
        Schema::drop('invoices');
    }
}
