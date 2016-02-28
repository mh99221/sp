<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTCategoryLocationPartyRelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_category_location_party_rel', function(Blueprint $table)
		{
			$table->foreign('category_id', 'fk_party_location_category_01')->references('category_id')->on('t_category')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('location_id', 'fk_party_location_category_02')->references('location_id')->on('t_location')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('party_id', 'fk_party_location_category_03')->references('party_id')->on('t_party')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('manufacturer_id', 'fk_party_location_category_04')->references('manufacturer_id')->on('t_manufacturer')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_category_location_party_rel', function(Blueprint $table)
		{
			$table->dropForeign('fk_party_location_category_01');
			$table->dropForeign('fk_party_location_category_02');
			$table->dropForeign('fk_party_location_category_03');
			$table->dropForeign('fk_party_location_category_04');
		});
	}

}
