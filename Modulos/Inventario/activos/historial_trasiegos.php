<?php
	
	/*************************************************************************/
	/****************************SEGURIDAD ***********************************/
	/*************************************************************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");

	/*************************************************************************/
    /*******************  CONFIGURACIÓN ACTIVOS    ***************************/
    /*************************************************************************/
	include("configuracionActivos.php");

	
	/*************************************************************************/
	/****************************PARAMETROS  SAE  ****************************/
	/*************************************************************************/
	$mostrar_efecto     		= (isset($_GET['mostrar_efecto'])) 			? $_GET['mostrar_efecto'] 			: '';
    

	/*************************************************************************/
	/****************************PARAMETROS  ACTIVO  *************************/
	/*************************************************************************/
    //ID ACTIVO
    $Id_Act     		        = (isset($_GET['Id_Act'])) 			        ? $_GET['Id_Act'] 			        : '';
    
	//Datos Activo 
    $bs_Id_Act         		    = (isset($_GET['bs_Id_Act']))               ? $_GET['bs_Id_Act']                : '';
    $bs_Nombre_Act        	    = (isset($_GET['bs_Nombre_Act']))           ? $_GET['bs_Nombre_Act']            : '';
    $bs_Marca_Act               = (isset($_GET['bs_Marca_Act']))            ? $_GET['bs_Marca_Act']             : '';
    $bs_Modelo_Act              = (isset($_GET['bs_Modelo_Act']))           ? $_GET['bs_Modelo_Act']            : '';
    $bs_Color_Act               = (isset($_GET['bs_Color_Act']))            ? $_GET['bs_Color_Act']             : '';
    $bs_Numero_Serie_Act        = (isset($_GET['bs_Numero_Serie_Act']))     ? $_GET['bs_Numero_Serie_Act']      : '';

    //Identificadores de Activo
	$bs_Id_INS_Act     		    = (isset($_GET['bs_Id_INS_Act']))           ? $_GET['bs_Id_INS_Act']            : '';
    $bs_Id_Uni_Act              = (isset($_GET['bs_Id_Uni_Act']))           ? $_GET['bs_Id_Uni_Act']            : '0';

    //Activo Fijo
    $bs_Activo_Fijo_Act         = (isset($_GET['bs_Activo_Fijo_Act']))       ? $_GET['bs_Activo_Fijo_Act']        : '';
    $bs_No_Activo_Fijo_Act      = (isset($_GET['bs_No_Activo_Fijo_Act']))    ? $_GET['bs_No_Activo_Fijo_Act']     : '';

    //Fecha y año Recepción
	$bs_Fecha_Recepcion_Act		= (isset($_GET['bs_Fecha_Recepcion_Act']))  ? $_GET['bs_Fecha_Recepcion_Act']   : '';
	$bs_anno_inicio             = (isset($_GET['bs_anno_inicio']))          ? $_GET['bs_anno_inicio']        	: '';
	$bs_anno_fin             	= (isset($_GET['bs_anno_fin']))          	? $_GET['bs_anno_fin']        		: '';


	//Datos de compra
	$bs_Numero_OC            	= (isset($_GET['bs_Numero_OC']))         	? $_GET['bs_Numero_OC']          	: '0';
    $bs_Numero_Factu            = (isset($_GET['bs_Numero_Factu']))         ? $_GET['bs_Numero_Factu']          : '0';
	$bs_Numero_Prove            = (isset($_GET['bs_Numero_Prove']))         ? $_GET['bs_Numero_Prove']          : '0';
	$bs_Id_Compromiso    	    = (isset($_GET['bs_Id_Compromiso']))      	? $_GET['bs_Id_Compromiso']         : '0';
	$bs_Id_Partida    	    	= (isset($_GET['bs_Id_Partida']))      		? $_GET['bs_Id_Partida']       		: '0';
	$bs_Id_Transferencia   	    = (isset($_GET['bs_Id_Transferencia']))     ? $_GET['bs_Id_Transferencia']      : '0';


	
	//Ubicación
    $bs_Id_Zona_tmp_Act    	    = (isset($_GET['bs_Id_Zona_tmp_Act']))      ? $_GET['bs_Id_Zona_tmp_Act']       : '0';

	//CONARE: Responsables
	$bs_Id_Res   	    		= (isset($_GET['bs_Id_Res']))     			? $_GET['bs_Id_Res']      			: '0';
	$bs_Id_Cus   	    		= (isset($_GET['bs_Id_Cus']))     			? $_GET['bs_Id_Cus']      			: '0';
	
    //Estados
    $bs_Desecho_Act             = (isset($_GET['bs_Desecho_Act']))          ? $_GET['bs_Desecho_Act']           : '';
    $bs_Donacion_Act            = (isset($_GET['bs_Donacion_Act']))         ? $_GET['bs_Donacion_Act']          : '';
	$bs_Mantenimiento_Act       = (isset($_GET['bs_Mantenimiento_Act']))    ? $_GET['bs_Mantenimiento_Act']    	: '';

	//Verificación
    $bs_Verificado_Act          = (isset($_GET['bs_Verificado_Act']))       ? $_GET['bs_Verificado_Act']        : '';
	$bs_No_Verificado_Act       = (isset($_GET['bs_No_Verificado_Act']))    ? $_GET['bs_No_Verificado_Act']     : '';
    
    
    /*ordenamientos*/
	$or_Id_Act	                = (isset($_GET['or_Id_Act']))               ? $_GET['or_Id_Act']                : '';
	$or_tipo_Id_Act 	        = (isset($_GET['or_tipo_Id_Act']))          ? $_GET['or_tipo_Id_Act']           : 'ASC';
    $or_Nombre_Act	            = (isset($_GET['or_Nombre_Act']))           ? $_GET['or_Nombre_Act']            : '';
	$or_tipo_Nombre_Act         = (isset($_GET['or_tipo_Nombre_Act']))      ? $_GET['or_tipo_Nombre_Act']       : 'ASC';
	$or_Marca_Act	            = (isset($_GET['or_Marca_Act']))            ? $_GET['or_Marca_Act']             : '';
	$or_tipo_or_Marca_Act       = (isset($_GET['or_tipo_or_Marca_Act']))    ? $_GET['or_tipo_or_Marca_Act']     : 'ASC';
    $or_Numero_Serie_Act	    = (isset($_GET['or_Numero_Serie_Act']))     ? $_GET['or_Numero_Serie_Act']      : '';
	$or_tipo_Numero_Serie_Act   = (isset($_GET['or_tipo_Numero_Serie_Act']))? $_GET['or_tipo_Numero_Serie_Act'] : 'ASC';
    $or_Nombre_Uni	            = (isset($_GET['or_Nombre_Uni']))           ? $_GET['or_Nombre_Uni']            : '';
	$or_tipo_Nombre_Uni         = (isset($_GET['or_tipo_Nombre_Uni']))      ? $_GET['or_tipo_Nombre_Uni']       : 'ASC';
    $or_Id_INS_Act	            = (isset($_GET['or_Id_INS_Act']))           ? $_GET['or_Id_INS_Act']            : '';
	$or_tipo_Id_INS_Act         = (isset($_GET['or_tipo_Id_INS_Act']))      ? $_GET['or_tipo_Id_INS_Act']       : 'ASC';
    $or_Nombre_Zonas_tmp	    = (isset($_GET['or_Nombre_Zonas_tmp']))     ? $_GET['or_Nombre_Zonas_tmp']      : '';
	$or_tipo_Nombre_Zonas_tmp   = (isset($_GET['or_tipo_Nombre_Zonas_tmp']))? $_GET['or_tipo_Nombre_Zonas_tmp'] : 'ASC';
	$or_Activo_Fijo_Act			= (isset($_GET['or_Activo_Fijo_Act']))     	? $_GET['or_Activo_Fijo_Act']      	: '';
	$or_tipo_Activo_Fijo_Act   	= (isset($_GET['or_tipo_Activo_Fijo_Act']))	? $_GET['or_tipo_Activo_Fijo_Act'] 	: 'ASC';


    
    $pagina   = (isset($_GET['pagina']))? $_GET['pagina'] : '1';
    $inicio   = (isset($_GET['inicio']))? $_GET['inicio'] : '0';




	/***************************************************************************/
	/************************   SQL PRINCIPAL   ********************************/
	/***************************************************************************/
	$sql = "SELECT 	DISTINCT	
								h.Id_HZ AS Id_HZ,
								h.Id_Act_HZ AS Id_Act,
								h.Id_Zonas_tmp_Anterior_HZ AS Id_Zonas_tmp_Anterior_HZ,
								h.Id_Zonas_tmp_Nuevo_HZ AS Id_Zonas_tmp_Nuevo_HZ,
								h.Fecha_HZ AS Fecha_HZ,
			                    h.Motivo_HZ AS Motivo_HZ,
			                    
			                    z1.Nombre_Zonas_tmp AS Zona_Anterior,
								z2.Nombre_Zonas_tmp AS Zona_Nueva,
			                    
			                    p.Nombre_Per AS Nombre_Per,
			                    p.Apellido1_Per AS Apellido1_Per,
			                    p.Apellido2_Per AS Apellido2_Per,

			                    t.Id_TRA AS Id_TRA,
			                    t.Motivo_TRA AS Motivo_TRA,
			                    t.Fecha_TRA AS Fecha_TRA
								
							
			FROM tab_sae_historial_zona AS h
			INNER JOIN (tab_zonas_tmp AS z1) ON (h.Id_Zonas_tmp_Anterior_HZ = z1.Id_Zonas_tmp) 
			INNER JOIN (tab_zonas_tmp AS z2) ON (h.Id_Zonas_tmp_Nuevo_HZ = z2.Id_Zonas_tmp)
			INNER JOIN (tab_usuarios AS u) ON (h.Id_Per_Usu_HZ = u.Id_Per_Usu) 
			INNER JOIN (tab_personas AS p) ON (u.Id_Per_Usu = p.Id_Per)
			INNER JOIN (tab_sae_TXHZ AS txhz) ON (h.Id_HZ = txhz.Id_HZ_TXHZ) 
			INNER JOIN (tab_sae_trasiegos AS t) ON (t.Id_TRA = txhz.Id_TRA_TXHZ) 
			WHERE Id_Act_HZ = ".$Id_Act;

	$sql.=" ORDER BY t.Id_TRA DESC ";   


	$res_principal = seleccion($sql);



	/***************************************************************************/
	/*******************          DATOS PADRE     ******************************/
	/***************************************************************************/
	$sql = "SELECT Id_Act,Nombre_Act,Id_INS_Act FROM tab_Activos WHERE Id_Act=".$Id_Act;

	
	$resPadre = seleccion($sql);
