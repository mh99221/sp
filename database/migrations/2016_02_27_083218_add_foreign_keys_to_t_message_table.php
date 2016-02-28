<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTMessageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_message', function(Blueprint $table)
		{
			$table->foreign('created_by', 'fk_message_created_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('deleted_by', 'fk_message_deleted_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('message_type_id', 'fk_message_has_type')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('resource_type_id', 'fk_message_resource_type')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('message_status_id', 'fk_message_status')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('updated_by', 'fk_message_updated_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_message', function(Blueprint $table)
		{
			$table->dropForeign('fk_message_created_by');
			$table->dropForeign('fk_message_deleted_by');
			$table->dropForeign('fk_message_has_type');
			$table->dropForeign('fk_message_resource_type');
			$table->dropForeign('fk_message_status');
			$table->dropForeign('fk_message_updated_by');
		});
	}

}
