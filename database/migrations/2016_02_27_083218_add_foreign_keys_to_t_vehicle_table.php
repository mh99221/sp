<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTVehicleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_vehicle', function(Blueprint $table)
		{
			$table->foreign('alert_ec_tc_id', 'fk_alert_ec_tc')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('party_id', 'fk_owner_of_vehicle')->references('party_id')->on('t_party')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('created_by', 'fk_vehicle_created_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('deleted_by', 'fk_vehicle_deleted_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('manufacturer_id', 'fk_vehicle_manufacturer')->references('manufacturer_id')->on('t_manufacturer')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_model_id', 'fk_vehicle_model')->references('vehicle_model_id')->on('t_vehicle_model')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_status_id', 'fk_vehicle_status')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_type_id', 'fk_vehicle_type')->references('vehicle_type_id')->on('t_vehicle_type')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('updated_by', 'fk_vehicle_updated_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_vehicle', function(Blueprint $table)
		{
			$table->dropForeign('fk_alert_ec_tc');
			$table->dropForeign('fk_owner_of_vehicle');
			$table->dropForeign('fk_vehicle_created_by');
			$table->dropForeign('fk_vehicle_deleted_by');
			$table->dropForeign('fk_vehicle_manufacturer');
			$table->dropForeign('fk_vehicle_model');
			$table->dropForeign('fk_vehicle_status');
			$table->dropForeign('fk_vehicle_type');
			$table->dropForeign('fk_vehicle_updated_by');
		});
	}

}
