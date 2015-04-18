<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyRequirementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_requirements', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('roc_office_id');
			$table->integer('company_type_id');
			$table->datetime('incorporation_date_from');
			$table->datetime('incorporation_date_to');
			$table->datetime('last_balance_sheet_date_from');
			$table->datetime('last_balance_sheet_date_to');
			$table->decimal('authorized_capital_from', 10,2);
			$table->decimal('authorized_capital_to', 10,2);
			$table->decimal('paidup_capital_from', 10,2);
			$table->decimal('paidup_capital_to', 10,2);
			$table->decimal('sell_price_from', 10,2);
			$table->decimal('sell_price_to', 10,2);
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
		Schema::drop('company_requirements');
	}

}
