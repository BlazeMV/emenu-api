<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cafe_id')->index()->unsigned();
            $table->bigInteger('table_id')->index()->unsigned();
            $table->bigInteger('customer_id')->index()->unsigned();
            $table->bigInteger('approved_employee_id')->index()->unsigned()->nullable();
            $table->string('status');
            $table->timestamp('from');
            $table->timestamp('to');
            $table->string('remarks')->nullable();
            $table->timestamps();

            $table->foreign('table_id')->references('id')->on('tables');
            $table->foreign('cafe_id')->references('id')->on('cafes');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('approved_employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
