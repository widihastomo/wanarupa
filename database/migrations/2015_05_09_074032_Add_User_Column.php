<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table){
            $table->string('gender')->nullable();
            $table->date('date_birth')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->integer('province_id')->unsigned()->nullable();
            $table->integer('phone_number')->nullable();
            $table->boolean('is_active');
            $table->integer('role');
            $table->integer('status_id')->unsigned();
            $table->boolean('inactive');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('users', function($table)
        {
            $table->dropColumn('gender');
            $table->dropColumn('date_birth');
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('province_id');
            $table->dropColumn('phone_number');
            $table->dropColumn('is_active');
            $table->dropColumn('role');
            $table->dropColumn('status_id');
            $table->dropColumn('inactive');

        });
	}

}
