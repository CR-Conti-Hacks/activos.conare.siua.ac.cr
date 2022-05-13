<?php
   /****************************SEGURIDAD ***********************************/
	$path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/
    
    /****************************PARAMETROS  ***********************************/
	$Id_Prove      				= (isset($_GET['Id_Prove'])) ? $_GET['Id_Prove'] : '';
	$pagina 					= (isset($_GET['pagina'])) ? $_GET['pagina'] : '';
	$inicio 					= (isset($_GET['inicio'])) ? $_GET['inicio'] : '';
	$bs_nom_proveedore			= (isset($_GET['bs_nom_proveedore'])) ? $_GET['bs_nom_proveedore'] : '';
	$or_nom_proveedore			= (isset($_GET['or_nom_proveedore'])) ? $_GET['or_nom_proveedore'] : '';
	$or_nom_proveedore_tipo		= (isset($_GET['or_nom_proveedore_tipo'])) ? $_GET['or_nom_proveedore_tipo'] : '';
	/***************************************************************************/

    
    /***************************************************************************/
	/****************************     SQL    ***********************************/
	/***************************************************************************/
    $sql ="SELECT Id_Prove, Nombre_Prove FROM tab_proveedores WHERE Id_Prove = ".$Id_Prove;
    $res = seleccion($sql);
    
?>

    <!-- ****************************************************************************************** -->
	<!-- **************************   Campos ocultos   ******************************************** -->
	<!-- ****************************************************************************************** -->
	<input type="hidden" id="Id_Prove" name="Id_Prove" value="<?= $Id_Prove?>" />
	<input type="hidden" id="pagina" name="pagina" value="<?=$pagina?>" />
	<input type="hidden" id="inicio" name="inicio" value="<?=$inicio?>" />
	<input type="hidden" id="bs_nom_proveedore" name="bs_nom_proveedore" value="<?=$bs_nom_proveedore?>" />
    <input type="hidden" id="or_nom_proveedore" name="or_nom_proveedore" value="<?=$or_nom_proveedore?>" />
    <input type="hidden" id="or_nom_proveedore_tipo" name="or_nom_proveedore_tipo" value="<?=$or_nom_proveedore_tipo?>" />
    
    <!-- ****************************************************************************************** -->
	<!-- ********************************   TITULO     ******************************************** -->
	<!-- ****************************************************************************************** -->
	<h3>Modificar Proveedor</h3>
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
                    <input type="text" name="txt_proveedore" id="txt_proveedore" maxlength="100" onkeypress="ENTER(event,'modificarProveedor()')"  value="<?=$res[0]['Nombre_Prove']?>"  placeholder="Digite el nombre..." />
                </td>
            </tr>
        </table>
        <!-- ****************************************************************************************** -->
		<!-- **************************       BOTONES      ******************************************** -->
		<!-- ****************************************************************************************** -->
		<br/>
		<br/>
		<div class="centrado">
			<button class="boton" onclick="modificarProveedor()" ><?=$texto['Guardar']?></button>
			<button class="boton" id="btn_cerrar"><?=$texto['Cerrar']?></button>
		</div>
	</div>
<script>
	document.getElementById('txt_proveedore').focus();
	$('#txt_proveedore').darkTooltip({
			  opacity:0.9,
			  size: 'large',
			  animation:'flipIn',
			  gravity:'west', // 
			  confirm:false,
			  theme:'dark',
			  content: "Digite el nombre del proveedor"
		});
</script>
