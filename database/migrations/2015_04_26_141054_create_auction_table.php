<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('auctions', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('artwork_id')->unsigned();
            $table->integer('start_price');
            $table->integer('duplicate_price');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('status_id')->unsigned();
            $table->boolean('inactive');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('artwork_id')->references('id')->on('artworks');
            $table->foreign('status_id')->references('id')->on('ref_status');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('auctions');
	}

}
