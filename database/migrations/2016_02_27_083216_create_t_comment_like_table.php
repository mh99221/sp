<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTCommentLikeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_comment_like', function(Blueprint $table)
		{
			$table->smallInteger('comment_like_id', true)->unsigned();
			$table->boolean('comment_like_status_id')->index('fk_comment_like_status');
			$table->smallInteger('user_id')->index('fk_comment_liked_by_user');
			$table->smallInteger('comment_id')->unsigned()->index('fk_user_likes_comment');
			$table->boolean('comment_like_type_id')->index('fk_comment_like_type');
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_comment_like_created_by');
			$table->smallInteger('updated_by')->index('fk_comment_like_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_comment_like_deleted_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_comment_like');
	}

}
