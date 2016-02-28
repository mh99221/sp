<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTServiceRequestTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_service_request', function(Blueprint $table)
		{
			$table->smallInteger('service_request_id', true)->unsigned();
			$table->boolean('service_request_status_id')->index('fk_service_request_status');
			$table->smallInteger('address_id')->unsigned()->nullable()->index('fk_service_request_address');
			$table->smallInteger('manufacturer_id')->unsigned()->nullable()->index('fk_sr_manufacturer');
			$table->smallInteger('vehicle_model_id')->unsigned()->nullable()->index('fk_sr_vehicle_model');
			$table->smallInteger('vehicle_type_id')->unsigned()->nullable()->index('fk_sr_car_subtype');
			$table->smallInteger('vehicle_id')->unsigned()->nullable()->index('fk_vehicle_to_be_serviced');
			$table->smallInteger('party_id')->unsigned()->index('fk_requested_by_party');
			$table->string('vin', 30)->nullable();
			$table->string('registration_number', 13)->nullable();
			$table->string('service_request_title', 100)->nullable();
			$table->string('service_request_descr', 2000)->nullable();
			$table->decimal('max_price', 10)->nullable();
			$table->integer('max_distance')->nullable();
			$table->dateTime('request_valid_to_date')->nullable();
			$table->char('courtesy_car_flag', 1)->nullable();
			$table->char('insurance_flag', 1)->nullable();
			$table->char('authorized_service_flag', 1)->nullable();
			$table->char('spare_parts_type', 1)->nullable();
			$table->integer('manufactured_year')->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_sr_created_by');
			$table->smallInteger('updated_by')->index('fk_sr_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_sr_deleted_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_service_request');
	}

}
