<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionTimesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sessionTimes', function(Blueprint $table)
		{
			$table->increments('id');
        	$table->integer('cinema_id')->unsigned();
        	$table->integer('movie_id')->unsigned();
        	$table->dateTime('dateTime');
        	$table->timestamps();

        	$table->foreign('cinema_id')->references('id')->on('cinemas')->onDelete('cascade')->onUpdate('cascade');
        	$table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade')->onUpdate('cascade');
		});		

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sessionTimes');
	}

}
