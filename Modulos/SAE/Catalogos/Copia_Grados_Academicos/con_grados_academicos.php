<?php
    /****************************SEGURIDAD ***********************************/
	$path = '../../../../';
	include($path."Seguridad_Interfaz_GET.php");
	/***************************************************************************/
    
    /***************************************************************************/
	/************************   PARAMETROS      ********************************/
	/***************************************************************************/
	$mostrar_efecto     = (isset($_GET['mostrar_efecto'])) ? $_GET['mostrar_efecto'] : '';
    $bs_nom_ga=(isset($_GET['bs_nom_ga'])) ? $_GET['bs_nom_ga'] : '';
    $or_nom_ga= (isset($_GET['or_nom_ga'])) ? $_GET['or_nom_ga'] : '';
    $or_nom_ga_tipo 	= (isset($_GET['or_nom_ga_tipo'])) ? $_GET['or_nom_ga_tipo'] : 'ASC';
    
    
    
    

    /***************************************************************************/
	/************************   SQL PRINCIPAL   ********************************/
	/***************************************************************************/
	$sql ="SELECT Id_GA, Nombre_GA FROM tab_grados_academicos WHERE Activo_GA = '1'";
    
    
	if($bs_nom_ga != "" ){
		$sql.=" AND Nombre_GA like '%".$bs_nom_ga."%'";
	}
    
	if ($or_nom_ga != "") {
	    $sql.=" ORDER BY ".$or_nom_ga.' '.$or_nom_ga_tipo;
	}else{
	    $sql.=" ORDER BY Nombre_GA ASC";   
	}
	$res = seleccion($sql);


    
?>
    <!-- ****************************************************************************************** -->
    <!-- **************************** Campos Ocultos   ******************************************** -->
    <!-- ****************************************************************************************** -->
    <input type="text" id="or_nom_ga_tipo" name="or_nom_ga_tipo" value="<?=$or_nom_ga_tipo?>" />
    <input type="text" id="or_nom_ga" name="or_nom_ga" value="<?=$or_nom_ga?>" />

    <!-- ****************************************************************************************** -->
    <!-- ********************************   TITULO     ******************************************** -->
    <!-- ****************************************************************************************** -->
    <div id="Titulo_Adentro">
        <span class="Texto_Titulo" onclick="ActivaTextoTitulo();"><?= $texto['TITULO_Consultar_Grado_Academico'] ?></span>
    </div>
    
    <!-- ***************************************************************************************-->
    <!-- ********************** Formulario de busqueda    **************************************-->
    <!-- ***************************************************************************************-->
    <span class="centrado">
        <?=$texto['Mostrar_Busqueda']?>
        <a onclick="MostrarBusqueda()">
            <img src="img/SAE/buscar.png" alt="<?=$texto['Mostrar_Busqueda']?>" class="alineado_medio"/>
        </a>
    </span>
    <br />
    <br />
    <div id="Buscar" style="display:none;"  >
        <table class="width200 centrado" >		
            <tr>
                <td class="fondo_Azul blanco"><?=$texto["Nombre"]?></td>
                <td>
                    <input type="text" name="bs_nom_ga" id="bs_nom_ga"  maxlength="200" value="<?= $bs_nom_ga ?>"
                    onKeyPress="Buscar(
                                    event,
                                    'Modulos/SAE/Catalogos/Grados_Academicos/con_grados_academicos.php',
                                    'bs_nom_ga;or_nom_ga;or_nom_ga_tipo;',
                                    document.getElementById('bs_nom_ga').value+';'
                                    +document.getElementById('or_nom_ga').value+';'
                                    +document.getElementById('or_nom_ga_tipo').value+';'
                                );"/>
                </td>
            </tr>		
        </table>
        <br />
        ***********************************************************************************************
        *************************** tengo error en el buscar boton me saca
        
        <button class="boton" onclick="javascript:
                            Buscar(
                                    '',
                                    'Modulos/SAE/Catalogos/Grados_Academicos/con_grados_academicos.php',
                                    'bs_nom_ga;',
                                    'bs_nom_ga;or_nom_ga;or_nom_ga_tipo;',
                                    document.getElementById('bs_nom_ga').value+';'
                                    +document.getElementById('or_nom_ga').value+';'
                                    +document.getElementById('or_nom_ga_tipo').value+';'
                                );"
        ><?=$texto['Buscar']?></button>
    </div>
    <br />
    <br />
        
    <!-- ***************************************************************************************-->
    <!-- **********************          TABLA            **************************************-->
    <!-- ***************************************************************************************-->
    <div class="component centrado">
    
        <table class="centrado width40P">		
            <tr class="centrado">
                <thead>
                    <th>
                        <a onClick="javascript:Ordenar('Modulos/SAE/Catalogos/Grados_Academicos/con_grados_academicos.php',
												   'or_nom_ga',
												   'Nombre_GA',
												   'or_nom_ga_tipo',
												   'bs_nom_ga;',
												   document.getElementById('bs_nom_ga').value+';'
												);
								window.scrollTo(0,0);">
                            <?=$texto['Nombre']?>:
                        </a>
                    </th>
                    <th><?=$texto['Modificar']?></th>
                    <th><?=$texto['Eliminar']?></th>
                </thead>
            </tr>
            <?php
                if(count($res)>0){
                    for($i=0;$i<count($res);$i++){
                    ?>
                    <tr>
                        <td style="width: 200px;"><?= $res[$i]['Nombre_GA']?></td>
                        <td class="centrado"><img src="img/SAE/modificar.png"/></td>
                        <td class="centrado"><img src="img/SAE/eliminar.png"/></td>
                    </tr>
                    <?php
                    }
                    
                }else{
            ?>
                <tr>
					<td colspan="3" class="centrado"><?=$texto['No_Datos']?></td>
				</tr>  
            <?php
                    
                }
                
            ?>
        </table>
    </div>
    
    
    <!-- ****************************************************************************************** -->
    <!-- **************************     SCRIPT         ******************************************** -->
    <!-- ****************************************************************************************** -->
    <script>
        <?php if($mostrar_efecto==1) { ?>
            $(".Texto_Titulo").letterfx({"fx":"fall","words":true,"timing":120});
        <?php }?>
    </script>
    <?php
        include($path.'Include/Miniaplicaciones/Encabezado_Tablas/jquery.stickheader.php');
    ?>
