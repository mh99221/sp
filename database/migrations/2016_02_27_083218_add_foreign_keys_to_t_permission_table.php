<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTPermissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_permission', function(Blueprint $table)
		{
			$table->foreign('created_by', 'fk_permission_created_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('deleted_by', 'fk_permission_deleted_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('resource_type_id', 'fk_permission_resource_type')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('updated_by', 'fk_permission_updated_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'fk_permitted_to_user')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_permission', function(Blueprint $table)
		{
			$table->dropForeign('fk_permission_created_by');
			$table->dropForeign('fk_permission_deleted_by');
			$table->dropForeign('fk_permission_resource_type');
			$table->dropForeign('fk_permission_updated_by');
			$table->dropForeign('fk_permitted_to_user');
		});
	}

}
