<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTProblemSymptomTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_problem_symptom', function(Blueprint $table)
		{
			$table->smallInteger('problem_symptom_id', true)->unsigned();
			$table->smallInteger('problem_category_id')->unsigned()->default(0)->index('fk_symptom_belongs_to_category');
			$table->string('symptom_name_en', 100);
			$table->string('symptom_name_sk', 100);
			$table->string('symptom_descr', 500)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_problem_symptom_created_by');
			$table->smallInteger('updated_by')->index('fk_problem_symptom_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_problem_symptom_deleted_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_problem_symptom');
	}

}
