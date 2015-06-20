<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkArtworksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('artworks', function(Blueprint $table)
		{
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('ref_category');
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
		Schema::table('artworks', function(Blueprint $table)
		{
            $table->dropForeign('artworks_user_id_foreign');
            $table->dropForeign('artworks_category_id_foreign');
            $table->dropForeign('artworks_status_id_foreign');
		});
	}

}
