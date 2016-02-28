<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTProblemSolutionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_problem_solution', function(Blueprint $table)
		{
			$table->foreign('problem_category_id', 'fk_problem_category')->references('problem_category_id')->on('t_problem_category')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('created_by', 'fk_problem_solution_created_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('deleted_by', 'fk_problem_solution_deleted_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('updated_by', 'fk_problem_solution_updated_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('problem_when_id', 'fk_when_problem_occured')->references('problem_when_id')->on('t_problem_when')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('problem_where_id', 'fk_where_is_problem')->references('problem_where_id')->on('t_problem_where')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_problem_solution', function(Blueprint $table)
		{
			$table->dropForeign('fk_problem_category');
			$table->dropForeign('fk_problem_solution_created_by');
			$table->dropForeign('fk_problem_solution_deleted_by');
			$table->dropForeign('fk_problem_solution_updated_by');
			$table->dropForeign('fk_when_problem_occured');
			$table->dropForeign('fk_where_is_problem');
		});
	}

}
