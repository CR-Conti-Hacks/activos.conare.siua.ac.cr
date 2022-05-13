<?php
	/***************************************************************************/
	/******************************SEGURIDAD ***********************************/
	/***************************************************************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");

	/*************************************************************************/
    /*******************  CONFIGURACIÓN ACTIVOS    ***************************/
    /*************************************************************************/
	include("configuracionActivos.php");


	/***************************************************************************/
	/************************   PARAMETROS      ********************************/
	/***************************************************************************/
	$Id_Act	= (isset($_GET['Id_Act'])) ? $_GET['Id_Act'] : '';



	/***************************************************************************/
	/**********************       SELECT PRINCIPAL        **********************/
	/***************************************************************************/
	//SELECT PRINCIPAL
	$sql ="SELECT ";

	//***************************************************************************************************************
	//Datos Activo 
	//***************************************************************************************************************
	$sql .=   " Id_Act,
				Nombre_Act,
				Marca_Act,
				Modelo_Act,
				Color_Act,
				Numero_Serie_Act,
				Descripcion_Act,
				Foto_Act,
				Costo_Act,
				";

	//***************************************************************************************************************
	//Identificadores de Activo
	//***************************************************************************************************************
	$sql .=   " Id_INS_Act,
				Id_Uni_Act,
				Diminutivo_Uni,
				";


	//***************************************************************************************************************
	// Activo Fijo
	//***************************************************************************************************************
	$sql .=   " Activo_Fijo_Act,";


	//***************************************************************************************************************
	//Fecha y año Recepción
	//***************************************************************************************************************
	$sql .=   " Fecha_Recepcion_Act,
				Tiempo_Garantia_Act,";


	//***************************************************************************************************************
	//Datos de compra
	//***************************************************************************************************************
	$sql .=   " Id_OC,
                Numero_OC,

                Id_Factu,
                Id_Factu_Act,
                Numero_Factu,

                Id_Prove,
                Nombre_Prove,

                Id_Compr,
                Numero_Compr,

                Id_Parti_OC,
                Numero_Parti,

                Id_Trans_Factu,
                Numero_Trans,
                ";


    //***************************************************************************************************************
	//Ubicación
	//***************************************************************************************************************
    $sql .=   " Id_Zonas_tmp_Act,
				Nombre_Zonas_tmp,";


	//***************************************************************************************************************
	//CONARE: Responsables
	//***************************************************************************************************************
	$sql .=   " Id_Res_Act,
				Nombre_Res,
				Id_Cus_Act,
				Nombre_Cus,";


	//***************************************************************************************************************
	//Estados
	//***************************************************************************************************************
	$sql .=   " Desecho_Act,
				Descripcion_Dese_Act,
				Donacion_Act,
				Descripcion_Dona_Act,			
				Mantenimiento_Act,
				Descripcion_Mante_Act,
				";

	//***************************************************************************************************************
	//Verificación
	//***************************************************************************************************************
	$sql .=   " Verificado_Act,
				Id_Per_Usu_Act, 
				Nombre_Per,
				Apellido1_Per,
				Apellido2_Per
				";
				
				
				
				
	//***************************************************************************************************************
	//Tablas
	//***************************************************************************************************************			
    $sql .=   " FROM tab_Activos
				INNER JOIN tab_zonas_tmp ON (Id_Zonas_tmp = Id_Zonas_tmp_Act)
				INNER JOIN tab_universidades ON (Id_Uni=Id_Uni_Act)
	            INNER JOIN tab_facturas ON (Id_Factu=Id_Factu_Act)
	            INNER JOIN tab_transferencias ON (Id_Trans=Id_Trans_Factu)
	            INNER JOIN tab_ordenes_compras ON (Id_OC=Id_OC_Factu)
	            INNER JOIN tab_compromisos ON (Id_Compr=Id_Compr_OC)
	            INNER JOIN tab_partidas ON (Id_Parti=Id_Parti_OC)
	            INNER JOIN tab_proveedores ON (Id_Prove=Id_Prove_OC)
	            INNER JOIN tab_personas ON (Id_Per = Id_Per_Usu_Act)
	            INNER JOIN tab_Responsables ON (Id_Res = Id_Res_Act) 
	            INNER JOIN tab_Custodios ON (Id_Cus = Id_Cus_Act) 
				WHERE Activo_Act = '1' AND Id_Act=".$Id_Act;

	//Obtener datos
    $res = seleccion($sql);;         

    //error_log($sql);
	//Comprobar si tiene o no foto
	if($res[0]['Foto_Act'] ==''){
		$Foto_Per = $dominio.$ruta."img/inventario/activos/default.png";
	}else{
		$Foto_Per = $dominio.$ruta.'img/inventario/activos/'.$res[0]['Foto_Act'];
	}

	$instancia = mt_rand();

	/***************************************************************************/
	/************************   DATOS DE VERIFICACION **************************/
	/***************************************************************************/


	/*Obtener la última verificación*/
	$sql = "SELECT Fecha_HV FROM tab_sae_historial_verificados WHERE Id_Act_HV = ".$Id_Act." ORDER BY Id_HV DESC LIMIT 1;";

	$res_hv = seleccion($sql);

	$fecha_hv = $res_hv[0]['Fecha_HV'];

