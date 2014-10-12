<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderitemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_product', function(Blueprint $table){
			$table->increments('id');
			$table->integer('product_id')->unsigned();
			$table->integer('order_id')->unsigned();
			$table->integer('qty');
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
		Schema::dropIfExists('order_product');
	}

}
