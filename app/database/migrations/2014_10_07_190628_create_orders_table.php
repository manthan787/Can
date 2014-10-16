<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('firstname');
			$table->string('lastname');
			$table->text('address');
			$table->string('email');
			$table->string('city');
			$table->integer('state_id')->unsigned();
			$table->string('phone');
			$table->string('PIN');
			$table->integer('user_id')->unsigned();
			$table->boolean('status')->default(0);
			$table->boolean('c')->default(0);
			$table->boolean('abandoned')->default(0);
			$table->boolean('paymeth')->default(0);
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
		Schema::dropIfExists('orders');
	}

}
