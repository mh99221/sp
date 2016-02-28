<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTContactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_contact', function(Blueprint $table)
		{
			$table->foreign('created_by', 'fk_contact_created_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('deleted_by', 'fk_contact_deleted_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('party_id', 'fk_contact_of_party')->references('party_id')->on('t_party')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('contact_type_id', 'fk_contact_status')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contact_status_id', 'fk_contact_type')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('updated_by', 'fk_contact_updated_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_contact', function(Blueprint $table)
		{
			$table->dropForeign('fk_contact_created_by');
			$table->dropForeign('fk_contact_deleted_by');
			$table->dropForeign('fk_contact_of_party');
			$table->dropForeign('fk_contact_status');
			$table->dropForeign('fk_contact_type');
			$table->dropForeign('fk_contact_updated_by');
		});
	}

}
