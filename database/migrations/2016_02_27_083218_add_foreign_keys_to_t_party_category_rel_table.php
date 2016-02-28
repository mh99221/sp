<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTPartyCategoryRelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_party_category_rel', function(Blueprint $table)
		{
			$table->foreign('category_id', 'fk_category_includes_party')->references('category_id')->on('t_category')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('party_id', 'fk_party_category')->references('party_id')->on('t_party')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('created_by', 'fk_party_category_rel_created_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('deleted_by', 'fk_party_category_rel_deleted_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('party_category_rel_status_id', 'fk_party_category_rel_status')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('updated_by', 'fk_party_category_rel_updated_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_party_category_rel', function(Blueprint $table)
		{
			$table->dropForeign('fk_category_includes_party');
			$table->dropForeign('fk_party_category');
			$table->dropForeign('fk_party_category_rel_created_by');
			$table->dropForeign('fk_party_category_rel_deleted_by');
			$table->dropForeign('fk_party_category_rel_status');
			$table->dropForeign('fk_party_category_rel_updated_by');
		});
	}

}
