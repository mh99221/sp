<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTLocationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_location', function(Blueprint $table)
		{
			$table->foreign('created_by', 'fk_location_created_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('deleted_by', 'fk_location_deleted_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('location_status_id', 'fk_location_status')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('location_type_id', 'fk_location_type')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('updated_by', 'fk_location_updated_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('parent_location_id', 'fk_parent_location')->references('location_id')->on('t_location')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_location', function(Blueprint $table)
		{
			$table->dropForeign('fk_location_created_by');
			$table->dropForeign('fk_location_deleted_by');
			$table->dropForeign('fk_location_status');
			$table->dropForeign('fk_location_type');
			$table->dropForeign('fk_location_updated_by');
			$table->dropForeign('fk_parent_location');
		});
	}

}
