<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_tag', function(Blueprint $table)
		{
			$table->smallInteger('tag_id', true)->unsigned();
			$table->boolean('tag_status_id')->index('fk_tag_status');
			$table->string('tag_value', 30)->unique('ak_Tag');
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_tag_created_by');
			$table->smallInteger('updated_by')->index('fk_tag_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_tag_deleted_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_tag');
	}

}
