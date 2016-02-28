<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTServiceRequestFileRelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_service_request_file_rel', function(Blueprint $table)
		{
			$table->foreign('service_request_id', 'fk_service_requests_file')->references('service_request_id')->on('t_service_request')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('service_request_file_rel_status_id', 'fk_service_request_file_rel_status')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('file_id', 'fk_sreq_to_image')->references('file_id')->on('t_file')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('created_by', 'fk_sr_image_rel_created_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('deleted_by', 'fk_sr_image_rel_deleted_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('updated_by', 'fk_sr_image_rel_updated_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_service_request_file_rel', function(Blueprint $table)
		{
			$table->dropForeign('fk_service_requests_file');
			$table->dropForeign('fk_service_request_file_rel_status');
			$table->dropForeign('fk_sreq_to_image');
			$table->dropForeign('fk_sr_image_rel_created_by');
			$table->dropForeign('fk_sr_image_rel_deleted_by');
			$table->dropForeign('fk_sr_image_rel_updated_by');
		});
	}

}
