<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTCommentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_comment', function(Blueprint $table)
		{
			$table->foreign('created_by', 'fk_comment_created_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('deleted_by', 'fk_comment_deleted_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('review_id', 'fk_comment_on_review')->references('review_id')->on('t_review')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('comment_status_id', 'fk_comment_status')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('updated_by', 'fk_comment_updated_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('parent_comment_id', 'fk_parent_comment')->references('comment_id')->on('t_comment')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('party_id', 'fk_party_commented')->references('party_id')->on('t_party')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_comment', function(Blueprint $table)
		{
			$table->dropForeign('fk_comment_created_by');
			$table->dropForeign('fk_comment_deleted_by');
			$table->dropForeign('fk_comment_on_review');
			$table->dropForeign('fk_comment_status');
			$table->dropForeign('fk_comment_updated_by');
			$table->dropForeign('fk_parent_comment');
			$table->dropForeign('fk_party_commented');
		});
	}

}
