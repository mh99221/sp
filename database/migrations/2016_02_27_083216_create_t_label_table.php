<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTLabelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_label', function(Blueprint $table)
		{
			$table->smallInteger('label_id', true)->unsigned();
			$table->boolean('label_status_id')->index('fk_label_status');
			$table->smallInteger('party_id')->unsigned()->index('fk_label_belongs_to_party');
			$table->string('label_name', 100);
			$table->string('label_descr', 500)->nullable();
			$table->char('gallery_flag', 1)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_label_created_by');
			$table->smallInteger('updated_by')->index('fk_label_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_label_deleted_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_label');
	}

}
