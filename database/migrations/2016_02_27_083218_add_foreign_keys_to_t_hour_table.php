<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTHourTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_hour', function(Blueprint $table)
		{
			$table->foreign('created_by', 'fk_hour_created_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('deleted_by', 'fk_hour_deleted_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('hour_status_id', 'fk_hour_status')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('updated_by', 'fk_hour_updated_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('party_id', 'fk_working_hours')->references('party_id')->on('t_party')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_hour', function(Blueprint $table)
		{
			$table->dropForeign('fk_hour_created_by');
			$table->dropForeign('fk_hour_deleted_by');
			$table->dropForeign('fk_hour_status');
			$table->dropForeign('fk_hour_updated_by');
			$table->dropForeign('fk_working_hours');
		});
	}

}
