<?php
   /****************************SEGURIDAD ***********************************/
	$path = '../../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/
    
    /****************************PARAMETROS  ***********************************/
	$Id_Tip_Tel      	= (isset($_GET['Id_Tip_Tel'])) ? $_GET['Id_Tip_Tel'] : '';
	$pagina 				= (isset($_GET['pagina'])) ? $_GET['pagina'] : '';
	$inicio 				= (isset($_GET['inicio'])) ? $_GET['inicio'] : '';
	$bs_nom_tip_tel			= (isset($_GET['bs_nom_tip_tel'])) ? $_GET['bs_nom_tip_tel'] : '';
	$or_nom_TipoTele		= (isset($_GET['or_nom_TipoTele'])) ? $_GET['or_nom_TipoTele'] : '';
	$or_nom_TipoTele_tipo	= (isset($_GET['or_nom_TipoTele_tipo'])) ? $_GET['or_nom_TipoTele_tipo'] : '';
	/***************************************************************************/

    
    /***************************************************************************/
	/****************************     SQL    ***********************************/
	/***************************************************************************/
    $sql ="SELECT Id_Tip_Tel, Nombre_Tip_Tel FROM tab_tipos_telefonos WHERE Id_Tip_Tel = ".$Id_Tip_Tel;
    $res = seleccion($sql);
    
?>

    <!-- ****************************************************************************************** -->
	<!-- **************************   Campos ocultos   ******************************************** -->
	<!-- ****************************************************************************************** -->
	<input type="hidden" id="Id_Tip_Tel" name="Id_Tip_Tel" value="<?= $Id_Tip_Tel?>" />
	<input type="hidden" id="pagina" name="pagina" value="<?=$pagina?>" />
	<input type="hidden" id="inicio" name="inicio" value="<?=$inicio?>" />
	<input type="hidden" id="bs_nom_tip_tel" name="bs_nom_tip_tel" value="<?=$bs_nom_tip_tel?>" />
    <input type="hidden" id="or_nom_TipoTele" name="or_nom_TipoTele" value="<?=$or_nom_TipoTele?>" />
    <input type="hidden" id="or_nom_TipoTele_tipo" name="or_nom_TipoTele_tipo" value="<?=$or_nom_TipoTele_tipo?>" />
    
    <!-- ****************************************************************************************** -->
	<!-- ********************************   TITULO     ******************************************** -->
	<!-- ****************************************************************************************** -->
	<h3><?= $texto['TITULO_Modificar_Tipos_Telefonos'] ?></h3>
	<br />
	<br />
	<div>
    
        <!-- ****************************************************************************************** -->
        <!-- **************************       FORM         ******************************************** -->
        <!-- ****************************************************************************************** -->
        <table class="centrado width100P" >
            <tr>
                <td><?=$texto['Nombre_Tipos_Telefonos']?></td>
                <td>
                    <input type="text" name="txt_tipo_tele" id="txt_tipo_tele" maxlength="50" onkeypress="ENTER(event,'modificarTipTel()')"  value="<?=$res[0]['Nombre_Tip_Tel']?>"  placeholder="<?=$texto['PLACEHOLDER_Digite_Tipo_telefono']?>" />
                </td>
            </tr>
        </table>
        <!-- ****************************************************************************************** -->
		<!-- **************************       BOTONES      ******************************************** -->
		<!-- ****************************************************************************************** -->
		<br/>
		<br/>
		<div class="centrado">
			<button class="boton" onclick="modificarTipTel()" ><?=$texto['Guardar']?></button>
			<button class="boton" id="btn_cerrar"><?=$texto['Cerrar']?></button>
		</div>
	</div>
<script>
	document.getElementById('txt_tipo_tele').focus();

</script>
