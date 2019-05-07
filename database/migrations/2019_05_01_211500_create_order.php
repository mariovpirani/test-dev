<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrder extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('order_ticket', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('customerId')->unsigned();
			$table->string('orderToken');
			$table->integer('orderId');
			$table->date('orderDate');
			$table->timestamps();
			$table->foreign('customerId')->references('id')->on('customer');

		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('order');
	}
}
