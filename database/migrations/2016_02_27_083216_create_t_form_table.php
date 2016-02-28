<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTFormTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_form', function(Blueprint $table)
		{
			$table->string('form_name', 100)->primary();
			$table->string('model_name', 100);
			$table->string('base_table_column_id', 100)->nullable();
			$table->string('base_table_column_status_id', 100)->nullable();
			$table->string('form_buttons', 13)->nullable();
			$table->text('form_code', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_form');
	}

}
