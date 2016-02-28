<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTCategoryLocationStatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_category_location_stats', function(Blueprint $table)
		{
			$table->smallInteger('category_id')->unsigned();
			$table->smallInteger('location_id')->unsigned()->index('fk_location_statistics');
			$table->smallInteger('manufacturer_id')->unsigned()->index('fk_manufacturer_statistics');
			$table->integer('count_all');
			$table->integer('count_active_parties');
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by');
			$table->smallInteger('updated_by');
			$table->smallInteger('deleted_by')->nullable();
			$table->primary(['category_id','location_id','manufacturer_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_category_location_stats');
	}

}
