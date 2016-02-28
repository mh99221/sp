<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTMessageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_message', function(Blueprint $table)
		{
			$table->smallInteger('message_id', true)->unsigned();
			$table->boolean('message_status_id')->index('fk_message_status');
			$table->boolean('message_type_id')->index('fk_message_has_type');
			$table->boolean('resource_type_id')->nullable()->index('fk_message_resource_type');
			$table->smallInteger('resource_id')->nullable();
			$table->string('message_title', 100);
			$table->string('message_body', 500);
			$table->dateTime('read_date')->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_message_created_by');
			$table->smallInteger('updated_by')->index('fk_message_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_message_deleted_by');
			$table->index(['resource_type_id','resource_id'], 'ix_message_resource');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_message');
	}

}
