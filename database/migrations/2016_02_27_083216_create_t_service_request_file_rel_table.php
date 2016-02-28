<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTServiceRequestFileRelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_service_request_file_rel', function(Blueprint $table)
		{
			$table->smallInteger('service_request_file_rel_id', true)->unsigned();
			$table->boolean('service_request_file_rel_status_id')->index('fk_service_request_file_rel_status');
			$table->smallInteger('service_request_id')->unsigned()->index('fk_service_requests_file');
			$table->smallInteger('file_id')->unsigned()->index('fk_sreq_to_image');
			$table->integer('order_pos')->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_sr_image_rel_created_by');
			$table->smallInteger('updated_by')->index('fk_sr_image_rel_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_sr_image_rel_deleted_by');
			$table->unique(['service_request_id','file_id'], 'aK_service_request_file_rel');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_service_request_file_rel');
	}

}
