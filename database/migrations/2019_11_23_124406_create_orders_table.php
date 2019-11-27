<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cafe_id')->index()->unsigned();
            $table->bigInteger('table_id')->index()->unsigned();
            $table->bigInteger('customer_id')->index()->unsigned();
            $table->bigInteger('serving_employee_id')->nullable()->index()->unsigned();
            $table->string('status');
            $table->string('remarks');
            $table->timestamps();

            $table->foreign('table_id')->references('id')->on('tables');
            $table->foreign('cafe_id')->references('id')->on('cafes');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('serving_employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
