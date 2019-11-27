<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('type');
            $table->string('status');
            $table->rememberToken();
            $table->timestamps();
        });

        $admin = new \App\Models\User([
            'name' => 'Admin',
            'email' => 'admin@emanu.mv',
            'username' => 'admin',
            'type' => 'admin',
            'status' => 'active',
            'password' => \Illuminate\Support\Facades\Hash::make('admin'),
        ]);
        $admin->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
