<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCondominiumsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('condominiums', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 45);
			$table->string('category', 45);
			$table->string('contact_number1', 45);
			$table->string('contact_number2', 45);
			$table->string('fax_number', 45);
			$table->string('country', 45);
			$table->string('state', 45);
			$table->string('city', 45);
			$table->string('address', 45);
			$table->string('post_code', 45);
			$table->integer('active');
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
		Schema::drop('condominiums');
	}

}
