<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Gestor_GET.php");
	/***************************************************************************/
    //Recibir los parametros
	$sql ="SELECT Id_Men, Mensaje_Men, Diseno_Men, Efecto_Men, Tipo_Men, Tiempo_Men,onClose_Men, onOpen_Men  FROM tab_mensajes_usuarios WHERE Id_Per_Usu_Men =".$Id_Per_Usu." AND Estado_Men = 0";
	$res = seleccion($sql);
	
	//Si no existen mensajes
	if(isset($res[0]['Id_Men'])){
		if($res[0]['Id_Men']==''){
			echo 0;
			exit;
		}else{
	
			$mensajes = '';
			for($i=0;$i <count($res);$i++){
				$mensajes .= $res[$i]['Id_Men'].'~'.$res[$i]['Mensaje_Men'].'~'.$res[$i]['Diseno_Men'].'~'.$res[$i]['Efecto_Men'].'~'.
				$res[$i]['Tipo_Men'].'~'.$res[$i]['Tiempo_Men'].'~'.$res[$i]['onOpen_Men'].'~'.$res[$i]['onOpen_Men'].'¤';
				$sql = "UPDATE tab_mensajes_usuarios SET Estado_Men = '1' WHERE Id_Men=".$res[$i]['Id_Men'];
				$res_cambia_estado = transaccion($sql);
			}
			echo $mensajes;
		}	
		
	}
	
	
?>