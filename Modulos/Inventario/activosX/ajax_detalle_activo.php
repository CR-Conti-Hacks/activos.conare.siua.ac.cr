<?php
	/****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/

	/***************************************************************************/
	/************************   PARAMETROS      ********************************/
	/***************************************************************************/
	$Id_Act	= (isset($_GET['Id_Act'])) ? $_GET['Id_Act'] : '';
	
	
	
	/***************************************************************************/
	/************************   DATOS DEL ACTIVO *******************************/
	/***************************************************************************/
	$sql ="SELECT
				Id_Act,
				Id_Zonas_tmp_Act,
				Nombre_Zonas_tmp,
				Id_INS_Act,
				Id_UGIT_Act,
				Id_Factu_Act,
				Id_Uni_Act,
				Diminutivo_Uni,
				Fecha_Recepcion_Act,
				Nombre_Act,
				Descripcion_Act,
				Foto_Act,
				Costo_Act,
				Desecho_Act,
				Descripcion_Dese_Act,
				Donacion_Act,
				Descripcion_Dona_Act,
				Verificado_Act,
				Numero_Serie_Act,
				Marca_Act,
				Modelo_Act,
				Color_Act,
                Id_Factu,
                Numero_Factu,
                Id_Trans_Factu,
                Numero_Trans,
                Id_OC,
                Numero_OC,
                Id_Compr,
                Numero_Compr,
                Id_Parti_OC,
                Numero_Parti,
                Id_Prove,
                Nombre_Prove,
				Id_Per_Usu_Act,
				Nombre_Per,
				Apellido1_Per,
				Apellido2_Per
			FROM tab_Activos
			INNER JOIN tab_zonas_tmp ON (Id_Zonas_tmp = Id_Zonas_tmp_Act)
			INNER JOIN tab_universidades ON (Id_Uni=Id_Uni_Act)
            INNER JOIN tab_facturas ON (Id_Factu=Id_Factu_Act)
            INNER JOIN tab_transferencias ON (Id_Trans=Id_Trans_Factu)
            INNER JOIN tab_ordenes_compras ON (Id_OC=Id_OC_Factu)
            INNER JOIN tab_compromisos ON (Id_Compr=Id_Compr_OC)
            INNER JOIN tab_partidas ON (Id_Parti=Id_Parti_OC)
            INNER JOIN tab_proveedores ON (Id_Prove=Id_Prove_OC)
			INNER JOIN tab_personas ON (Id_Per = Id_Per_Usu_Act)
			WHERE Activo_Act = '1' AND Id_Act=".$Id_Act;
    $res = seleccion($sql);

	//Comprobar si tiene o no foto
	if($res[0]['Foto_Act'] ==''){
		$Foto_Per = $dominio.$ruta.'img/inventario/activos/default.png';
	}else{
		$Foto_Per = $dominio.$ruta.'img/inventario/activos/'.$res[0]['Foto_Act'];
	}
	
	/***************************************************************************/
	/************************   DATOS DE UBICACION *****************************/
	/***************************************************************************/
	

?>
<table class="centrado width80P">
	<tr>
		<td class="centrado fondo_azul2 blanco font12" colspan="2">Detalle de Activo</td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco"><?= $texto['Foto']?>:</td>
		<td class="centrado fondo_gris_claro2">
			<div class="img_redonda">
				<a id="fancybox_detalle_activo" href="<?=$Foto_Per?>" data-fancybox-group="gallery" title="<?=$res[0]['Nombre_Act']?>"><img src="<?=$Foto_Per?>" /></a>		
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
		<td class="centrado fondo_azul2 blanco font12" colspan="2">Información de Indentificación</td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">N° Activo:</td>
		<td><?="SIUA-".$res[0]['Id_Act']?></td>
	</tr>
	
	<tr>
		<td class="fondo_gris_claro blanco">Institución:</td>
		<td><?php if($res[0]['Id_Uni_Act']==""){ echo "DESCONOCIDA";}else{ echo $res[0]['Diminutivo_Uni'];}?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">N° Institucional:</td>
		<td><?php if($res[0]['Id_INS_Act']==""){ echo "DESCONOCIDO";}else{ echo $res[0]['Id_INS_Act'];}?></td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">N° UGIT:</td>
		<td><?php if($res[0]['Id_UGIT_Act']==""){ echo "DESCONOCIDO";}else{ echo $res[0]['Id_UGIT_Act'];}?></td>
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
			<img src="img/SAE/<?=$img?>" />
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
			<img src="img/SAE/<?=$img?>" />
		</td>
	</tr>
	<tr>
		<td class="fondo_gris_claro blanco">Descripción de Donación:</td>
		<td><?php if($res[0]['Descripcion_Dona_Act']==""){ echo "DESCONOCIDA";}else{ echo $res[0]['Descripcion_Dona_Act'];}?></td>
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
			<img src="img/SAE/<?=$img?>" />
		</td>
	</tr>
	<?php if($res[0]['Verificado_Act']=="1" && $res[0]['Id_Per_Usu_Act']!=''){ ?>
	<tr>
		<td class="fondo_gris_claro blanco">Verificado por:</td>
		<td>
			<?= $res[0]['Nombre_Per']." ".$res[0]['Apellido1_Per']." ".$res[0]['Apellido2_Per']?>
		</td>
	</tr>
	<?php }else{ ?>
	<tr>
		<td class="fondo_gris_claro blanco">Verificado por:</td>
		<td>
			Activo no verificado aún
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
