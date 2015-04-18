<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBalanceSheetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('balance_sheets', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('company_id');
			$table->string('liability', 100);
			$table->decimal('liability_amount', 10,2);
			$table->string('asset', 100);
			$table->decimal('asset_amount', 10,2);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('balance_sheets');
	}

}
