<?php

namespace App\Helpers;

class Functions {
	public static function geraPass() {
		$number = rand(00000, 99999);
		return $chave = 'ww' . $number;
	}
	public static function geraToken($email) {
		return $token = md5($email);
	}

}

?>