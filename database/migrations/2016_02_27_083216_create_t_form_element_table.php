<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTFormElementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_form_element', function(Blueprint $table)
		{
			$table->string('form_name', 100)->index('ix_form');
			$table->string('element_name', 100);
			$table->boolean('element_admin')->nullable();
			$table->string('element_type', 100)->nullable();
			$table->integer('element_order')->nullable();
			$table->boolean('element_active')->nullable();
			$table->string('element_row', 100)->nullable();
			$table->string('element_class', 100)->nullable();
			$table->boolean('element_required')->nullable();
			$table->boolean('element_remove_label')->nullable();
			$table->boolean('element_disabled')->nullable();
			$table->boolean('element_ignore_validator')->nullable();
			$table->boolean('element_empty_label')->nullable();
			$table->string('element_custom_class', 100)->nullable();
			$table->string('element_param_1', 100)->nullable();
			$table->string('element_param_2', 100)->nullable();
			$table->string('element_param_3', 100)->nullable();
			$table->string('element_param_4', 100)->nullable();
			$table->string('element_param_5', 100)->nullable();
			$table->string('element_param_6', 100)->nullable();
			$table->string('element_param_7', 100)->nullable();
			$table->string('element_param_8', 100)->nullable();
			$table->primary(['form_name','element_name']);
			$table->unique(['form_name','element_order'], 'ak_form_element');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_form_element');
	}

}
