<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_address', function(Blueprint $table)
		{
			$table->smallInteger('address_id', true)->unsigned();
			$table->boolean('address_type_id')->index('fk_address_type');
			$table->boolean('address_status_id')->index('fk_address_status');
			$table->smallInteger('party_ID')->unsigned()->index('fk_address_of_party');
			$table->string('line_1', 100);
			$table->string('line_2', 100)->nullable();
			$table->string('line_3', 100)->nullable();
			$table->smallInteger('city_id')->unsigned()->nullable()->index('fk_city');
			$table->string('city', 100);
			$table->smallInteger('city_part_id')->unsigned()->nullable()->index('fk_city_part');
			$table->string('city_part', 100)->nullable();
			$table->string('zip', 13);
			$table->smallInteger('district_id')->unsigned()->nullable()->index('fk_district');
			$table->string('district', 100)->nullable();
			$table->smallInteger('region_id')->unsigned()->nullable()->index('fk_region');
			$table->string('region', 100)->nullable();
			$table->smallInteger('country_id')->unsigned()->nullable()->index('fk_country');
			$table->string('country', 100);
			$table->decimal('gps_latitude', 13, 10)->nullable();
			$table->decimal('gps_longitude', 13, 10)->nullable();
			$table->string('google_maps_link', 256)->nullable();
			$table->char('primary_Flag', 1)->index('ix_primary_flag');
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_address_created_by');
			$table->smallInteger('updated_by')->index('fk_address_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_address_deleted_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_address');
	}

}
