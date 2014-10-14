<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('pno');
			$table->string('title');
			$table->text('description');
			$table->float('price');
			$table->integer('category_id')->unsigned();
			$table->boolean('availability')->default(1);
			$table->integer('stock');
			$table->string('fimg');
			$table->string('img2');
			$table->string('img3');
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
		Schema::drop('products');
	}

}
