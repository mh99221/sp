<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTArticleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_article', function(Blueprint $table)
		{
			$table->smallInteger('article_id', true)->unsigned();
			$table->boolean('article_status_id')->index('fk_article_status');
			$table->string('article_title', 100);
			$table->string('article_intro', 500)->nullable();
			$table->text('article_body', 65535);
			$table->string('cover_image', 256)->nullable();
			$table->string('source_name', 100)->nullable();
			$table->string('source_link', 256)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_article_created_by');
			$table->smallInteger('updated_by')->index('fk_article_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_article_deleted_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_article');
	}

}
