<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicket extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('ticket', function (Blueprint $table) {
			$table->increments('id');
			$table->string('customerName');
			$table->string('customerEmail');
			$table->integer('customerId')->unsigned();
			$table->string('ticketTitle');
			$table->integer('ticketStatusId')->unsigned();
			$table->longText('ticketContent');
			$table->date('ticketDate');
			$table->string('ticketToken');
			$table->integer('orderId')->unsigned();
			$table->timestamps();
			$table->foreign('customerId')->references('id')->on('customer');
			$table->foreign('ticketStatusId')->references('id')->on('ticket_status');

		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('ticket');
	}
}
