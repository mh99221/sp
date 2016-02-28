<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTPartyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_party', function(Blueprint $table)
		{
			$table->smallInteger('party_id', true)->unsigned();
			$table->integer('master_record_id')->nullable();
			$table->tinyInteger('party_status_id')->index('fk_party_status')->unsigned();
			$table->string('party_url', 256);
			$table->string('full_name', 100);
			$table->tinyInteger('salutation_id')->index('fk_party_salutation')->unsigned();
			$table->string('title_prefix', 30)->nullable();
			$table->string('first_name', 30)->nullable();
			$table->string('last_name', 30)->nullable();
			$table->string('title_suffix', 30)->nullable();
			$table->dateTime('birth_date')->nullable();
			$table->char('individual_flag', 1);
			$table->string('party_profile', 2000)->nullable();
			$table->string('logo', 256)->nullable();
			$table->string('link', 256)->nullable();
			$table->string('party_descr', 500)->nullable();
			$table->string('ico', 30)->nullable();
			$table->string('dic', 30)->nullable();
			$table->string('ic_dph', 30)->nullable();
			$table->dateTime('registration_date');
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_party_created_by');
			$table->smallInteger('updated_by')->index('fk_party_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_party_deleted_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_party');
	}

}
