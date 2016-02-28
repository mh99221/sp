<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTVehicleTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_vehicle_type', function(Blueprint $table)
		{
			$table->foreign('created_by', 'fk_vehicle_type_created_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('deleted_by', 'fk_vehicle_type_deleted_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_model_id', 'fk_vehicle_type_model')->references('vehicle_model_id')->on('t_vehicle_model')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_type_status_id', 'fk_vehicle_type_status')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('updated_by', 'fk_vehicle_type_updated_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_vehicle_type', function(Blueprint $table)
		{
			$table->dropForeign('fk_vehicle_type_created_by');
			$table->dropForeign('fk_vehicle_type_deleted_by');
			$table->dropForeign('fk_vehicle_type_model');
			$table->dropForeign('fk_vehicle_type_status');
			$table->dropForeign('fk_vehicle_type_updated_by');
		});
	}

}
