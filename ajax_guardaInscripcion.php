<?php

    /****************************************/
    /****** codificación y timezone        **/
    /****************************************/
    header('Content-Type: text/html; charset=utf-8');
    date_default_timezone_set('America/Costa_Rica');


    /****************************************/
    /****** importamos la conexion a la BD **/
    /****************************************/
    include('Include/Bd/bd.php');
    
    /****************************************/
    /****** recibimos los datos  ************/
    /****************************************/
    $cedula =           $_GET['cedula'];
    $nombre =           $_GET['nombre'];
    $apellido =         $_GET['apellido'];
    $contrasena =       $_GET['contrasena'];
    $sexo =             $_GET['sexo'];
    $correo =           $_GET['correo'];
    $nacimiento =       $_GET['nacimiento'];
    $telefono =         $_GET['telefono'];
    $recibir_correo =   $_GET['recibir_correo'];
    
    //como este campo tiene una forma 1/1/0 creamos un arreglo php
    //a partir de una cadena de texto segun separador '/'
    $intereses =        split("/",$_GET['intereses']);
    //pero ahorita lo vamos a como una cadena de texto
    $intereses =        $_GET['intereses'];
    
    
    
        /****************************************/
        /****** Creamos el insert    ************/
        /****************************************/
         $sql = "INSERT INTO tab_estudiante (   Cedula_Est, Id_Rol_Est,Nombre_Est,Apellido_Est,Contrasena_Est,Sexo_Est,
                                                Correo_Est,Fecha_Nacimiento_Est,Telefono_Est,Intereses_Est,Recibir_Correo_Est,
                                                Presente_Est,Nota_Est,Nombre_Session_Est,Key_Est,URL_Est,Estado_Con_Est,
                                                Fecha_Hora_Est,Activo_Est
                                            )
            VALUES
                                            (   '".utf8_decode($cedula)."',1,'".utf8_decode($nombre)."','".utf8_decode($apellido)."','".utf8_decode($contrasena)."','".utf8_decode($sexo)."',
                                                '".utf8_decode($correo)."','".utf8_decode($nacimiento)."','".utf8_decode($telefono)."','".utf8_decode($intereses)."','".utf8_decode($recibir_correo)."',
                                                null,null,null,null,null,null,null,'1')";
                                                
        $res = transaccion($sql);
        
        /****************************************/
        /****** Comprobamos el resultado *********/
        //1=exito (enviamos correo)
        //0=error
        /****************************************/
        if($res[0]==1){
            if($recibir_correo == '1'){
                                        //Paso #1: Establecemos el remitente
					$De  = "siuaprograweb.prograweb@gmail.com";
					
					//Paso #2: Establecemos el asunto
					$Asunto = "Bienvenido al Sistema de Votación";
					
					//Paso #3: Creamos la lista de destinatarios separados por coma ','
					$Para = $correo;
					
					//Paso #4: Creamos el correo en formato HTML y en forma de cadena PHP
					$Mensaje = '<! DOCTYPE html>
							<html lang="es">
							    <head>
								<meta charset="utf-8" >
								    <title>Sistema de Votación</title>
							    </head>
							    <body style="background-color:#327EDB;">
								<div style="height: 50px;"></div>
								<div style="
								    width: 600px;
								    height: 400px;
								    background-color: #FFF;
								    margin: 0 auto;
								    -webkit-border-radius: 35px;
								    -moz-border-radius: 35px;
								    border-radius: 35px;
								    padding:20px;">
								    <div id="header" style="width: 80%;height: 60px;margin: 0 auto;padding-top: 30px;color: #fff;text-align: center;background-color: #1A5DDB;font-family: Open Sans,Arial,sans-serif; font-size: 35px;-webkit-border-radius: 35px;
								    -moz-border-radius: 35px;
								    border-radius: 35px;">
									Sistema de Votación
								    </div>
								    <h1 style="display: block; text-align: center;color:#000;">Bienvenido...</h1>
								    <h2 style="display: block; text-align: center; color: #2E6DCC; font-size: 40px;">'.$nombre.' '.$apellido.'</h2>
								    <h1 style="display: block; text-align: center;color:#000;">...al Sistema de Votación</h1>
								     
								    
								    <div id="footer" style="width: 80%;height: 40px;margin: 0 auto;text-align: center;padding: 10px;font-family: Verdena; color: #C0C2C4">
								    Todos los derechos reservados @ prograweb
								    </div>
								</div>
								 <div style="height: 130px;"></div>
							    </body>
							</html>';
						
					
					//Paso #5: Establecemos los headers necesarios para el envio del correo
					$headers  = "From:".$De."\r\n"; 
					$headers .= "Content-type: text/html\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                                        
                                        if (mail($Para, $Asunto, $Mensaje , $headers)) {
                                            echo '1';
                                        }else{
                                            echo 'e2';
                                        }
            }else{
                echo '1';
            }
            
        }else{
            echo 'e1';
        }
?>
