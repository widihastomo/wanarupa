<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtworkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('artworks', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->integer('category_id')->unsigned();
            $table->integer('style_id')->unsigned();
            $table->string('width');
            $table->string('dept');
            $table->integer('material_id')->unsigned();
            $table->longText('description');
            $table->boolean('is_auction');
            $table->float('selling_price')->nullable();
            $table->integer('status_id')->unsigned();
            $table->integer('visit');
            $table->string('slug');
            $table->boolean('inactive');
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
		Schema::drop('artworks');
	}

}
