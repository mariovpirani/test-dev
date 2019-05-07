<?php

//FUNÇÃO INVERTE DATA TROCANDO DE PT -> EN E EN -> PT
function inverteData($data) {
	if (count(explode("/", $data)) > 1) {
		return implode("-", array_reverse(explode("/", $data)));
	} elseif (count(explode("-", $data)) > 1) {
		return implode("/", array_reverse(explode("-", $data)));
	}
}

function geraHora($data) {
	$date = date_create();
	return $date = date_format($data, 'H:i:s');
}

?>