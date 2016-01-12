<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Identifi extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Identify', function(Blueprint $table)
		{
			$table->increments('id_identify');
			$table->string('title',60);
			$table->string('layername',60);
			$table->integer('layerid');
			$table->string('display',10);
			$table->text('description')->nullable();
			$table->text('key_')->nullable();
			$table->text('media')->nullable();
			$table->boolean('showattachments');
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
		Schema::drop('Identify');
	}

}