?>



<!-- ****************************************************************************************** -->
<!-- **************************   Campos ocultos   ******************************************** -->
<!-- ****************************************************************************************** -->
<input type="hidden"	id="Id_Act"			            name="Id_Act"			        value="<?=$Id_Act?>" />


<input type="hidden"	id="bs_Id_Act" 					name="bs_Id_Act" 				value="<?=$bs_Id_Act?>" />
<input type="hidden"	id="bs_Nombre_Act" 				name="bs_Nombre_Act" 			value="<?=$bs_Nombre_Act?>" />
<input type="hidden"	id="bs_Marca_Act" 				name="bs_Marca_Act" 			value="<?=$bs_Marca_Act?>" />
<input type="hidden"	id="bs_Modelo_Act" 				name="bs_Modelo_Act" 			value="<?=$bs_Modelo_Act?>" />
<input type="hidden"	id="bs_Color_Act" 				name="bs_Color_Act" 			value="<?=$bs_Color_Act?>" />
<input type="hidden"	id="bs_Numero_Serie_Act" 		name="bs_Numero_Serie_Act" 		value="<?=$bs_Numero_Serie_Act?>" />


<input type="hidden"	id="bs_Id_INS_Act" 				name="bs_Id_INS_Act" 			value="<?=$bs_Id_INS_Act?>" />
<input type="hidden"	id="bs_Id_Uni_Act" 				name="bs_Id_Uni_Act" 			value="<?=$bs_Id_Uni_Act?>" />


