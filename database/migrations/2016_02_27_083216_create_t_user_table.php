<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_user', function(Blueprint $table)
		{
			$table->smallInteger('user_id', true);
			$table->tinyInteger('user_status_id')->index('fk_user_status')->unsigned();
			$table->string('role', 30)->nullable();
			$table->smallInteger('party_id')->unsigned()->nullable()->unique('ak_user_party_id');
			$table->string('login', 30)->unique('ak_user_login');
			$table->string('password', 100)->nullable();
			$table->string('email', 100)->unique('ak_user_email');
			$table->char('public_flag', 1)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by');
			$table->smallInteger('updated_by');
			$table->smallInteger('deleted_by')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_user');
	}

}
