<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTSessionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_session', function(Blueprint $table)
		{
			$table->increments('session_id');
			$table->timestamp('start_timestamp')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('end_timestamp')->default('0000-00-00 00:00:00');
			$table->text('data', 65535)->nullable();
			$table->smallInteger('user_id')->nullable();
			$table->boolean('session_status_id')->nullable();
			$table->string('phpsessid', 40)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_session');
	}

}
