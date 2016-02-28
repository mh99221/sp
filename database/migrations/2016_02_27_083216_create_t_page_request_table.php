<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTPageRequestTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_page_request', function(Blueprint $table)
		{
			$table->increments('page_request_id');
			$table->integer('session_id')->unsigned()->index('fk_request_session');
			$table->string('url', 256)->nullable();
			$table->timestamp('requested')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->boolean('page_request_status_id')->index('fk_page_request_status');
			$table->smallInteger('user_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_page_request');
	}

}
