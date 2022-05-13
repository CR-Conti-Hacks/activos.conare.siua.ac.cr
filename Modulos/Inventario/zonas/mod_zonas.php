<?php
   /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/
    
    /****************************PARAMETROS  ***********************************/
	$Id_Zonas_tmp      		= (isset($_GET['Id_Zonas_tmp'])) ? $_GET['Id_Zonas_tmp'] : '';
	$pagina 				= (isset($_GET['pagina'])) ? $_GET['pagina'] : '';
	$inicio 				= (isset($_GET['inicio'])) ? $_GET['inicio'] : '';
	$bs_nom_zona			= (isset($_GET['bs_nom_zona'])) ? $_GET['bs_nom_zona'] : '';
	$or_nom_zona			= (isset($_GET['or_nom_zona'])) ? $_GET['or_nom_zona'] : '';
	$or_nom_zona_tipo		= (isset($_GET['or_nom_zona_tipo'])) ? $_GET['or_nom_zona_tipo'] : '';
	/***************************************************************************/

    
    /***************************************************************************/
	/****************************     SQL    ***********************************/
	/***************************************************************************/
    $sql ="SELECT Id_Zonas_tmp, Nombre_Zonas_tmp FROM tab_zonas_tmp WHERE Id_Zonas_tmp = ".$Id_Zonas_tmp;
    $res = seleccion($sql);
    
?>

    <!-- ****************************************************************************************** -->
	<!-- **************************   Campos ocultos   ******************************************** -->
	<!-- ****************************************************************************************** -->
	<input type="hidden" id="Id_Zonas_tmp" name="Id_Zonas_tmp" value="<?= $Id_Zonas_tmp?>" />
	<input type="hidden" id="pagina" name="pagina" value="<?=$pagina?>" />
	<input type="hidden" id="inicio" name="inicio" value="<?=$inicio?>" />
	<input type="hidden" id="bs_nom_zona" name="bs_nom_zona" value="<?=$bs_nom_zona?>" />
    <input type="hidden" id="or_nom_zona" name="or_nom_zona" value="<?=$or_nom_zona?>" />
    <input type="hidden" id="or_nom_zona_tipo" name="or_nom_zona_tipo" value="<?=$or_nom_zona_tipo?>" />
    
    <!-- ****************************************************************************************** -->
	<!-- ********************************   TITULO     ******************************************** -->
	<!-- ****************************************************************************************** -->
	<h3>Modificar Zona</h3>
	<br />
	<br />
	<div>
    
        <!-- ****************************************************************************************** -->
        <!-- **************************       FORM         ******************************************** -->
        <!-- ****************************************************************************************** -->
        <table class="centrado width100P" >
            <tr>
                <td>Nombre</td>
                <td>
                    <input type="text" name="txt_zona" id="txt_zona" maxlength="100" onkeypress="ENTER(event,'modificarZona()')"  value="<?=$res[0]['Nombre_Zonas_tmp']?>"  placeholder="Digite el nombre..." />
                </td>
            </tr>
        </table>
        <!-- ****************************************************************************************** -->
		<!-- **************************       BOTONES      ******************************************** -->
		<!-- ****************************************************************************************** -->
		<br/>
		<br/>
		<div class="centrado">
			<button class="boton" onclick="modificarZona()" ><?=$texto['Guardar']?></button>
			<button class="boton" onclick="CerrarVentana()" id="btn_cerrar"><?=$texto['Cerrar']?></button>
		</div>
	</div>
<script>
	document.getElementById('txt_zona').focus();
	$('#txt_zona').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite el nombre de la zona"
		});
</script>
