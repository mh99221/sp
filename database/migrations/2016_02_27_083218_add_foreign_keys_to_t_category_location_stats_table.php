<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTCategoryLocationStatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_category_location_stats', function(Blueprint $table)
		{
			$table->foreign('category_id', 'fk_category_statistics')->references('category_id')->on('t_category')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('location_id', 'fk_location_statistics')->references('location_id')->on('t_location')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('manufacturer_id', 'fk_manufacturer_statistics')->references('manufacturer_id')->on('t_manufacturer')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_category_location_stats', function(Blueprint $table)
		{
			$table->dropForeign('fk_category_statistics');
			$table->dropForeign('fk_location_statistics');
			$table->dropForeign('fk_manufacturer_statistics');
		});
	}

}
