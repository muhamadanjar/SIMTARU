<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Widget extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('widget', function(Blueprint $table)
		{
			$table->increments('id_widget');
	        $table->boolean('include')->default(true);
	        $table->boolean('canFloat')->default(true);
	        $table->string('type',50)->default('titlePane');
	        $table->string('placeAt', 50)->default('right');
	        $table->string('path', 100);
	        $table->string('idw', 50)->nullable();
	        $table->string('title');
	        $table->boolean('open')->default('false');
	        $table->integer('position')->default(0);
	        $table->string('srcNodeRef')->default(1.0)->nullable();
	        $table->boolean('option_map')->default(false);
	        $table->boolean('option_mapClickMode')->default(false);
	        $table->boolean('option_legendLayerInfos');
	        $table->boolean('option_tocLayerInfos');
	        $table->boolean('option_editorLayerInfos');
	        $table->string('option_property',10)->default('value')->nullable();
	       
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
		Schema::drop('widget');
	}

}
