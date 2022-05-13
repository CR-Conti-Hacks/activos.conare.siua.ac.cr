<?php

    /*****************************************************************************************/
	/******************************      PATH         ****************************************/
	/*****************************************************************************************/
	$path='../';
	include($path."Include/Bd/bd.php");
	include($path."configuracion.php");


   /***************************************************************************/
   /****************************PARAMETROS  ***********************************/
   /***************************************************************************/
   /**************************************************/
   /******** TAB02: DATOS PERSONALES *****************/
   /**************************************************/
   $Tipo              = (isset($_POST['Tipo'])) ? $_POST['Tipo'] : '';
   $TI               = (isset($_POST['TI'])) ? $_POST['TI'] : '';
   $txt_cedula       = (isset($_POST['txt_cedula'])) ? $_POST['txt_cedula'] : '';
   $txt_residencia   = (isset($_POST['txt_residencia'])) ? $_POST['txt_residencia'] : '';
   $txt_pasaporte    = (isset($_POST['txt_pasaporte'])) ? $_POST['txt_pasaporte'] : '';
   
   $txt_nombre       = (isset($_POST['txt_nombre'])) ? $_POST['txt_nombre'] : '';
   /*Convertir la primera letra a mayuscula y el resto a minuscula*/
   $tmp1 = strtoupper(substr($txt_nombre,0,1));
   $tmp2 = strtolower(substr($txt_nombre,1,strlen($txt_nombre)-1));
   $txt_nombre = $tmp1.$tmp2;
   
   $txt_ape1         = (isset($_POST['txt_ape1'])) ? $_POST['txt_ape1'] : '';
   /*Convertir la primera letra a mayuscula y el resto a minuscula*/
   $tmp1 = strtoupper(substr($txt_ape1,0,1));
   $tmp2 = strtolower(substr($txt_ape1,1,strlen($txt_ape1)-1));
   $txt_ape1 = $tmp1.$tmp2;
   
   $txt_ape2         = (isset($_POST['txt_ape2'])) ? $_POST['txt_ape2'] : '';
   /*Convertir la primera letra a mayuscula y el resto a minuscula*/
   $tmp1 = strtoupper(substr($txt_ape2,0,1));
   $tmp2 = strtolower(substr($txt_ape2,1,strlen($txt_ape2)-1));
   $txt_ape2 = $tmp1.$tmp2;
   
   $Fecha_Nacimiento = (isset($_POST['Fecha_Nacimiento'])) ? $_POST['Fecha_Nacimiento'] : '';
   $genero           = (isset($_POST['genero'])) ? $_POST['genero'] : '';
   $grado_academico  = (isset($_POST['grado_academico'])) ? $_POST['grado_academico'] : '';
   
   /**************************************************/
   /******** TAB03: DATOS UBICACION  *****************/
   /**************************************************/
   $paises           = (isset($_POST['paises'])) ? $_POST['paises'] : '';
   $provincias       = (isset($_POST['provincias'])) ? $_POST['provincias'] : '';
   $cantones         = (isset($_POST['cantones'])) ? $_POST['cantones'] : '';
   $distritos        = (isset($_POST['distritos'])) ? $_POST['distritos'] : '';
   $direccion        = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';
   
   /**************************************************/
   /******** TAB04: DATOS TELEFONOS  *****************/
   /**************************************************/
   $telefonos        = (isset($_POST['telefonos'])) ? $_POST['telefonos'] : '';
   $tipos_tel        = (isset($_POST['tipos_tel'])) ? $_POST['tipos_tel'] : '';
   $noti_tel         = (isset($_POST['noti_tel'])) ? $_POST['noti_tel'] : '';
   $publi_tel        = (isset($_POST['publi_tel'])) ? $_POST['publi_tel'] : '';
   
   /**************************************************/
   /******** TAB05: DATOS CORREOS    *****************/
   /**************************************************/
   $correos          = (isset($_POST['correos'])) ? $_POST['correos'] : '';
   $noti_cor         = (isset($_POST['noti_cor'])) ? $_POST['noti_cor'] : '';
   $publi_cor        = (isset($_POST['publi_cor'])) ? $_POST['publi_cor'] : '';
   
   /**************************************************/
   /******** TAB06: DATOS EDUCACION  *****************/
   /**************************************************/
   $centrostrabajo   = (isset($_POST['centrostrabajo'])) ? $_POST['centrostrabajo'] : '';
   $universidades    = (isset($_POST['universidades'])) ? $_POST['universidades'] : '';
   $escuelas         = (isset($_POST['escuelas'])) ? $_POST['escuelas'] : '';
   $carreras         = (isset($_POST['carreras'])) ? $_POST['carreras'] : '';
   
   /**************************************************/
   /********    TAB07: DATOS USUARIO *****************/
   /**************************************************/
   $id_usuario       = (isset($_POST['id_usuario'])) ? $_POST['id_usuario'] : '';
   $contrasenna      = (isset($_POST['contrasenna'])) ? $_POST['contrasenna'] : '';
   $preguntas        = (isset($_POST['preguntas'])) ? $_POST['preguntas'] : '';
   $respuesta        = (isset($_POST['respuesta'])) ? $_POST['respuesta'] : '';

   /**************************************************/
   /*****    Saber cual identifiacion guardar    *****/
   /**************************************************/
   if($TI==1){
      $identificacion = $txt_cedula;
   }elseif($TI==2){
      $identificacion = $txt_residencia;
   }elseif($TI==3){
      $identificacion = $txt_pasaporte;
   }
   
   
   /**************************************************/
   /*****    Determinar nivel de ubicacion       *****/
   /**************************************************/
   $sql ="SELECT
			Direccion_Conf,
			Telefono_Conf,
			Id_Pai_Conf,
			Nivel_Ubicacion_Conf,
			Pedir_Fecha_Nacimiento,
			Pedir_Grados_Academicos,
			Nombre_Conf,
			Nombre_Resumen_Conf,
			Email_Conf,
			Enviar_Correo_Inscripcion_Conf,
			Direccion_Carpeta_Conf,
			Direccion_Web_Conf,
			Mostrar_Logo_Conf,
			Logo_Empresa_Conf,
			Fax_Conf,
			Direccion_Facebook_Conf,
			Direccion_Twitter_Conf,
			Direccion_GooglePlus_Conf
			FROM tab_configuracion WHERE Id_Conf = 1";
   $res_conf = seleccion($sql);
	
   
   $Direccion_Conf = $res_conf[0]['Direccion_Conf'];
   $Telefono_Conf = $res_conf[0]['Telefono_Conf'];
   $Id_Pai_Conf = $res_conf[0]['Id_Pai_Conf'];
   $Nivel_Ubicacion_Conf = $res_conf[0]['Nivel_Ubicacion_Conf'];
   $Pedir_Grados_Academicos = $res_conf[0]['Pedir_Grados_Academicos'];
   $Pedir_Fecha_Nacimiento = $res_conf[0]['Pedir_Fecha_Nacimiento'];
   $Nombre_Conf = $res_conf[0]['Nombre_Conf'];
   $Nombre_Resumen_Conf = $res_conf[0]['Nombre_Resumen_Conf'];
   $Email_Conf = $res_conf[0]['Email_Conf'];
   $Enviar_Correo_Inscripcion_Conf = $res_conf[0]['Enviar_Correo_Inscripcion_Conf'];
   $Direccion_Carpeta_Conf = $res_conf[0]['Direccion_Carpeta_Conf'];
   $Direccion_Web_Conf = $res_conf[0]['Direccion_Web_Conf'];
   $Mostrar_Logo_Conf = $res_conf[0]['Mostrar_Logo_Conf'];
   $Logo_Empresa_Conf = $res_conf[0]['Logo_Empresa_Conf'];
   $Fax_Conf = $res_conf[0]['Fax_Conf'];
   $Direccion_Facebook_Conf = $res_conf[0]['Direccion_Facebook_Conf'];
   $Direccion_Twitter_Conf = $res_conf[0]['Direccion_Twitter_Conf'];
   $Direccion_GooglePlus_Conf = $res_conf[0]['Direccion_GooglePlus_Conf'];

   /* determinar el codigo del para el número de telefono*/
   $sql ="SELECT Codigo_Pai FROM tab_paises WHERE Id_Pai = ".$Id_Pai_Conf;
   $res_codigo_pai = seleccion($sql);
   $Codigo_Pai = $res_codigo_pai[0]['Codigo_Pai'];
   
    
   if($Nivel_Ubicacion_Conf==1){
	  $provincias = "NULL";
	  $cantones = "NULL";
	  $distritos ="NULL";
   }elseif($Nivel_Ubicacion_Conf==2){
	  $cantones = "NULL";
	  $distritos ="NULL";
   }elseif($Nivel_Ubicacion_Conf==3){
	  $distritos ="NULL";
   }
   
   if($Pedir_Grados_Academicos==0){
	  $grado_academico = "NULL";
   }
   
   if($Pedir_Fecha_Nacimiento==0){
	  $Fecha_Nacimiento = "NULL";
   }
   
   /**************************************************/
   /******** TAB01: DATOS FOTO       *****************/
   /**************************************************/
   //Trae foto
   $foto = "NULL";
   if($_FILES["foto"]['name']!=''){
	  //obtener la extension
	  $img = $_FILES['foto']['name'];
	  $ext = pathinfo($img, PATHINFO_EXTENSION);
	  
	  if(move_uploaded_file ( $_FILES [ 'foto' ][ 'tmp_name' ], $path.'img/Usuarios/' .$identificacion.".".$ext)){
			$foto = $identificacion.".".$ext;
									
	  }else{
			echo 'e1'; //ERROR: Al subir la foto;
	  } 
	
   //no trae foto
   }
 
   $sql = "INSERT INTO tab_personas (
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
                                    Direccion_Per,
                                    Fecha_Nacimiento_Per,
                                    Foto_Per,
                                    Activo_Per
                                    )
									VALUES(".
									"'".$identificacion."',".
									"'".$TI."',".
									$paises.",".
									$provincias.",".
									$cantones.",".
									$distritos.",".
									$grado_academico.",".
									"'".$txt_nombre."',".
									"'".$txt_ape1."',".
									"'".$txt_ape2."',".
									"'".$genero."',".
									"'".$direccion."',".
									"'".$Fecha_Nacimiento."',";
									
									//Determinar si la foto esta vacia envie NULL
									if($foto=="NULL"){
									   $sql .= $foto.",";
									}else{
									   $sql .= "'".$foto."',";
									}
									$sql .= "'1')";

   $res = transaccion($sql);
   if ($res[0]== 1){
	  /**************************************************/
	  /*************** Obtener ID de Usuario ************/
	  /**************************************************/
	  $sql ="SELECT Id_Per FROM tab_personas WHERE Cedula_Per='".$identificacion."'";
	  $res_id_per = seleccion($sql);
	  $Id_Per = $res_id_per[0]['Id_Per'];
	  
	  /**************************************************/
	  /*************** TELEFONOS ************************/
	  /**************************************************/
	  $telefonos=split("/",$telefonos);
      $tipos_tel=split("/",$tipos_tel);
      $noti_tel=split("/",$noti_tel);
      $publi_tel=split("/",$publi_tel);    
      for($i=0; $i < count($telefonos)-1; $i++){
		 $sql="INSERT INTO tab_telefonos (Id_Tip_Tel_Tel,Id_Per_Tel, Telefono_Tel,Notificacion_Tel, Publico_Tel)
               VALUES (".$tipos_tel[$i].",".$Id_Per.",'".$telefonos[$i]."','".$noti_tel[$i]."','".$publi_tel[$i]."')";
		 $res = transaccion($sql);
	  }
	  if($res[0] == 1){
		 $correos=split("/",$correos);
         $noti_cor=split("/",$noti_cor);
         $publi_cor=split("/",$publi_cor);
		 for($i=0; $i < count($correos)-1; $i++){
			$sql="INSERT INTO tab_correos (Id_Per_Cor,Correo_Cor, Notificacion_Cor, Publico_Cor)
						VALUES (".$Id_Per.",'".strtolower($correos[$i])."','".$noti_cor[$i]."','".$publi_cor[$i]."')";
            $res = transaccion($sql);
		 }
		 if($res[0] == 1){
			if($Tipo=="Estu"){
			   $sql = "SELECT Id_Rol_Estu_Conf FROM tab_configuracion WHERE Id_Conf = 1";
			   $res_rol = seleccion($sql);
			   $Id_Rol = $res_rol[0]['Id_Rol_Estu_Conf'];
			}elseif($Tipo=="Emp"){
			   $sql = "SELECT Id_Rol_Emp_Conf FROM tab_configuracion WHERE Id_Conf = 1";
			   $res_rol = seleccion($sql);
			   $Id_Rol = $res_rol[0]['Id_Rol_Emp_Conf'];
			}
			
			$sql ="INSERT INTO tab_usuarios(Id_Per_Usu, Id_Rol_Usu,Id_Preg_Usu,Respuesta_Preg_Usu,Password_Usu,Activo_Usu)
				  VALUES (".$Id_Per.",".$Id_Rol.",".$preguntas.",'".$respuesta."','".$contrasenna."','1')";
			$res = transaccion($sql);
			if($res[0]==1){
			   if($Tipo=='Estu'){
				  $centrostrabajo=split("/",$centrostrabajo);
				  $universidades=split("/",$universidades);
				  $escuelas=split("/",$escuelas);
				  $carreras=split("/",$carreras);
				  for($i=0; $i < count($centrostrabajo)-1; $i++){
					 /*******************************************************************/
					 /********************** Comprobar existencia ***********************/
					 /*******************************************************************/
					 $sql = "SELECT Id_Per_PXCT FROM tab_personas_x_ct WHERE Id_Per_PXCT = ".$Id_Per." AND Id_CT_PXCT = ".$centrostrabajo[$i];
					 $res_ct = seleccion($sql);
					 if($res_ct[0]['Id_Per_PXCT']==''){
						$sql ="INSERT INTO tab_personas_x_ct (Id_Per_PXCT,Id_CT_PXCT)
							  VALUES(".$Id_Per.",".$centrostrabajo[$i].")";
						$res = transaccion($sql);	
					 }
					 
					 $sql = "SELECT Id_Per_PXU FROM tab_personas_x_universidades WHERE Id_Per_PXU = ".$Id_Per." AND Id_Uni_PXU=".$universidades[$i];
					 $res_uni = seleccion($sql);
					 if($res_uni[0]['Id_Per_PXU']==''){
						$sql ="INSERT INTO tab_personas_x_universidades (Id_Per_PXU,Id_Uni_PXU)
							  VALUES(".$Id_Per.",".$universidades[$i].")";
						$res = transaccion($sql);
					 }
					 
					 $sql = "SELECT Id_Per_PXE FROM tab_personas_x_escuelas WHERE Id_Per_PXE = ".$Id_Per." AND Id_Esc_PXE=".$escuelas[$i];
					 $res_esc = seleccion($sql);
					 if($res_esc[0]['Id_Per_PXCT']==''){
						$sql ="INSERT INTO tab_personas_x_escuelas (Id_Per_PXE,Id_Esc_PXE)
							  VALUES(".$Id_Per.",".$escuelas[$i].")";
						$res = transaccion($sql);
					 }
					
					 $sql = "SELECT Id_Per_PXC FROM tab_personas_x_carreras WHERE Id_Per_PXC = ".$Id_Per." AND Id_Car_PXC=".$carreras[$i];
					 $res_car = seleccion($sql);
					 if($res_car[0]['Id_Per_PXCT']==''){
						$sql ="INSERT INTO tab_personas_x_carreras (Id_Per_PXC,Id_Car_PXC)
							  VALUES(".$Id_Per.",".$carreras[$i].")";
						$res = transaccion($sql);
					 }
					
					
				  }

			   }
			   /*********************************************************************/
			   /************************** ENVIAR CORREO ****************************/
			   /*********************************************************************/
			   if($Enviar_Correo_Inscripcion_Conf==1){
				  if($Mostrar_Logo_Conf==1 && $Logo_Empresa_Conf!=''){
					 //$img_logo = $Direccion_Web_Conf.$Direccion_Carpeta_Conf."img/Logo/".$Logo_Empresa_Conf;
					 $img_logo = "http://sae.siua.ac.cr/img/Logo/ugit.png";
				  }
				  //Si es hombre
				  if($genero==1){
					  $Saludo = $texto['Bienvenido'];
				  }elseif($genero ==2){
					  $Saludo = $texto['Bienvenida'];
				  }
				  $asunto = $texto['CORREO_EXITO_Bienvenido_A'].' '.$Nombre_Conf;

				
				  $headers  = 'MIME-Version: 1.0' . "\r\n";
				  $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
				  $headers .= "From:".'=?utf-8?B?'.base64_encode($Nombre_Conf).'?='."<".$Email_Conf.">\r\n"; 

				  $sql="SELECT Correo_Cor FROM tab_correos
						    WHERE Id_Per_Cor = ".$Id_Per."
						    AND Notificacion_Cor ='1'";
				  $res_cor = seleccion($sql);
				  //Determinar la plantilla de correo a utilizar
				  $sql ="SELECT Id_PlanCor_Inscripcion_Conf FROM tab_configuracion";
				  $res_placor = seleccion($sql);
				  $Id_PlanCor = $res_placor[0]['Id_PlanCor_Inscripcion_Conf'];
				  
				  $sql = "SELECT Direccion_PlanCor FROM tab_plantillas_correos  WHERE Id_PlanCor = ".$Id_PlanCor;
				  $res_plantilla = seleccion($sql);
				  
				  
				  //Correos destinatarios
				  
				  for($i=0;$i<count($res_cor);$i++){
					 $Para = $res_cor[$i]['Correo_Cor'];
					 $Mensaje = require($path.$res_plantilla[0]['Direccion_PlanCor']);
					 mail($Para, '=?utf-8?B?'.base64_encode($asunto).'?=', $Mensaje , $headers);
					 $Mensaje = NULL;
				  }	
				  echo 1;
				  
			   }else{
				  echo 1; //EXITO: se inscribio correctamente el usuario (Sin envio de correo)
			   }
			   
			}else{
			   echo 'e5'; //ERROR: insertando usuario
			}
		 }else{
			echo 'e4'; //ERROR: insertando correos	
		 }	
   
	  }else{
		echo 'e3'; //ERROR: insertando telefonos
	  }
	  
   }else{
	  echo 'e2'; //ERROR: insertando persona
   }
?>
