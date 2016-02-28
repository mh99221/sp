<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTPartyRelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_party_rel', function(Blueprint $table)
		{
			$table->foreign('created_by', 'fk_party_rel_created_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('deleted_by', 'fk_party_rel_deleted_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('party_rel_status_id', 'fk_party_rel_status')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('party_rel_type_id', 'fk_party_rel_type')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('updated_by', 'fk_party_rel_updated_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('party_id', 'fk_related_party')->references('party_id')->on('t_party')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('related_party_id', 'fk_related_party_2')->references('party_id')->on('t_party')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_party_rel', function(Blueprint $table)
		{
			$table->dropForeign('fk_party_rel_created_by');
			$table->dropForeign('fk_party_rel_deleted_by');
			$table->dropForeign('fk_party_rel_status');
			$table->dropForeign('fk_party_rel_type');
			$table->dropForeign('fk_party_rel_updated_by');
			$table->dropForeign('fk_related_party');
			$table->dropForeign('fk_related_party_2');
		});
	}

}
