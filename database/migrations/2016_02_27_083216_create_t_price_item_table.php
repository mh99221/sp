<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTPriceItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_price_item', function(Blueprint $table)
		{
			$table->smallInteger('price_item_id', true)->unsigned();
			$table->boolean('price_item_status_id')->index('fk_price_item_status');
			$table->smallInteger('price_item_type_id')->unsigned()->nullable()->index('fk_price_item_type');
			$table->smallInteger('party_id')->unsigned()->index('fk_party_price_list');
			$table->string('item_name', 500)->nullable();
			$table->decimal('price_category_1', 10)->nullable();
			$table->decimal('price_category_2', 10)->nullable();
			$table->decimal('price_category_3', 10)->nullable();
			$table->decimal('price_category_4', 10)->nullable();
			$table->boolean('measure_id')->index('fk_measure_type');
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_price_list_created_by');
			$table->smallInteger('updated_by')->index('fk_price_list_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_price_list_deleted_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_price_item');
	}

}
