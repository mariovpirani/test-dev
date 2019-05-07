<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketAnswer extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('ticket_answer', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('ticketId')->unsigned();
			$table->string('ticketAnswerTitle');
			$table->string('ticketStatusId');
			$table->longText('ticketAnswerContent');
			$table->date('ticketAnswerDate');
			$table->integer('userId')->nullable();
			$table->string('userName')->nullable();
			$table->timestamps();
			$table->foreign('ticketId')->references('id')->on('ticket');
			//$table->foreign('userId')->references('id')->on('user');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('ticket_answer');
	}
}