<input type="hidden"	id="bs_Activo_Fijo_Act" 		name="bs_Activo_Fijo_Act" 		value="<?=$bs_Activo_Fijo_Act?>" />
<input type="hidden"	id="bs_No_Activo_Fijo_Act" 		name="bs_No_Activo_Fijo_Act" 	value="<?=$bs_No_Activo_Fijo_Act?>" />


<input type="hidden"	id="bs_Fecha_Recepcion_Act"		name="bs_Fecha_Recepcion_Act" 	value="<?=$bs_Fecha_Recepcion_Act?>" />
<input type="hidden"	id="bs_anno_inicio"				name="bs_anno_inicio" 			value="<?=$bs_anno_inicio?>" />
<input type="hidden"	id="bs_anno_fin"				name="bs_anno_fin" 				value="<?=$bs_anno_fin?>" />


<input type="hidden"	id="bs_Numero_OC" 				name="bs_Numero_OC" 			value="<?=$bs_Numero_OC?>" />
<input type="hidden"	id="bs_Numero_Factu" 			name="bs_Numero_Factu" 			value="<?=$bs_Numero_Factu?>" />
<input type="hidden"	id="bs_Numero_Prove" 			name="bs_Numero_Prove" 			value="<?=$bs_Numero_Prove?>" />
<input type="hidden"	id="bs_Id_Compromiso"			name="bs_Id_Compromiso"			value="<?=$bs_Id_Compromiso?>" />
<input type="hidden"	id="bs_Id_Partida"				name="bs_Id_Partida"			value="<?=$bs_Id_Partida?>" />
<input type="hidden"	id="bs_Id_Transferencia"		name="bs_Id_Transferencia"		value="<?=$bs_Id_Transferencia?>" />


