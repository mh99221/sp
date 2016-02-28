<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTProblemWhenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_problem_when', function(Blueprint $table)
		{
			$table->smallInteger('problem_when_id', true)->unsigned();
			$table->string('when_name_en', 100);
			$table->string('when_name_sk', 100);
			$table->string('when_descr', 500)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_problem_when_created_by');
			$table->smallInteger('updated_by')->index('fk_problem_when_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_problem_when_deleted_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_problem_when');
	}

}
