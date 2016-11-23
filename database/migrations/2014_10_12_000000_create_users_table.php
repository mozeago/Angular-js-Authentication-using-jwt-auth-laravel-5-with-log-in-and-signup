<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('user_gender_id');
            $table->string('user_DOB');
            $table->string('brach_id');
            $table->string('user_supervisor_id');
            $table->string('user_type');
            $table->string('account_name');
            $table->string('active');
            $table->string('is_user_deleted');
            $table->string('created_by_userid');
            $table->string('modified_by_usser_id');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
