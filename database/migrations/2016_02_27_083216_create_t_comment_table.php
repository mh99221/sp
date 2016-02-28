<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTCommentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_comment', function(Blueprint $table)
		{
			$table->smallInteger('comment_id', true)->unsigned();
			$table->boolean('comment_status_id')->index('fk_comment_status');
			$table->smallInteger('parent_comment_id')->unsigned()->nullable()->index('fk_parent_comment');
			$table->smallInteger('party_id')->unsigned()->index('fk_party_commented');
			$table->smallInteger('review_id')->unsigned()->nullable()->index('fk_comment_on_review');
			$table->string('comment_title', 100);
			$table->string('comment_body', 2000);
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_comment_created_by');
			$table->smallInteger('updated_by')->index('fk_comment_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_comment_deleted_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_comment');
	}

}
