<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTSessionApplTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_session_appl', function(Blueprint $table)
		{
			$table->integer('session_id')->primary();
			$table->integer('modified')->nullable();
			$table->integer('lifetime')->nullable();
			$table->text('data', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_session_appl');
	}

}
