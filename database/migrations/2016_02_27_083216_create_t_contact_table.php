<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTContactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_contact', function(Blueprint $table)
		{
			$table->smallInteger('contact_id', true)->unsigned();
			$table->boolean('contact_type_id')->index('fk_contact_status');
			$table->boolean('contact_status_id')->index('fk_contact_type');
			$table->smallInteger('department_code_combi')->default(1);
			$table->smallInteger('party_id')->unsigned()->index('fk_contact_of_party');
			$table->string('contact_value', 256)->nullable();
			$table->char('primary_flag', 1)->index('ix_primary_flag');
			$table->string('note', 100)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_contact_created_by');
			$table->smallInteger('updated_by')->index('fk_contact_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_contact_deleted_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_contact');
	}

}
