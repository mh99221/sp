<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTCommentLikeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_comment_like', function(Blueprint $table)
		{
			$table->foreign('user_id', 'fk_comment_liked_by_user')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('created_by', 'fk_comment_like_created_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('deleted_by', 'fk_comment_like_deleted_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('comment_like_status_id', 'fk_comment_like_status')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('comment_like_type_id', 'fk_comment_like_type')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('updated_by', 'fk_comment_like_updated_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('comment_id', 'fk_user_likes_comment')->references('comment_id')->on('t_comment')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_comment_like', function(Blueprint $table)
		{
			$table->dropForeign('fk_comment_liked_by_user');
			$table->dropForeign('fk_comment_like_created_by');
			$table->dropForeign('fk_comment_like_deleted_by');
			$table->dropForeign('fk_comment_like_status');
			$table->dropForeign('fk_comment_like_type');
			$table->dropForeign('fk_comment_like_updated_by');
			$table->dropForeign('fk_user_likes_comment');
		});
	}

}
