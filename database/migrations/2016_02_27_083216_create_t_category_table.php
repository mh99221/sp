<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_category', function(Blueprint $table)
		{
			$table->smallInteger('category_id', true)->unsigned();
			$table->smallInteger('parent_category_id')->unsigned()->nullable();
			$table->boolean('category_type_id')->index('fk_category_type');
			$table->boolean('category_status_id')->index('fk_category_status');
			$table->string('category_name', 100);
			$table->string('category_descr', 500)->nullable();
			$table->string('category_url', 100)->index('ix_category_url');
			$table->integer('category_level')->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_category_created_by');
			$table->smallInteger('updated_by')->index('fk_category_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_category_deleted_by');
			$table->unique(['parent_category_id','category_type_id','category_url'], 'ak_category');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_category');
	}

}
