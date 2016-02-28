<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTServiceResponseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_service_response', function(Blueprint $table)
		{
			$table->smallInteger('service_response_id', true)->unsigned();
			$table->boolean('service_response_status_id')->index('fk_service_response_status');
			$table->smallInteger('service_request_id')->unsigned()->index('fk_response_2_request');
			$table->smallInteger('party_id')->unsigned()->index('fk_responsed_by_party');
			$table->smallInteger('review_id')->unsigned()->nullable()->index('fk_winning_response_rate');
			$table->string('response_title', 100)->nullable();
			$table->string('response_text', 500)->nullable();
			$table->decimal('price', 10)->nullable();
			$table->char('rental_car_flag', 1)->nullable();
			$table->char('courtesy_car_flag', 1)->nullable();
			$table->dateTime('next_appointment_date')->nullable();
			$table->integer('repair_days')->nullable();
			$table->dateTime('estimate_expiration_date')->nullable();
			$table->char('estimate_accurancy_flag', 1)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_srp_created_by');
			$table->smallInteger('updated_by')->index('fk_srp_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_srp_deleted_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_service_response');
	}

}
