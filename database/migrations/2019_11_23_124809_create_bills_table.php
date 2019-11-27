<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('order_id')->index()->unsigned();
            $table->bigInteger('customer_id')->index()->unsigned();
            $table->bigInteger('employee_id')->index()->unsigned();
            $table->double('sub_total');
            $table->double('gst');
            $table->double('service_charge');
            $table->double('grand_total');
            $table->string('status');
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