<input type="hidden"	id="bs_Id_Zona_tmp_Act" 		name="bs_Id_Zona_tmp_Act" 		value="<?=$bs_Id_Zona_tmp_Act?>" />

<input type="hidden"	id="bs_Id_Res" 					name="bs_Id_Res" 				value="<?=$bs_Id_Res?>" />
<input type="hidden"	id="bs_Id_Cus" 					name="bs_Id_Cus" 				value="<?=$bs_Id_Cus?>" />



<input type="hidden"	id="bs_Desecho_Act" 			name="bs_Desecho_Act" 			value="<?=$bs_Desecho_Act?>" />
<input type="hidden"	id="bs_Donacion_Act" 			name="bs_Donacion_Act" 			value="<?=$bs_Donacion_Act?>" />
<input type="hidden"	id="bs_Mantenimiento_Act" 		name="bs_Mantenimiento_Act" 	value="<?=$bs_Mantenimiento_Act?>" />


<input type="hidden"	id="bs_Verificado_Act" 			name="bs_Verificado_Act" 		value="<?=$bs_Verificado_Act?>" />
<input type="hidden"	id="bs_No_Verificado_Act" 		name="bs_No_Verificado_Act" 	value="<?=$bs_No_Verificado_Act?>" />


	
<input type="hidden" 	id="or_Id_Act" 					name="or_Id_Act" 				value="<?=$or_Id_Act?>" />
<input type="hidden" 	id="or_tipo_Id_Act" 			name="or_tipo_Id_Act" 			value="<?=$or_tipo_Id_Act?>" />
<input type="hidden" 	id="or_Nombre_Act" 				name="or_Nombre_Act" 			value="<?=$or_Nombre_Act?>" />
<input type="hidden" 	id="or_tipo_Nombre_Act" 		name="or_tipo_Nombre_Act" 		value="<?=$or_tipo_Nombre_Act?>" />
<input type="hidden" 	id="or_Marca_Act" 				name="or_Marca_Act" 			value="<?=$or_Marca_Act?>" />
<input type="hidden" 	id="or_tipo_or_Marca_Act" 		name="or_tipo_or_Marca_Act" 	value="<?=$or_tipo_or_Marca_Act?>" />
<input type="hidden" 	id="or_Numero_Serie_Act" 		name="or_Numero_Serie_Act" 		value="<?=$or_Numero_Serie_Act?>" />
<input type="hidden" 	id="or_tipo_Numero_Serie_Act" 	name="or_tipo_Numero_Serie_Act" value="<?=$or_tipo_Numero_Serie_Act?>" />
<input type="hidden" 	id="or_Nombre_Uni" 				name="or_Nombre_Uni" 			value="<?=$or_Nombre_Uni?>" />
<input type="hidden" 	id="or_tipo_Nombre_Uni" 		name="or_tipo_Nombre_Uni" 		value="<?=$or_tipo_Nombre_Uni?>" />
<input type="hidden" 	id="or_Id_INS_Act" 				name="or_Id_INS_Act" 			value="<?=$or_Id_INS_Act?>" />
<input type="hidden" 	id="or_tipo_Id_INS_Act" 		name="or_tipo_Id_INS_Act" 		value="<?=$or_tipo_Id_INS_Act?>" />
<input type="hidden" 	id="or_Nombre_Zonas_tmp" 		name="or_Nombre_Zonas_tmp" 		value="<?=$or_Nombre_Zonas_tmp?>" />
<input type="hidden" 	id="or_tipo_Nombre_Zonas_tmp" 	name="or_tipo_Nombre_Zonas_tmp" value="<?=$or_tipo_Nombre_Zonas_tmp?>" />
<input type="hidden" 	id="or_Activo_Fijo_Act" 		name="or_Activo_Fijo_Act" 		value="<?=$or_Activo_Fijo_Act?>" />
<input type="hidden" 	id="or_tipo_Activo_Fijo_Act" 	name="or_tipo_Activo_Fijo_Act"  value="<?=$or_tipo_Activo_Fijo_Act?>" />


