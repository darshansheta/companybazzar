<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('roc_office_id');
			$table->integer('company_type_id');
			$table->string('company_code', 50)->nullable();
			$table->datetime('incorporation_date');
			$table->datetime('last_balance_sheet_date');
			$table->decimal('authorized_capital', 19,4);
			$table->decimal('paidup_capital', 19,4);
			$table->datetime('compliance_upto_date')->nullable();
			$table->boolean('in_lost');
			$table->decimal('lost_amount', 19,4)->nullable();
			$table->integer('number_of_charge');
			$table->boolean('active');
			$table->decimal('max_price', 19,4);
			$table->decimal('min_price', 19,4);
			$table->softDeletes();
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
		Schema::drop('companies');
	}

}
