<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
				$table->string('email');
				$table->string('firstname');
				$table->string('lastname');
				$table->text('address');
				$table->string('city');
				$table->integer('state_id')->unsigned();
				$table->string('phone');
				$table->string('PIN');
				$table->string('password');
				$table->string('password_temp');
				$table->boolean('admin')->default(0);
				$table->string('code');
				$table->string('remember_token');
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
