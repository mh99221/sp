<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTArticleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_article', function(Blueprint $table)
		{
			$table->foreign('created_by', 'fk_article_created_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('deleted_by', 'fk_article_deleted_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('article_status_id', 'fk_article_status')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('updated_by', 'fk_article_updated_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_article', function(Blueprint $table)
		{
			$table->dropForeign('fk_article_created_by');
			$table->dropForeign('fk_article_deleted_by');
			$table->dropForeign('fk_article_status');
			$table->dropForeign('fk_article_updated_by');
		});
	}

}
