<?php

function cipher($texto, $llave, $sentido=1) {
	$encriptado="";
	$max       = strlen($texto);
	$lenllave  = strlen($llave);
	$sentido   = $sentido==1 ? 1 : -1;
	for( $i=0 ; $i < $max; $i++ ) {
		$variacion  = ord($llave[$i%$lenllave]);
		$encriptado.= chr( ord($texto[$i]) + $sentido*$variacion ); 
	}
	return $encriptado;
}

function encriptar($texto, $llave) {
	return base64_encode( cipher($texto,$llave,1));
}

function desencriptar($texto, $llave) {
	return cipher(base64_decode($texto),$llave,-1);
}
?>