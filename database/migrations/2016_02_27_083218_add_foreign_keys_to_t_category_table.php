<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_category', function(Blueprint $table)
		{
			$table->foreign('created_by', 'fk_category_created_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('deleted_by', 'fk_category_deleted_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('category_status_id', 'fk_category_status')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('category_type_id', 'fk_category_type')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('updated_by', 'fk_category_updated_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('parent_category_id', 'fk_parent_category')->references('category_id')->on('t_category')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_category', function(Blueprint $table)
		{
			$table->dropForeign('fk_category_created_by');
			$table->dropForeign('fk_category_deleted_by');
			$table->dropForeign('fk_category_status');
			$table->dropForeign('fk_category_type');
			$table->dropForeign('fk_category_updated_by');
			$table->dropForeign('fk_parent_category');
		});
	}

}
