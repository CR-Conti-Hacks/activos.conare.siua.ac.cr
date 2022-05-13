<?php
	//Codificacion UTF-8
    header('Content-Type: text/html; charset=utf-8');
    
    //Zona Horaria
    date_default_timezone_set('America/Costa_Rica');

	/***************************************************************************/
	/*
	Esta pagina verifica si por alguna razon no existe la session del usuario
	Otiene alterados los datos del usuario en la session, principalmente
	la cedula y el Id de usuario
	Ademasn comprubea que la URL generada por el sistema y guadarda enla session sea
	igaul a la del navegador
	*/
	
	//comprueba si la funcion existe
	if(!function_exists ('seleccion')){
		include('Include/Bd/bd.php');
	}
	$sql = "SELECT Nombre_Session_Conf, Direccion_Carpeta_Conf, Direccion_Web_Conf, Tiempo_Session_Conf FROM tab_configuracion";
	$res_principal = seleccion($sql);
	$dominio = $res_principal[0]['Direccion_Web_Conf'];
	$ruta = $res_principal[0]['Direccion_Carpeta_Conf'];
	
	if(isset($Id_Per_Usu)){
		/*obtener el nombre de la session*/
		$sql="SELECT Nombre_Session_Usu, Key_Usu FROM tab_usuarios WHERE Id_Per_Usu = ".$Id_Per_Usu;
		$res=seleccion($sql);
		
		
		//Abrimos la session
		session_name($res[0]['Nombre_Session_Usu']);
		session_start();
		//Preguntamos si hay una session con datos para la cedula logeada, sino hay reseteamos los datos de conexion
		if(($_SESSION["Cedula_Per"]=='')||($_SESSION["Cedula_Per"] != $cedula_global) ||($_SESSION["Id_Per_Usu"]=='')||($_SESSION["Id_Per_Usu"]!= $Id_Per_Usu)){
			$sql = "UPDATE tab_usuarios SET Estado_Conexion_Usu = 0, Fecha_Hora_Conexion_Usu=NULL, Key_Usu = NULL, Nombre_Session_Usu = NULL, URL_Usu = NULL 
						  WHERE Id_Per_Usu = ".$Id_Per_Usu;
			$destroy = transaccion($sql);
?>
			<script type="text/javascript">
				//alert(texto['ERROR_Pagina_No_Permitida']);
				//location.href = "<?=$dominio.$ruta?>index.php";
			</script>   

<?php
		exit;
		}
	}
?>

		<script type="text/javascript">
    
            function CompruebaURL(direccion_php) {
                if(direccion_php != document.URL){
                    alert(texto['ERROR_Pagina_No_Permitida_URL']);
                    location.href = "<?=$dominio.$ruta?>index.php";             
                }
            }
		</script>
            <?php
				//verificamos si la session existe
				//comprobamos si la URL de la session
				//es igual al aescrita en el navegador
				if(isset($_SESSION['dir_url'])){
			?>
		<script type="text/javascript">
				CompruebaURL('<?php echo $_SESSION['dir_url']; ?>')
		</script>
			<?php
				//la sesion ni existe saquelo
				}else{
			?>
		<script type="text/javascript" src="<?=$path?>lang/lang.<?=$idioma?>.js"></script>
		<script type="text/javascript">
					alert(texto['ERROR_Pagina_No_Permitida_URL']);
                    location.href = "<?=$dominio.$ruta?>index.php"; 
			
            
        </script>     
			<?php
			exit;
				}
			?>


