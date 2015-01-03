<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email', 60);
			$table->string('password', 60);
			$table->string('first_name', 60);
			$table->string('last_name', 60);
			$table->string('picture', 45);
			$table->string('contact_number', 45);
			$table->string('date_of_birth', 45);
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
		Schema::drop('users');
	}

}
