<?php

   
//funcion que me genera la seleccion de datos
function seleccion ($sql){  //esta funcion recibe el sql de seleccion a realizar, el usuario de la base de datos y el password del usuario 
	require 'bdcommon.inc'; //este archivo requerido nos dice el host de la base de datos y nos dice el nombre de la base de datos

	$a = array();
	$id_con = mysqli_connect ($db_host, $usuario, $clave) or die ("No se pudo comunicar con mysql");
	
	$con = mysqli_select_db($id_con, $db) or die ("No se pudo conectar a la base de datos");//selecciona la base de datos
	mysqli_set_charset($id_con, "utf8");
	$resultado = mysqli_query($id_con, $sql); // obtiene resultado de la base de datos
	
	$x = 0;
	while ($row = mysqli_fetch_array($resultado)){ //me almacena la seleccion hecha a la base de datos
		$a[$x] = $row; // almacena la seleccion en un vector
		$x++;
	}

	mysqli_close($id_con); //cierra la conexion con la base de datos
	return $a; //retorna el vector
			   	
}

//Devuelve un cero si la transaccion no se efectuo
function transaccion($sql){  //esta funcion recibe el sql a realizar, el usuario de la base de datos y el password del usuario 
	require 'bdcommon.inc'; //este archivo requerido nos dice el host de la base de datos y nos dice el nombre de la base de datos

	$id_con = mysqli_connect ($db_host, $usuario, $clave)or die ("No se pudo comunicar con mysql");// se conecta a la base de datos
	
	$con = mysqli_select_db($id_con, $db)or die ("No se pudo concetar a la base de datos"); //selecciona la base de datos
	mysqli_set_charset($id_con, "utf8");
	$resultado[0] = mysqli_query($id_con, $sql); //obtiene el resultado de la base de datos
	//$resultado[1] = mysql_get_last_message();//almacena el ultimo error del servidor
	mysqli_close($id_con);//cierra la conexion con la base de datos
	return $resultado; //retorna un uno si la transaccion se efectuo
}

?>