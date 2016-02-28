<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTEmailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_email', function(Blueprint $table)
		{
			$table->smallInteger('email_id', true)->unsigned();
			$table->boolean('email_status_id')->index('fk_email_status');
			$table->smallInteger('sender_party_id')->unsigned()->index('fk_email_received_from_party');
			$table->smallInteger('receiver_party_id')->unsigned()->index('fk_email_send_to_party');
			$table->smallInteger('service_response_id')->unsigned()->nullable()->index('fk_service_response_email');
			$table->smallInteger('service_request_id')->unsigned()->nullable()->index('fk_service_request_email');
			$table->string('email_subject', 500);
			$table->text('email_body', 65535);
			$table->string('sender_email', 100);
			$table->string('receiver_email', 100);
			$table->dateTime('read_date')->nullable();
			$table->boolean('email_type_id')->index('fk_email_type');
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_email_created_by');
			$table->smallInteger('updated_by')->index('fk_email_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_email_deleted_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_email');
	}

}
