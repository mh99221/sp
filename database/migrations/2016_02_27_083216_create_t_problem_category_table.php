<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTProblemCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_problem_category', function(Blueprint $table)
		{
			$table->smallInteger('problem_category_id', true)->unsigned();
			$table->string('category_name_en', 100);
			$table->string('category_name_sk', 100);
			$table->string('category_descr', 500)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_problem_category_created_by');
			$table->smallInteger('updated_by')->index('fk_problem_category_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_problem_category_deleted_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_problem_category');
	}

}
