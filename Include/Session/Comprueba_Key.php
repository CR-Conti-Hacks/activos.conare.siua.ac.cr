<?php
    $sql = "SELECT Nombre_Session_Conf, Direccion_Carpeta_Conf, Direccion_Web_Conf, Tiempo_Session_Conf FROM tab_configuracion";
	$res_principal = seleccion($sql);
	$dominio = $res_principal[0]['Direccion_Web_Conf'];
	$ruta = $res_principal[0]['Direccion_Carpeta_Conf'];
    if(isset($Id_Per_Usu)){
        $sql = "SELECT Key_Usu FROM tab_usuarios WHERE Id_Per_Usu=".$Id_Per_Usu;
        $key = seleccion($sql);
        if($key[0]['Key_Usu']!=$Key_Usu){
?>
        <script>
           alert(texto['ERROR_Pagina_No_Permitida_URL']);
           location.href = "<?=$dominio.$ruta?>index.php"; 
        </script>
<?php
		exit;
        }
    }else{
?>
    <script type="text/javascript" src="<?=$path?>lang/lang.<?=$idioma?>.js"></script>
    <script>
        alert(texto['ERROR_Pagina_No_Permitida_URL']);
        location.href = "<?=$dominio.$ruta?>index.php";
    </script>
<?php
	exit;
    }
?>

