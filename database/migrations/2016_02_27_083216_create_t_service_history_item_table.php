<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTServiceHistoryItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_service_history_item', function(Blueprint $table)
		{
			$table->smallInteger('service_history_item_id', true)->unsigned();
			$table->boolean('service_history_item_status_id')->index('fk_service_history_item_status');
			$table->smallInteger('service_history_id')->unsigned()->index('fk_item_of_service_history');
			$table->string('item_name', 100)->nullable();
			$table->string('item_descr', 500)->nullable();
			$table->decimal('item_price', 10)->nullable();
			$table->decimal('work_price', 10)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_service_history_item_created_by');
			$table->smallInteger('updated_by')->index('fk_service_history_item_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_service_history_item_deleted_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_service_history_item');
	}

}
