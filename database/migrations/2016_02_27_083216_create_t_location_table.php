<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTLocationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_location', function(Blueprint $table)
		{
			$table->smallInteger('location_id', true)->unsigned();
			$table->smallInteger('parent_location_id')->unsigned()->nullable()->index('fk_parent_location');
			$table->boolean('location_status_id')->index('fk_location_status');
			$table->boolean('location_type_id')->index('fk_location_type');
			$table->string('location', 100);
			$table->string('location_sk', 100)->nullable();
			$table->string('location_cz', 100)->nullable();
			$table->string('location_url', 100)->nullable();
			$table->string('zip', 13)->nullable();
			$table->decimal('gps_latitude', 13, 10)->nullable();
			$table->decimal('gps_longitude', 13, 10)->nullable();
			$table->string('google_maps_link', 256)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_location_created_by');
			$table->smallInteger('updated_by')->index('fk_location_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_location_deleted_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_location');
	}

}
