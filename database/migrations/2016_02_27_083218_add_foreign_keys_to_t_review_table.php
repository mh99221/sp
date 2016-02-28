<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTReviewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_review', function(Blueprint $table)
		{
			$table->foreign('vehicle_model_id', 'fk_model_serviced')->references('vehicle_model_id')->on('t_vehicle_model')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('created_by', 'fk_review_created_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('party_id', 'fk_review_of_party')->references('party_id')->on('t_party')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('review_status_id', 'fk_review_status')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('updated_by', 'fk_review_updated_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('visited_id', 'fk_review_visited_on')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('manufacturer_id', 'fk_vehicle_manufactured')->references('manufacturer_id')->on('t_manufacturer')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_id', 'fk_vehicle_serviced')->references('vehicle_id')->on('t_vehicle')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_review', function(Blueprint $table)
		{
			$table->dropForeign('fk_model_serviced');
			$table->dropForeign('fk_review_created_by');
			$table->dropForeign('fk_review_of_party');
			$table->dropForeign('fk_review_status');
			$table->dropForeign('fk_review_updated_by');
			$table->dropForeign('fk_review_visited_on');
			$table->dropForeign('fk_vehicle_manufactured');
			$table->dropForeign('fk_vehicle_serviced');
		});
	}

}
