<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTManufacturerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_manufacturer', function(Blueprint $table)
		{
			$table->smallInteger('manufacturer_id', true)->unsigned();
			$table->string('manufacturer_name', 30)->unique('ak_manufacturer');
			$table->boolean('manufacturer_status_id')->index('fk_manufacturer_status');
			$table->string('manufacturer_url', 256)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_manufacturer_created_by');
			$table->smallInteger('updated_by')->index('fk_manufacturer_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_manufacturer_deleted_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_manufacturer');
	}

}