<input type="hidden" 	id="pagina" 	name="pagina" value="<?=$pagina?>" />
<input type="hidden" 	id="inicio" 	name="inicio" value="<?=$inicio?>" />



<script>
var nombre_parametros = 	   	
										//paginación
										'pagina;inicio;'+


										//Datos Activo 
									   	'bs_Id_Act;'+
									   	'bs_Nombre_Act;'+
									   	'bs_Marca_Act;'+
									   	'bs_Modelo_Act;'+
									   	'bs_Color_Act;'+
									   	'bs_Numero_Serie_Act;'+

									   	//Identificadores de Activo
									   	'bs_Id_INS_Act;'+
									   	'bs_Id_Uni_Act;'+
									   	
									   	// Activo Fijo
									   	'bs_Activo_Fijo_Act;'+
									   	'bs_No_Activo_Fijo_Act;'+

									   	//Fecha y año Recepción
									   	'bs_Fecha_Recepcion_Act;'+
									   	'bs_anno_inicio;'+
									   	'bs_anno_fin;'+
									   	
									   	//Datos de compra
									   	'bs_Numero_OC;'+
									   	'bs_Numero_Factu;'+
									   	'bs_Numero_Prove;'+
								   		'bs_Id_Compromiso;'+
									   	'bs_Id_Partida;'+
									   	'bs_Id_Transferencia;'+

									   	//Ubicación
									   	'bs_Id_Zona_tmp_Act;'+
									   	
									   	//CONARE: Responsables
									   	'bs_Id_Res;'+
									   	'bs_Id_Cus;'+

									   	//Estados
									   	'bs_Desecho_Act;'+
									   	'bs_Donacion_Act;'+
									   	'bs_Mantenimiento_Act;'+

									   	//Verificación
									   	'bs_Verificado_Act;'+
									   	'bs_No_Verificado_Act;'+

									   	//Ordenamiento
									   	'or_Id_Act;'+
									    'or_tipo_Id_Act;'+
									    'or_Nombre_Act;'+
									    'or_tipo_Nombre_Act;'+
									    'or_Marca_Act;'+
									    'or_tipo_or_Marca_Act;'+
									    'or_Numero_Serie_Act;'+
									    'or_tipo_Numero_Serie_Act;'+
									    'or_Nombre_Uni;'+
									    'or_tipo_Nombre_Uni;'+
									    'or_Id_INS_Act;'+
									    'or_tipo_Id_INS_Act;'+
									    'or_Nombre_Zonas_tmp;'+
									    'or_tipo_Nombre_Zonas_tmp;'+
									    'or_Activo_Fijo_Act;'+
									    'or_tipo_Activo_Fijo_Act;';


