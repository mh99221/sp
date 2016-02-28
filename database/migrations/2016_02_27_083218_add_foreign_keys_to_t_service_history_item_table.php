<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTServiceHistoryItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_service_history_item', function(Blueprint $table)
		{
			$table->foreign('service_history_id', 'fk_item_of_service_history')->references('service_history_id')->on('t_service_history')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('created_by', 'fk_service_history_item_created_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('deleted_by', 'fk_service_history_item_deleted_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('service_history_item_status_id', 'fk_service_history_item_status')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('updated_by', 'fk_service_history_item_updated_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_service_history_item', function(Blueprint $table)
		{
			$table->dropForeign('fk_item_of_service_history');
			$table->dropForeign('fk_service_history_item_created_by');
			$table->dropForeign('fk_service_history_item_deleted_by');
			$table->dropForeign('fk_service_history_item_status');
			$table->dropForeign('fk_service_history_item_updated_by');
		});
	}

}
