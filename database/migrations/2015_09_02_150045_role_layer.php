<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RoleLayer extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('role_layer', function (Blueprint $table) {
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('layer_id');
            $table->primary(['role_id', 'layer_id']);
            $table->foreign('layer_id')
                  ->references('id_layer')->on('Layers')
                  ->onDelete('cascade');
            $table->foreign('role_id')
                  ->references('id')->on('roles')
                  ->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('role_layer');
	}

}
