<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTEmailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_email', function(Blueprint $table)
		{
			$table->foreign('created_by', 'fk_email_created_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('deleted_by', 'fk_email_deleted_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('sender_party_id', 'fk_email_received_from_party')->references('party_id')->on('t_party')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('receiver_party_id', 'fk_email_send_to_party')->references('party_id')->on('t_party')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('email_status_id', 'fk_email_status')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('email_type_id', 'fk_email_type')->references('lov_id')->on('t_lov')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('updated_by', 'fk_email_updated_by')->references('user_id')->on('t_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('service_request_id', 'fk_service_request_email')->references('service_request_id')->on('t_service_request')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('service_response_id', 'fk_service_response_email')->references('service_response_id')->on('t_service_response')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_email', function(Blueprint $table)
		{
			$table->dropForeign('fk_email_created_by');
			$table->dropForeign('fk_email_deleted_by');
			$table->dropForeign('fk_email_received_from_party');
			$table->dropForeign('fk_email_send_to_party');
			$table->dropForeign('fk_email_status');
			$table->dropForeign('fk_email_type');
			$table->dropForeign('fk_email_updated_by');
			$table->dropForeign('fk_service_request_email');
			$table->dropForeign('fk_service_response_email');
		});
	}

}
