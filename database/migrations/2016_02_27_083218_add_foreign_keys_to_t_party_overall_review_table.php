<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTPartyOverallReviewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_party_overall_review', function(Blueprint $table)
		{
			$table->foreign('party_id', 'fk_overall_review_of_party')->references('party_id')->on('t_party')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_party_overall_review', function(Blueprint $table)
		{
			$table->dropForeign('fk_overall_review_of_party');
		});
	}

}
