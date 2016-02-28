<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTProblemSymptomTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_problem_symptom', function(Blueprint $table)
		{
			$table->foreign('created_by', 'fk_problem_symptom_created_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('deleted_by', 'fk_problem_symptom_deleted_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('updated_by', 'fk_problem_symptom_updated_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('problem_category_id', 'fk_symptom_belongs_to_category')->references('problem_category_id')->on('t_problem_category')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_problem_symptom', function(Blueprint $table)
		{
			$table->dropForeign('fk_problem_symptom_created_by');
			$table->dropForeign('fk_problem_symptom_deleted_by');
			$table->dropForeign('fk_problem_symptom_updated_by');
			$table->dropForeign('fk_symptom_belongs_to_category');
		});
	}

}
