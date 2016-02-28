<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTHourTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_hour', function(Blueprint $table)
		{
			$table->smallInteger('hour_id', true)->unsigned();
			$table->boolean('hour_status_id')->index('fk_hour_status');
			$table->smallInteger('department_code_combi')->default(1);
			$table->smallInteger('party_id')->unsigned()->index('fk_working_hours');
			$table->string('mon', 100);
			$table->string('tue', 100);
			$table->string('wed', 100);
			$table->string('thu', 100);
			$table->string('fri', 100);
			$table->string('sat', 100)->nullable();
			$table->string('sun', 100)->nullable();
			$table->string('hld', 100)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_hour_created_by');
			$table->smallInteger('updated_by')->index('fk_hour_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_hour_deleted_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_hour');
	}

}
