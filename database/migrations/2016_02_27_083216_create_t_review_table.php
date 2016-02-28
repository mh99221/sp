<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTReviewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_review', function(Blueprint $table)
		{
			$table->smallInteger('review_id', true)->unsigned();
			$table->boolean('review_status_id')->index('fk_review_status');
			$table->smallInteger('party_id')->unsigned()->index('fk_review_of_party');
			$table->integer('review_value1');
			$table->integer('review_value2');
			$table->integer('review_value3');
			$table->integer('review_value4');
			$table->decimal('overal_review_value', 10)->nullable();
			$table->smallInteger('manufacturer_id')->unsigned()->nullable()->index('fk_vehicle_manufactured');
			$table->smallInteger('vehicle_model_id')->unsigned()->nullable()->index('fk_model_serviced');
			$table->smallInteger('vehicle_id')->unsigned()->nullable()->index('fk_vehicle_serviced');
			$table->string('review_title', 100);
			$table->string('review_body', 2000);
			$table->char('recommended_flag', 1)->nullable();
			$table->date('visit_date')->nullable();
			$table->boolean('visited_id')->index('fk_review_visited_on');
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_review_created_by');
			$table->smallInteger('updated_by')->index('fk_review_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_review_deleted_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_review');
	}

}
