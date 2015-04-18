<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompliancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('compliances', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('company_id');
			$table->string('label', 100);
			$table->boolean('is_compliance');
			$table->datetime('compliance_date');
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
		Schema::drop('compliances');
	}

}
