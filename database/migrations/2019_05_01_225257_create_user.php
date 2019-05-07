<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUser extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('user', function (Blueprint $table) {
			$table->increments('id');
			$table->string('userName');
			$table->string('userEmail');
			$table->string('userPass');
			$table->string('userToken');
			$table->string('userStatus');
			$table->timestamps();
		});
		DB::table('user')->insert([
			array(
				'userName' => 'Mario Veiga',
				'userEmail' => 'mariovpirani@gmail.com',
				'userPass' => md5('teste'),
				'userToken' => md5('mariovpirani@gmail.com'),
				'userStatus' => 1,
			)]
		);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('user');
	}
}
