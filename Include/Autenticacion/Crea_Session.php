<?php

	/*************************************************************/
	/*********************** Activar session *********************/
	/*************************************************************/
	 /*obtener el nombre de la session*/
		$sql="SELECT Nombre_Session_Usu FROM tab_usuarios WHERE Id_Per_Usu = ".$Id_Per_Usu;
		$res_session=seleccion($sql);
	/*************************************************************/
	
	
	//Subir los datos de la persona
	$sql = "SELECT
                Cedula_Per,
                Tipo_Identificacion_Per, 
                Id_Pai_Per,
                Id_Pro_Per,
                Id_Can_Per,
                Id_Dist_Per,
                Id_GA_Per,
                Nombre_Per,
                Apellido1_Per,
                Apellido2_Per,
                Genero_Per,
                Direccion_Per
            FROM tab_personas
            WHERE Id_Per = ".$Id_Per_Usu;
	$res = seleccion($sql);
	

	//Subir los datos del usuario a la session


		//Subir los datos de la persona  a session
        $_SESSION["Id_Per_Usu"] = $Id_Per_Usu;
		$_SESSION["Cedula_Per"] = $cedula_global;
        $_SESSION["Tipo_Identificacion_Per"] = $res[0]["Tipo_Identificacion_Per"];
		$_SESSION["Id_Pai_Per"] = $res[0]["Id_Pai_Per"];
		$_SESSION["Id_Pro_Per"] = $res[0]["Id_Pro_Per"];
		$_SESSION["Id_Can_Per"] = $res[0]["Id_Can_Per"];
		$_SESSION["Id_Dist_Per"] = $res[0]["Id_Dist_Per"];
		$_SESSION["Id_GA_Per"] = $res[0]["Id_GA_Per"];
		$_SESSION["Nombre_Per"] = $res[0]["Nombre_Per"];
		$_SESSION["Apellido1_Per"] = $res[0]["Apellido1_Per"];
		$_SESSION["Apellido2_Per"] = $res[0]["Apellido2_Per"];
		$_SESSION["Genero_Per"] = $res[0]["Genero_Per"];
		$_SESSION["Direccion_Per"] = $res[0]["Direccion_Per"];
		
        //Obtenemos el ID de Rol
        $sql ="SELECT Id_Rol_Usu FROM tab_usuarios WHERE Id_Per_Usu = ".$Id_Per_Usu;
        $res_rol_usu = seleccion($sql);
        
        
        $sql = "SELECT Id_Der_Perm FROM tab_permisos WHERE Id_Rol_Perm = ".$res_rol_usu[0]["Id_Rol_Usu"]." ORDER BY Id_Der_Perm";
        $derechos = seleccion($sql);	
        
        $permisos = array();
        for($i=0;$i<count($derechos);$i++){
            $permisos[$i] = trim($derechos[$i]["Id_Der_Perm"]);
        
        }
    
    
		//Subir los derechos
		$_SESSION["Permisos"] = $permisos;
		
		
?>