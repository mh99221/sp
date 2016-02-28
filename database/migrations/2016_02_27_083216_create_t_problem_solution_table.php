<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTProblemSolutionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_problem_solution', function(Blueprint $table)
		{
			$table->smallInteger('problem_solution_id', true)->unsigned();
			$table->smallInteger('problem_category_id')->unsigned()->nullable()->index('fk_problem_category');
			$table->smallInteger('problem_symptom_id')->unsigned()->nullable()->index('fk_problem_symptom');
			$table->smallInteger('problem_when_id')->unsigned()->nullable()->index('fk_when_problem_occured');
			$table->smallInteger('problem_where_id')->unsigned()->nullable()->index('fk_where_is_problem');
			$table->integer('priority')->nullable();
			$table->string('what_to_do_en', 100);
			$table->string('part_type_en', 500);
			$table->string('cause_descr_en', 500)->nullable();
			$table->string('what_to_do_sk', 100);
			$table->string('part_type_sk', 100);
			$table->string('cause_descr_sk', 500)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_problem_solution_created_by');
			$table->smallInteger('updated_by')->index('fk_problem_solution_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_problem_solution_deleted_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_problem_solution');
	}

}
