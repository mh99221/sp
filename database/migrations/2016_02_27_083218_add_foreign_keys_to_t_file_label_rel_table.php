<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTFileLabelRelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_file_label_rel', function(Blueprint $table)
		{
			$table->foreign('label_id', 'fk_file_has_label')->references('label_id')->on('t_label')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('created_by', 'fk_file_label_rel_created_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('deleted_by', 'fk_file_label_rel_deleted_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('updated_by', 'fk_file_label_rel_updated_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('file_id', 'fk_label_consists_of_image')->references('file_id')->on('t_file')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('file_label_rel_status_id', 'fk_label_rel_status')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_file_label_rel', function(Blueprint $table)
		{
			$table->dropForeign('fk_file_has_label');
			$table->dropForeign('fk_file_label_rel_created_by');
			$table->dropForeign('fk_file_label_rel_deleted_by');
			$table->dropForeign('fk_file_label_rel_updated_by');
			$table->dropForeign('fk_label_consists_of_image');
			$table->dropForeign('fk_label_rel_status');
		});
	}

}
