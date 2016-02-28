<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTPartyRelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_party_rel', function(Blueprint $table)
		{
			$table->smallInteger('party_rel_id', true)->unsigned();
			$table->boolean('party_rel_status_id')->nullable()->index('fk_party_rel_status');
			$table->smallInteger('party_id')->unsigned();
			$table->smallInteger('related_party_id')->unsigned()->index('fk_related_party_2');
			$table->boolean('party_rel_type_id')->index('fk_party_rel_type');
			$table->string('related_party_function', 100)->nullable();
			$table->smallInteger('department_code_combi')->default(1);
			$table->string('brands', 100)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_party_rel_created_by');
			$table->smallInteger('updated_by')->index('fk_party_rel_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_party_rel_deleted_by');
			$table->unique(['party_id','related_party_id','party_rel_type_id','related_party_function'], 'ak_party_rel');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_party_rel');
	}

}
