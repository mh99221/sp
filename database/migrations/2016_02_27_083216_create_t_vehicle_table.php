<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTVehicleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_vehicle', function(Blueprint $table)
		{
			$table->smallInteger('vehicle_id', true)->unsigned();
			$table->boolean('vehicle_status_id')->index('fk_vehicle_status');
			$table->smallInteger('manufacturer_id')->unsigned()->nullable()->index('fk_vehicle_manufacturer');
			$table->smallInteger('vehicle_model_id')->unsigned()->nullable()->index('fk_vehicle_model');
			$table->smallInteger('vehicle_type_id')->unsigned()->nullable()->index('fk_vehicle_type');
			$table->string('vin', 30)->nullable();
			$table->string('registration_number', 13)->nullable();
			$table->integer('manufactured_year')->nullable();
			$table->dateTime('ec_valid_to_date')->nullable();
			$table->dateTime('tc_valid_to_date')->nullable();
			$table->boolean('alert_ec_tc_id')->nullable()->index('fk_alert_ec_tc');
			$table->string('alert_sms_number', 13)->nullable();
			$table->string('alert_email', 256)->nullable();
			$table->smallInteger('party_id')->unsigned()->default(1)->index('fk_owner_of_vehicle');
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_vehicle_created_by');
			$table->smallInteger('updated_by')->index('fk_vehicle_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_vehicle_deleted_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_vehicle');
	}

}
