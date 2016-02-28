<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTUserExtTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_user_ext', function(Blueprint $table)
		{
			$table->smallInteger('user_ext_id', true);
			$table->boolean('user_ext_status_id')->index('fk_user_ext_status');
			$table->smallInteger('user_id')->nullable()->index('fk_user_ext_user');
			$table->string('provider', 30)->index('provider');
			$table->string('provider_id_string', 100);
			$table->string('login_ext', 100);
			$table->string('first_name_ext', 30)->nullable();
			$table->string('last_name_ext', 30)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_user_ext_created_by');
			$table->smallInteger('updated_by')->index('fk_user_ext_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_user_ext_deleted_by');
			$table->unique(['provider','provider_id_string'], 'ak_User_Ext');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_user_ext');
	}

}
