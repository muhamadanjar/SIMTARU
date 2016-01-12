<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Layer extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Layers', function(Blueprint $table)
		{
			$table->increments('id_layer');
	        $table->string('layername', 100);
	        $table->string('layerurl', 200);
	        $table->string('layer',50);
	        $table->string('leveluser', 60)->nullable();
	        $table->string('na', 1);
	        $table->string('grafik', 50)->nullable();
	        $table->integer('id_grouplayer')->nullable();
	        $table->integer('orderlayer');
	        $table->string('tipelayer',10);
	        $table->decimal('option_opacity')->default(1.0);
	        $table->boolean('option_visible')->default(false);
	        $table->integer('option_mode')->unsigned()->default(1);
	        $table->string('featureaccess',100)->nullable();
	        $table->string('visible',10)->default('viewer')->nullable();
	        $table->text('jsonfield')->nullable();
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
		Schema::drop('Layers');
	}

}
