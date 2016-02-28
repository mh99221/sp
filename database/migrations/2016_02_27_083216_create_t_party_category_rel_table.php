<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTPartyCategoryRelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_party_category_rel', function(Blueprint $table)
		{
			$table->smallInteger('party_category_rel_id', true)->unsigned();
			$table->boolean('party_category_rel_status_id')->default(2)->index('fk_party_category_rel_status');
			$table->smallInteger('party_id')->unsigned();
			$table->smallInteger('category_id')->unsigned()->index('fk_category_includes_party');
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_party_category_rel_created_by');
			$table->smallInteger('updated_by')->index('fk_party_category_rel_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_party_category_rel_deleted_by');
			$table->unique(['party_id','category_id'], 'ak_party_Category_rel');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_party_category_rel');
	}

}
