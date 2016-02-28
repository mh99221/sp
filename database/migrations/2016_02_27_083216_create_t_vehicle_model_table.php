<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTVehicleModelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_vehicle_model', function(Blueprint $table)
		{
			$table->smallInteger('vehicle_model_id', true)->unsigned();
			$table->smallInteger('manufacturer_id')->unsigned()->index('fk_model_makes_manufacturer');
			$table->string('vehicle_model_name', 100);
			$table->boolean('vehicle_model_status_id')->index('fk_vehicle_model_status');
			$table->integer('production_start')->nullable();
			$table->integer('production_end')->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_vehicle_model_created_by');
			$table->smallInteger('updated_by')->index('fk_vehicle_model_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_vehicle_model_deleted_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_vehicle_model');
	}

}
