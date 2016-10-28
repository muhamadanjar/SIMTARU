<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Option extends Migration {

	public function up(){
		Schema::create('options',function($table)
		{
			$table->increment('id');
			$table->string('option_name',64);
			$table->text('option_value');
			$table->string('autoload',20)->default('no');
		})
	}


	public function down(){
		Schema::drop('options')
	}

}
