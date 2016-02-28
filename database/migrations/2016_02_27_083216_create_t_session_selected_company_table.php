<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTSessionSelectedCompanyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_session_selected_company', function(Blueprint $table)
		{
			$table->integer('session_selected_company_id', true);
			$table->integer('session_id')->nullable();
			$table->smallInteger('party_id')->nullable();
			$table->boolean('selection_type_id')->nullable();
			$table->timestamp('start_timestamp')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('end_timestamp')->default('0000-00-00 00:00:00');
			$table->char('active_flag', 1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_session_selected_company');
	}

}
