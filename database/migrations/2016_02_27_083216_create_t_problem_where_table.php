<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTProblemWhereTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_problem_where', function(Blueprint $table)
		{
			$table->smallInteger('problem_where_id', true)->unsigned();
			$table->string('where_name_en', 100);
			$table->string('where_name_sk', 100);
			$table->string('where_descr', 500)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_problem_where_created_by');
			$table->smallInteger('updated_by')->index('fk_problem_where_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_problem_where_deleted_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_problem_where');
	}

}
