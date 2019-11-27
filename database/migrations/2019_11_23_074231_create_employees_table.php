<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->bigInteger('user_id')->index()->unsigned();
            $table->bigInteger('cafe_id')->index()->unsigned();
            $table->bigInteger('full_name');
            $table->bigInteger('job_title');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cafe_id')->references('id')->on('cafes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
