<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTServiceHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_service_history', function(Blueprint $table)
		{
			$table->smallInteger('service_history_id', true)->unsigned();
			$table->boolean('service_history_status_id')->index('fk_service_history_status');
			$table->smallInteger('vehicle_id')->unsigned()->index('fk_vehicle_service_history');
			$table->smallInteger('service_party_id')->unsigned()->nullable()->index('fk_service_history_belongs_to_party');
			$table->decimal('total_price', 10)->nullable();
			$table->decimal('parts_price', 10)->nullable();
			$table->decimal('work_price', 10)->nullable();
			$table->integer('mileage')->nullable();
			$table->string('service_descr', 500)->nullable();
			$table->dateTime('service_date')->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_service_history_created_by');
			$table->smallInteger('updated_by')->index('fk_service_history_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_service_history_deleted_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_service_history');
	}

}