var valores_parametros = 	
										//Paginación se obtienen del código
										

										//Datos Activo 
								   		document.getElementById('bs_Id_Act').value+';'+
								   		document.getElementById('bs_Nombre_Act').value+';'+
								   		document.getElementById('bs_Marca_Act').value+';'+
								   		document.getElementById('bs_Modelo_Act').value+';'+
								   		document.getElementById('bs_Color_Act').value+';'+
								   		document.getElementById('bs_Numero_Serie_Act').value+';'+

										//Identificadores de Activo
								   		document.getElementById('bs_Id_INS_Act').value+';'+
								   		document.getElementById('bs_Id_Uni_Act').value+';'+

								   		//Activo Fijo
								   		document.getElementById('bs_Activo_Fijo_Act').checked+';'+
								   		document.getElementById('bs_No_Activo_Fijo_Act').checked+';'+
								   		
								   		//Fecha y año Recepción
								   		document.getElementById('bs_Fecha_Recepcion_Act').value+';'+
								   		document.getElementById('bs_anno_inicio').value+';'+
								   		document.getElementById('bs_anno_fin').value+';'+

								   		//Datos de compra
								   		document.getElementById('bs_Numero_OC').value+';'+
								   		document.getElementById('bs_Numero_Factu').value+';'+
								   		document.getElementById('bs_Numero_Prove').value+';'+
								   		document.getElementById('bs_Id_Compromiso').value+';'+
								   		document.getElementById('bs_Id_Partida').value+';'+
								   		document.getElementById('bs_Id_Transferencia').value+';'+
								   		
								   		//Ubicación
								   		document.getElementById('bs_Id_Zona_tmp_Act').value+';'+

								   		//CONARE: Responsables
								   		document.getElementById('bs_Id_Res').value+';'+
								   		document.getElementById('bs_Id_Cus').value+';'+
								   		
								   		//Estados
								   		document.getElementById('bs_Desecho_Act').checked+';'+
								   		document.getElementById('bs_Donacion_Act').checked+';'+
								   		document.getElementById('bs_Mantenimiento_Act').checked+';'+

								   		//Verificación
								   		document.getElementById('bs_Verificado_Act').checked+';'+
								   		document.getElementById('bs_No_Verificado_Act').checked+';'+
								   		

								   		//Ordenamiento
								   		document.getElementById('or_Id_Act').value+';'+
								   		document.getElementById('or_tipo_Id_Act').value+';'+
								   		document.getElementById('or_Nombre_Act').value+';'+
								   		document.getElementById('or_tipo_Nombre_Act').value+';'+
								   		document.getElementById('or_Marca_Act').value+';'+
								   		document.getElementById('or_tipo_or_Marca_Act').value+';'+
								   		document.getElementById('or_Numero_Serie_Act').value+';'+
								   		document.getElementById('or_tipo_Numero_Serie_Act').value+';'+
								   		document.getElementById('or_Nombre_Uni').value+';'+
								   		document.getElementById('or_tipo_Nombre_Uni').value+';'+
								   		document.getElementById('or_Id_INS_Act').value+';'+
								   		document.getElementById('or_tipo_Id_INS_Act').value+';'+
								   		document.getElementById('or_Nombre_Zonas_tmp').value+';'+
								   		document.getElementById('or_tipo_Nombre_Zonas_tmp').value+';'+
								   		document.getElementById('or_Activo_Fijo_Act').value+';'+
								   		document.getElementById('or_tipo_Activo_Fijo_Act').value+';';
								   		



