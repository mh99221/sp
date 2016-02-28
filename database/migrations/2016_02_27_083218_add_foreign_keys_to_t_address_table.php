<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_address', function(Blueprint $table)
		{
			$table->foreign('created_by', 'fk_address_created_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('deleted_by', 'fk_address_deleted_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('party_ID', 'fk_address_of_party')->references('party_id')->on('t_party')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('address_status_id', 'fk_address_status')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('address_type_id', 'fk_address_type')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('updated_by', 'fk_address_updated_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('city_id', 'fk_city')->references('location_id')->on('t_location')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('city_part_id', 'fk_city_part')->references('location_id')->on('t_location')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('country_id', 'fk_country')->references('location_id')->on('t_location')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('district_id', 'fk_district')->references('location_id')->on('t_location')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('region_id', 'fk_region')->references('location_id')->on('t_location')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_address', function(Blueprint $table)
		{
			$table->dropForeign('fk_address_created_by');
			$table->dropForeign('fk_address_deleted_by');
			$table->dropForeign('fk_address_of_party');
			$table->dropForeign('fk_address_status');
			$table->dropForeign('fk_address_type');
			$table->dropForeign('fk_address_updated_by');
			$table->dropForeign('fk_city');
			$table->dropForeign('fk_city_part');
			$table->dropForeign('fk_country');
			$table->dropForeign('fk_district');
			$table->dropForeign('fk_region');
		});
	}

}
