<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTUserExtTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_user_ext', function(Blueprint $table)
		{
			$table->foreign('created_by', 'fk_user_ext_created_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('deleted_by', 'fk_user_ext_deleted_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_ext_status_id', 'fk_user_ext_status')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('updated_by', 'fk_user_ext_updated_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'fk_user_ext_user')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_user_ext', function(Blueprint $table)
		{
			$table->dropForeign('fk_user_ext_created_by');
			$table->dropForeign('fk_user_ext_deleted_by');
			$table->dropForeign('fk_user_ext_status');
			$table->dropForeign('fk_user_ext_updated_by');
			$table->dropForeign('fk_user_ext_user');
		});
	}

}
