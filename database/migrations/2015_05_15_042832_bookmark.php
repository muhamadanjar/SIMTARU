<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bookmark extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Bookmark', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('name',60);
			$table->double('x_min');
			$table->double('y_min');
			$table->double('x_max');
			$table->double('y_max');
			$table->integer('wkid');
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
		Schema::drop('Bookmark');
	}

}
