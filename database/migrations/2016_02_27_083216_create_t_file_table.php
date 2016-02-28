<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTFileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_file', function(Blueprint $table)
		{
			$table->smallInteger('file_id', true)->unsigned();
			$table->boolean('file_status_id')->index('fk_file_status');
			$table->boolean('file_type_id')->index('fk_file_type');
			$table->smallInteger('party_id')->unsigned()->index('fk_file_of_party');
			$table->string('file_descr', 500)->nullable();
			$table->string('filename', 100);
			$table->string('original_filename', 100);
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_file_created_by');
			$table->smallInteger('updated_by')->index('fk_file_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_file_deleted_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_file');
	}

}
