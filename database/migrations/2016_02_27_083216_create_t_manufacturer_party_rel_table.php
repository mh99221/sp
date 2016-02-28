<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTManufacturerPartyRelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_manufacturer_party_rel', function(Blueprint $table)
		{
			$table->smallInteger('manufacturer_party_rel_id', true)->unsigned();
			$table->boolean('manufacturer_party_rel_status_id')->nullable()->index('fk_manufacturer_party_status');
			$table->boolean('manufacturer_party_rel_type_id')->index('fk_manufacturer_party_rel_type');
			$table->smallInteger('manufacturer_id')->unsigned()->index('fk_party_represents_brand');
			$table->smallInteger('party_id')->unsigned()->index('fk_manufacturer_is_represented_by_party');
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('created_by')->index('fk_manufacturer_party_rel_created_by');
			$table->smallInteger('updated_by')->index('fk_manufacturer_party_rel_updated_by');
			$table->smallInteger('deleted_by')->nullable()->index('fk_manufacturer_party_rel_deleted_by');
			$table->unique(['party_id','manufacturer_id','manufacturer_party_rel_type_id'], 'ak_manufacturer_party_rel');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_manufacturer_party_rel');
	}

}
