<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTLovTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_lov', function(Blueprint $table)
		{
			$table->boolean('lov_id')->primary();
			$table->string('lov_type', 30);
			$table->string('lov_name', 100);
			$table->string('lov_name_sk', 100)->nullable();
			$table->string('lov_name_cz', 100)->nullable();
			$table->string('lov_descr', 500)->nullable();
			$table->integer('order_pos');
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_lov_created_by');
			$table->smallInteger('updated_by')->index('fk_lov_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_lov_deleted_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_lov');
	}

}
