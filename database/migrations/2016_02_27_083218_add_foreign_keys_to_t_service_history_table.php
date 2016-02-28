<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTServiceHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_service_history', function(Blueprint $table)
		{
			$table->foreign('service_party_id', 'fk_service_history_belongs_to_party')->references('party_id')->on('t_party')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('created_by', 'fk_service_history_created_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('deleted_by', 'fk_service_history_deleted_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('service_history_status_id', 'fk_service_history_status')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('updated_by', 'fk_service_history_updated_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_id', 'fk_vehicle_service_history')->references('vehicle_id')->on('t_vehicle')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_service_history', function(Blueprint $table)
		{
			$table->dropForeign('fk_service_history_belongs_to_party');
			$table->dropForeign('fk_service_history_created_by');
			$table->dropForeign('fk_service_history_deleted_by');
			$table->dropForeign('fk_service_history_status');
			$table->dropForeign('fk_service_history_updated_by');
			$table->dropForeign('fk_vehicle_service_history');
		});
	}

}
