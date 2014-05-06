<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCinemasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cinemas', function(Blueprint $table)
		{
			$table->increments('id');
        	$table->string('name',60);
        	$table->string('address',100);
        	$table->string('geo', 100);
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
		Schema::drop('cinemas');
	}

}
