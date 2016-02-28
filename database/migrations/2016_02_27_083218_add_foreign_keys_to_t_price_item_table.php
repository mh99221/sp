<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTPriceItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_price_item', function(Blueprint $table)
		{
			$table->foreign('measure_id', 'fk_measure_type')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('party_id', 'fk_party_price_list')->references('party_id')->on('t_party')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('price_item_status_id', 'fk_price_item_status')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('price_item_type_id', 'fk_price_item_type')->references('category_id')->on('t_category')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('created_by', 'fk_price_list_created_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('deleted_by', 'fk_price_list_deleted_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('updated_by', 'fk_price_list_updated_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_price_item', function(Blueprint $table)
		{
			$table->dropForeign('fk_measure_type');
			$table->dropForeign('fk_party_price_list');
			$table->dropForeign('fk_price_item_status');
			$table->dropForeign('fk_price_item_type');
			$table->dropForeign('fk_price_list_created_by');
			$table->dropForeign('fk_price_list_deleted_by');
			$table->dropForeign('fk_price_list_updated_by');
		});
	}

}
