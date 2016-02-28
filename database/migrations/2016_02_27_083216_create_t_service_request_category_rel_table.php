<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTServiceRequestCategoryRelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_service_request_category_rel', function(Blueprint $table)
		{
			$table->smallInteger('service_request_category_rel_id', true)->unsigned();
			$table->boolean('service_request_category_rel_status_id')->index('fk_service_request_category_rel_status');
			$table->smallInteger('service_request_id')->unsigned()->index('fk_category_of_service_request');
			$table->smallInteger('category_id')->unsigned()->index('fk_service_requests_category');
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_service_request_category_rel_created_by');
			$table->smallInteger('updated_by')->index('fk_service_request_category_rel_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_service_request_category_rel_deleted_by');
			$table->unique(['service_request_id','category_id'], 'ak_service_request_category_rel');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_service_request_category_rel');
	}

}
