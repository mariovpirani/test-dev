<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketStatus extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('ticket_status', function (Blueprint $table) {
			$table->increments('id');
			$table->string('ticketSituacao');
		});

		DB::table('ticket_status')->insert([
			array('ticketSituacao' => 'Aberto'),
			array('ticketSituacao' => 'Respondido'),
			array('ticketSituacao' => 'Respondido pelo Cliente'),
			array('ticketSituacao' => 'Fechado')]
		);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('ticket_status');
	}
}
