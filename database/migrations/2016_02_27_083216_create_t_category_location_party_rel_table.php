<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTCategoryLocationPartyRelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_category_location_party_rel', function(Blueprint $table)
		{
			$table->smallInteger('category_id')->unsigned();
			$table->smallInteger('location_id')->unsigned()->index('fk_party_location_category_02');
			$table->smallInteger('party_id')->unsigned()->index('fk_party_location_category_03');
			$table->smallInteger('manufacturer_id')->unsigned()->index('fk_party_location_category_04');
			$table->boolean('increment_no')->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by');
			$table->smallInteger('updated_by');
			$table->smallInteger('deleted_by')->nullable();
			$table->primary(['category_id','location_id','party_id','manufacturer_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_category_location_party_rel');
	}

}
