<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTVehicleModelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_vehicle_model', function(Blueprint $table)
		{
			$table->foreign('manufacturer_id', 'fk_model_makes_manufacturer')->references('manufacturer_id')->on('t_manufacturer')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('created_by', 'fk_vehicle_model_created_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('deleted_by', 'fk_vehicle_model_deleted_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_model_status_id', 'fk_vehicle_model_status')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('updated_by', 'fk_vehicle_model_updated_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_vehicle_model', function(Blueprint $table)
		{
			$table->dropForeign('fk_model_makes_manufacturer');
			$table->dropForeign('fk_vehicle_model_created_by');
			$table->dropForeign('fk_vehicle_model_deleted_by');
			$table->dropForeign('fk_vehicle_model_status');
			$table->dropForeign('fk_vehicle_model_updated_by');
		});
	}

}
