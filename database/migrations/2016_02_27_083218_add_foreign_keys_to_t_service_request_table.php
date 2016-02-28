<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTServiceRequestTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_service_request', function(Blueprint $table)
		{
			$table->foreign('party_id', 'fk_requested_by_party')->references('party_id')->on('t_party')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('address_id', 'fk_service_request_address')->references('address_id')->on('t_address')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('service_request_status_id', 'fk_service_request_status')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_type_id', 'fk_sr_car_subtype')->references('vehicle_type_id')->on('t_vehicle_type')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('created_by', 'fk_sr_created_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('deleted_by', 'fk_sr_deleted_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('manufacturer_id', 'fk_sr_manufacturer')->references('manufacturer_id')->on('t_manufacturer')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('updated_by', 'fk_sr_updated_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_model_id', 'fk_sr_vehicle_model')->references('vehicle_model_id')->on('t_vehicle_model')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_id', 'fk_vehicle_to_be_serviced')->references('vehicle_id')->on('t_vehicle')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_service_request', function(Blueprint $table)
		{
			$table->dropForeign('fk_requested_by_party');
			$table->dropForeign('fk_service_request_address');
			$table->dropForeign('fk_service_request_status');
			$table->dropForeign('fk_sr_car_subtype');
			$table->dropForeign('fk_sr_created_by');
			$table->dropForeign('fk_sr_deleted_by');
			$table->dropForeign('fk_sr_manufacturer');
			$table->dropForeign('fk_sr_updated_by');
			$table->dropForeign('fk_sr_vehicle_model');
			$table->dropForeign('fk_vehicle_to_be_serviced');
		});
	}

}
