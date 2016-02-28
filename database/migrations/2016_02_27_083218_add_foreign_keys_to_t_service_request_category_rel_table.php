<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTServiceRequestCategoryRelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_service_request_category_rel', function(Blueprint $table)
		{
			$table->foreign('service_request_id', 'fk_category_of_service_request')->references('service_request_id')->on('t_service_request')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('category_id', 'fk_service_requests_category')->references('category_id')->on('t_category')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('created_by', 'fk_service_request_category_rel_created_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('deleted_by', 'fk_service_request_category_rel_deleted_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('service_request_category_rel_status_id', 'fk_service_request_category_rel_status')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('updated_by', 'fk_service_request_category_rel_updated_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_service_request_category_rel', function(Blueprint $table)
		{
			$table->dropForeign('fk_category_of_service_request');
			$table->dropForeign('fk_service_requests_category');
			$table->dropForeign('fk_service_request_category_rel_created_by');
			$table->dropForeign('fk_service_request_category_rel_deleted_by');
			$table->dropForeign('fk_service_request_category_rel_status');
			$table->dropForeign('fk_service_request_category_rel_updated_by');
		});
	}

}