</script>
	<!-- ****************************************************************************************** -->
	<!-- **************************       BOTONES      ******************************************** -->
	<!-- ****************************************************************************************** -->
	<div class="centrado">
	
		<?php if(in_array("3092",$_SESSION['Permisos'])){ ?>
			<button class="boton" onclick="CargaPaginaMenu('Modulos/Inventario/activos/con_activos.php',
													   nombre_parametros,
													   document.querySelector('#pagina').value+';'+
													   document.querySelector('#inicio').value+';'+
													   valores_parametros)" ><?=$texto['Regresar']?></button>
		<?php } ?>
	</div>
	<br/>
	<br/>

	<!-- ****************************************************************************************** -->
	<!-- ********************************   TITULO     ******************************************** -->
	<!-- ****************************************************************************************** -->
	<div id="Titulo_Adentro">
		<span class="Texto_Titulo" onclick="ActivaTextoTitulo();">Historial Trasiegos:</span><br>
		<hr>
		<span class="Texto_Titulo2" ><b>ID ACT: </b><?= $Diminutivo_ACON ?>-<?= $resPadre[0]['Id_Act']?> <br/> <b>Nombre:</b> <?= $resPadre[0]['Nombre_Act']?></span>
	</div>
	<br />
	<br />




	<!-- ***************************************************************************************-->
	<!-- **********************          TABLA            **************************************-->
	<!-- ***************************************************************************************-->
	<table class="centrado width90P tabConsultaActivos">		
		<tr class="centrado">
            <thead>
            	<th>Id_Act</th>
            	<th>Trasiego ID</th>
            	<th>Trasiego Fecha </th>
            	<th>Trasiego Motivo</th>
            	<th>His. Zona ID</th>
            	<th>His. Zona Fecha</th>
            	<th>His. Zona Motivo</th>
            	<th>Zona Anterior</th>
            	<th>Zona Nueva</th>
            	<th>Usuario</th>
            </thead>
        </tr>
        <?php
            if(count($res_principal)>0){
                for($i=0;$i<count($res_principal);$i++){
        ?>
        			<tr class="centrado" >
        				<td class="centrado"><?= $Diminutivo_ACON ?>-<?=$res_principal[$i]['Id_Act']?></td>
        				
        				<td class="centrado"><?=$res_principal[$i]['Id_TRA']?></td>
        				<td class="centrado"><?=$res_principal[$i]['Fecha_TRA']?></td>
        				<td class="centrado"><?=$res_principal[$i]['Motivo_TRA']?></td>

        				<td class="centrado"><?=$res_principal[$i]['Id_HZ']?></td>
        				<td class="centrado"><?=$res_principal[$i]['Fecha_HZ']?></td>
        				<td class="centrado"><?=$res_principal[$i]['Motivo_HZ']?></td>

        				<td class="centrado">
        					<img src="img/SAE/no.png" style="width: 20px;" />
        					<br />
        					<?=$res_principal[$i]['Zona_Anterior']?>
        				</td>
        				<td class="centrado">
        					<img src="img/SAE/si.png" style="width: 20px;" />
        					<br />
        					<?=$res_principal[$i]['Zona_Nueva']?>
        				</td>
        				<td class="centrado"><?=$res_principal[$i]['Nombre_Per']." ".$res_principal[$i]['Apellido1_Per']." ".$res_principal[$i]['Apellido2_Per']?></td>
        			</tr>

        <?php
        		}
        	}
        ?>

	</table>



	<!-- ****************************************************************************************** -->
	<!-- **************************       BOTONES      ******************************************** -->
	<!-- ****************************************************************************************** -->
	<br/>
	<br/>
	<div class="centrado">
	
		<?php if(in_array("3092",$_SESSION['Permisos'])){ ?>
			<button class="boton" onclick="CargaPaginaMenu('Modulos/Inventario/activos/con_activos.php',
													   nombre_parametros,
													   document.querySelector('#pagina').value+';'+
													   document.querySelector('#inicio').value+';'+
													   valores_parametros)" ><?=$texto['Regresar']?></button>
		<?php } ?>
	</div>