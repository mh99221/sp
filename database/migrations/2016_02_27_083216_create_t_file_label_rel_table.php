<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTFileLabelRelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_file_label_rel', function(Blueprint $table)
		{
			$table->smallInteger('file_label_rel_id', true)->unsigned();
			$table->boolean('file_label_rel_status_id')->index('fk_file_label_rel_status');
			$table->smallInteger('label_id')->unsigned()->index('fk_file_has_label');
			$table->smallInteger('file_id')->unsigned()->index('fk_label_consists_of_image');
			$table->integer('order_pos')->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_file_label_rel_created_by');
			$table->smallInteger('updated_by')->index('fk_file_label_rel_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_file_label_rel_deleted_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_file_label_rel');
	}

}
