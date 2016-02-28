<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTVehicleTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_vehicle_type', function(Blueprint $table)
		{
			$table->smallInteger('vehicle_type_id', true)->unsigned();
			$table->boolean('vehicle_type_status_id')->index('fk_vehicle_type_status');
			$table->smallInteger('vehicle_model_id')->unsigned()->nullable()->index('fk_vehicle_type_model');
			$table->string('vehicle_type_name', 100);
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_vehicle_type_created_by');
			$table->smallInteger('updated_by')->index('fk_vehicle_type_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_vehicle_type_deleted_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_vehicle_type');
	}

}
