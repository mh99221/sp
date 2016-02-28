<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTPartyTagRelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_party_tag_rel', function(Blueprint $table)
		{
			$table->foreign('party_id', 'fk_party_has_tag')->references('party_id')->on('t_party')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('created_by', 'fk_party_tag_rel_created_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('deleted_by', 'fk_party_tag_rel_deleted_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('party_tag_rel_status_id', 'fk_party_tag_rel_status')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('updated_by', 'fk_party_tag_rel_updated_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('tag_id', 'fk_tagged_party')->references('tag_id')->on('t_tag')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_party_tag_rel', function(Blueprint $table)
		{
			$table->dropForeign('fk_party_has_tag');
			$table->dropForeign('fk_party_tag_rel_created_by');
			$table->dropForeign('fk_party_tag_rel_deleted_by');
			$table->dropForeign('fk_party_tag_rel_status');
			$table->dropForeign('fk_party_tag_rel_updated_by');
			$table->dropForeign('fk_tagged_party');
		});
	}

}
