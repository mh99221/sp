<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTServiceResponseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_service_response', function(Blueprint $table)
		{
			$table->foreign('party_id', 'fk_responsed_by_party')->references('party_id')->on('t_party')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('service_request_id', 'fk_response_2_request')->references('service_request_id')->on('t_service_request')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('service_response_status_id', 'fk_service_response_status')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('created_by', 'fk_srp_created_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('deleted_by', 'fk_srp_deleted_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('updated_by', 'fk_srp_updated_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('review_id', 'fk_winning_response_rate')->references('review_id')->on('t_review')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_service_response', function(Blueprint $table)
		{
			$table->dropForeign('fk_responsed_by_party');
			$table->dropForeign('fk_response_2_request');
			$table->dropForeign('fk_service_response_status');
			$table->dropForeign('fk_srp_created_by');
			$table->dropForeign('fk_srp_deleted_by');
			$table->dropForeign('fk_srp_updated_by');
			$table->dropForeign('fk_winning_response_rate');
		});
	}

}
