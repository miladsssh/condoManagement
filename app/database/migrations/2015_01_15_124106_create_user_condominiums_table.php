<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCondominiumsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_condominiums', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->index();
			$table->integer('condominium_id')->index();
			$table->integer('role')->index();
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
		Schema::drop('user_condominiums');
	}

}
