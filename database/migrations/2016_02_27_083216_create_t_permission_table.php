<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTPermissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_permission', function(Blueprint $table)
		{
			$table->integer('permission_id', true);
			$table->smallInteger('user_id');
			$table->boolean('resource_type_id')->index('fk_permission_resource_type');
			$table->smallInteger('resource_id')->unsigned();
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_permission_created_by');
			$table->smallInteger('updated_by')->index('fk_permission_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_permission_deleted_by');
			$table->unique(['user_id','resource_type_id','resource_id'], 'ak_permission');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_permission');
	}

}