?>
<table class="centrado width80P">
	<tr>
		<td class="centrado fondo_azul2 blanco font12" colspan="2">Detalle de Activo</td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Foto']?>:</td>
		<td class="centrado fondo_gris_claro2">
			<div class="img_redonda">
				<a id="fancybox_detalle_activo<?=$instancia?>" href="<?=$Foto_Per?>" data-fancybox-group="gallery" title="<?=$res[0]['Nombre_Act']?>"><img src="<?=$Foto_Per?>" /></a>
				 <script type="text/javascript">
						$('#fancybox_detalle_activo<?=$instancia?>').fancybox();
				</script>
			</div>
		</td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">Nombre:</td>
		<td><?php if($res[0]['Nombre_Act']==""){ echo "DESCONOCIDA";}else{ echo $res[0]['Nombre_Act'];}?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">Marca:</td>
		<td><?php if($res[0]['Marca_Act']==""){ echo "DESCONOCIDA";}else{ echo $res[0]['Marca_Act'];}?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">N° de Serie:</td>
		<td><?php if($res[0]['Numero_Serie_Act']==""){ echo "DESCONOCIDA";}else{ echo $res[0]['Numero_Serie_Act'];}?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">Descripción:</td>
		<td><?php if($res[0]['Descripcion_Act']==""){ echo "DESCONOCIDA";}else{ echo $res[0]['Descripcion_Act'];}?></td>
	</tr>
	<tr>
		<td class="centrado fondo_azul2 blanco font12" colspan="2">Información de Identificación</td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">N° Activo:</td>
		<td><?=$Diminutivo_ACON?><?="-".$res[0]['Id_Act']?></td>
	</tr>

	<tr>
		<td class="fondo_gris_claro blanco">Institución:</td>
		<td><?php if($res[0]['Id_Uni_Act']==""){ echo "DESCONOCIDA";}else{ echo $res[0]['Diminutivo_Uni'];}?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">Responsable:</td>
		<td><?php if($res[0]['Nombre_Res']==""){ echo "DESCONOCIDO";}else{ echo $res[0]['Nombre_Res'];}?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">Custodio:</td>
		<td><?php if($res[0]['Nombre_Cus']==""){ echo "DESCONOCIDO";}else{ echo $res[0]['Nombre_Cus'];}?></td>
	</tr>
	<tr <?php if($Ocultar_Activo_Institucional_ACON=='1'){ ?>style="display: none;" <?php } ?>>
		<td class="fondo_gris_claro blanco">N° Institucional:</td>
		<td><?php if($res[0]['Id_INS_Act']==""){ echo "DESCONOCIDO";}else{ echo $res[0]['Id_INS_Act'];}?></td>
	</tr>
	<tr>
		<td class="centrado fondo_azul2 blanco font12" colspan="2">Información de Ubicación</td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">Zona:</td>
		<td><?php if($res[0]['Id_Zonas_tmp_Act']==""){ echo "DESCONOCIDA";}else{ echo $res[0]['Nombre_Zonas_tmp'];}?></td>
	</tr>
	<tr>
		<td class="centrado fondo_azul2 blanco font12" colspan="2">Caracteristicas del Activo</td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">Marca:</td>
		<td><?php if($res[0]['Marca_Act']==""){ echo "DESCONOCIDA";}else{ echo $res[0]['Marca_Act'];}?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">Modelo:</td>
		<td><?php if($res[0]['Modelo_Act']==""){ echo "DESCONOCIDO";}else{ echo $res[0]['Modelo_Act'];}?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">N° de Serie:</td>
		<td><?php if($res[0]['Numero_Serie_Act']==""){ echo "DESCONOCIDA";}else{ echo $res[0]['Numero_Serie_Act'];}?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">Color:</td>
		<td><?php if($res[0]['Color_Act']==""){ echo "DESCONOCIDO";}else{ echo $res[0]['Color_Act'];}?></td>
	</tr>
	<tr>
		<td class="centrado fondo_azul2 blanco font12" colspan="2">Datos de Empresa</td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">Fecha de Recepción:</td>
		<td><?php if($res[0]['Fecha_Recepcion_Act']=="0000-00-00"){ echo "DESCONOCIDA";}else{ echo $res[0]['Fecha_Recepcion_Act'];}?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">Tiempo de Garantía:</td>
		<?php
		/******************************** sumar meses a una fecha *******************/
		$tiempo_garantia =  '';
		if($res[0]['Tiempo_Garantia_Act']==""){
			echo "<td>DESCONOCIDA</td>";
		}else if($res[0]['Tiempo_Garantia_Act']!="" && $res[0]['Fecha_Recepcion_Act']!="0000-00-00"){
			$tiempo_garantia =  $res[0]['Tiempo_Garantia_Act'];
			$fecha_recep = $res[0]['Fecha_Recepcion_Act'];
			//$fecha = date($tiempo_garantia);
			$nuevafecha = date('Y-m-d', strtotime("$fecha_recep +$tiempo_garantia months"));
			echo "<td>".$tiempo_garantia." meses / fecha aproximada de vencimiento: ".$nuevafecha."</td>";
		}else if($res[0]['Tiempo_Garantia_Act']!="" && $res[0]['Fecha_Recepcion_Act']=="0000-00-00"){
			$tiempo_garantia =  $res[0]['Tiempo_Garantia_Act'];
			echo "<td>".$tiempo_garantia." meses</td>";
		}

		?>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">Orden de Compra:</td>
		<td><?php if($res[0]['Numero_OC']==""){ echo "DESCONOCIDA";}else{ echo $res[0]['Numero_OC'];}?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">Proveedor:</td>
		<td><?php if($res[0]['Nombre_Prove']==""){ echo "DESCONOCIDO";}else{ echo $res[0]['Nombre_Prove'];}?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">Compromiso:</td>
		<td><?php if($res[0]['Numero_Compr']==""){ echo "DESCONOCIDO";}else{ echo $res[0]['Numero_Compr'];}?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">Partida:</td>
		<td><?php if($res[0]['Numero_Parti']==""){ echo "DESCONOCIDO";}else{ echo $res[0]['Numero_Parti'];}?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">N° Factura:</td>
		<td><?php if($res[0]['Numero_Factu']==""){ echo "DESCONOCIDA";}else{ echo $res[0]['Numero_Factu'];}?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">N° Transferencia:</td>
		<td><?php if($res[0]['Numero_Trans']==""){ echo "DESCONOCIDA";}else{ echo $res[0]['Numero_Trans'];}?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">Costo:</td>
		<td><?php if($res[0]['Costo_Act']==""){ echo "DESCONOCIDO";}else{ echo $res[0]['Costo_Act'];}?></td>
	</tr>

	<tr>
		<td class="fondo_gris_claro blanco">Desecho:</td>
		<td><?php
			if(($res[0]['Desecho_Act']=="")||($res[0]['Desecho_Act']=="0")){
				$img = "no.png";
			}else if($res[0]['Desecho_Act']=="1"){
				$img = "si.png";
			}
			?>
			<img style="width: 25px" src="img/SAE/<?=$img?>" />
		</td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">Descripción de Desecho:</td>
		<td><?php if($res[0]['Descripcion_Dese_Act']==""){ echo "DESCONOCIDA";}else{ echo $res[0]['Descripcion_Dese_Act'];}?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">Donación:</td>
		<td><?php
			if(($res[0]['Donacion_Act']=="")||($res[0]['Donacion_Act']=="0")){
				$img = "no.png";
			}else if($res[0]['Donacion_Act']=="1"){
				$img = "si.png";
			}
			?>
			<img style="width: 25px" src="img/SAE/<?=$img?>" />
		</td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">Descripción de Donación:</td>
		<td><?php if($res[0]['Descripcion_Dona_Act']==""){ echo "DESCONOCIDA";}else{ echo $res[0]['Descripcion_Dona_Act'];}?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">Mantenimiento:</td>
		<td><?php
			if(($res[0]['Mantenimiento_Act']=="")||($res[0]['Mantenimiento_Act']=="0")){
				$img = "no.png";
			}else if($res[0]['Mantenimiento_Act']=="1"){
				$img = "si.png";
			}
			?>
			<img style="width: 25px" src="img/SAE/<?=$img?>" />
		</td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">Descripción de Mantenimiento:</td>
		<td><?php if($res[0]['Descripcion_Mante_Act']==""){ echo "DESCONOCIDA";}else{ echo $res[0]['Descripcion_Mante_Act'];}?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">Verificado:</td>
		<td><?php
			if(($res[0]['Verificado_Act']=="")||($res[0]['Verificado_Act']=="0")){
				$img = "no.png";
			}else if($res[0]['Verificado_Act']=="1"){
				$img = "si.png";
			}
			?>
			<img style="width: 25px" src="img/SAE/<?=$img?>" />
		</td>
	</tr>
	<?php if($res[0]['Verificado_Act']=="1" && $res[0]['Id_Per_Usu_Act']!=''){ ?>
	<tr>
		<td class="fondo_gris_claro blanco">Verificado por:</td>
		<td>
			<?= $res[0]['Nombre_Per']." ".$res[0]['Apellido1_Per']." ".$res[0]['Apellido2_Per']?>
		</td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">Fecha de verificación:</td>
		<td>
			<?= $fecha_hv ?>
		</td>
	</tr>

	<?php }else{ ?>
	<tr>
		<td class="fondo_gris_claro blanco">Verificado por:</td>
		<td>
			Activo no verificado aún
		</td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">Fecha de verificación:</td>
		<td>
			-
		</td>
	</tr>
	<?php } ?>
</table>

<br />
<br />
<br />
<script type="text/javascript">
		$('#fancybox_detalle_activo').fancybox();
</script>
