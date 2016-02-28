<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTPartyOverallReviewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_party_overall_review', function(Blueprint $table)
		{
			$table->smallInteger('party_overall_review_id', true)->unsigned();
			$table->smallInteger('party_id')->unsigned()->unique('ak_party_overall_review');
			$table->decimal('review_value', 10);
			$table->smallInteger('review_count')->unsigned()->nullable();
			$table->smallInteger('comment_count')->unsigned()->nullable();
			$table->dateTime('updated_at')->default('0000-00-00 00:00:00');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_party_overall_review');
	}

}
