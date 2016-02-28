<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_user', function(Blueprint $table)
		{
			$table->foreign('party_id', 'fk_user_belongs_to_party')->references('party_id')->on('t_party')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_status_id', 'fk_user_status')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_user', function(Blueprint $table)
		{
			$table->dropForeign('fk_user_belongs_to_party');
			$table->dropForeign('fk_user_status');
		});
	}

}
