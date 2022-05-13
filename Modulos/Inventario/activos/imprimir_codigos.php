<?php
	
	/*************************************************************************/
	/***************************    PATH   ***********************************/
	/*************************************************************************/
	$path = '../../../';


	/*************************************************************************/
	/**************************  SEGURIDAD ***********************************/
	/*************************************************************************/
	include($path."Seguridad_Interfaz_GET.php");


	/*************************************************************************/
  /*******************  CONFIGURACIÓN ACTIVOS    ***************************/
  /*************************************************************************/
	include("configuracionActivos.php");


  /*************************************************************************/
  /*******************       PARAMETROS          ***************************/
  /*************************************************************************/
	$Id_Act     		        = (isset($_GET['Id_Act'])) 			        ? $_GET['Id_Act'] 			        : '';


	/*************************************************************************/
  /******************* DOMINIO PARA IMPRTESION   ***************************/
  /*************************************************************************/
	$dominioImpresion = '';
	if($Dominio_Impresion_ACON !=''){
		$dominioImpresion	 = $Dominio_Impresion_ACON;
	}else{
		echo "error: no existe dominio para impresión de inventario";
		$dominioImpresion = $dominio.$ruta;
		exit;
	}


	/****************************************************************************/
	/************* CONFIGURACIÓN CÓDIGOS DE BARRAS   ****************************/
	/****************************************************************************/
	require("barcode.inc.php");

	$encode="CODE39";
	$nombre=$Diminutivo_ACON."-".$Id_Act;
	$bar= new BARCODE();

	if($bar==false)
		die($bar->error());


	$barnumber=$Id_Act;

	$bar->setSymblogy($encode);
	$bar->setHeight(50);
	$bar->setScale(2);
	$bar->setHexColor("#000000","#FFFFFF");


	$bar->genBarCode($barnumber,"png",$nombre);

	/****************************************************************************/
	/***************************    Codigos QR     ******************************/
	/****************************************************************************/
	require ('lib/phpqrcode/qrlib.php') ;

	QRcode::png($dominioImpresion."/index.php?Id_Act=".$Id_Act, "codigos/qr/qr_".$nombre.".png", "L", 4, 4);


	/*Quitar el https por http*/

	$dominio_https = str_replace("https", "http", $dominio);
?>
	<h3>Imprimir Activos</h3>
	<br />

<!-- ***********************************************************************-->
<!-- *********************    CAMPOS OCULTOS    ****************************-->
<!-- ***********************************************************************-->
<input type="hidden" id="Id_Act" name="Id_Act" value="<?=$Id_Act?>" />


<div class="centrado">
	    <div style="width: 100%; margin: 0 auto; ">
			<div style="width: 49%;display: inline-block; vertical-align: top;">
				<h3 style="font-size: 1.5rem;"><?=$texto['Codigo_QR']?></h3>
				<img src='<?=$dominio.$ruta?>Modulos/Inventario/activos/codigos/qr/qr_<?=$nombre.".png"?>' style="width: 150px;">
				<br>
				<button onclick="abrirVentanaImpresion('QR');">Imprimir</button>
			</div>
			<div style="width: 49%;display: inline-block;vertical-align: top;">
				<h3 style="font-size: 1.5rem;"><?=$texto['Codigo_Barras']?></h3>
				<img src='<?=$dominio.$ruta?>Modulos/Inventario/activos/codigos/barras/<?=$nombre.".png"?>' style="width: 150px;">
				<br>
				<button onclick="abrirVentanaImpresion('BARRAS');">Imprimir</button>
			</div>

		</div>
		<br/>
	<br/>
		<div style="width: 100%; margin: 0 auto; " id="tipo_impresora">
			<div style="width: 49%;display: inline-block; vertical-align: top;">
				<input type='radio' name='rb_impresora' id="rb_impresora1" value="1">Impresora Local
			</div>
			<div style="width: 49%;display: inline-block; vertical-align: top;">
				<input type='radio' name='rb_impresora' id="rb_impresora2" value="2">Impresora Remota
			</div>
		</div>
	<br/>
	<br/>
	<button class="boton" onclick="CerrarVentana()" ><?=$texto['Cerrar']?></button>
	
</div>


<script>
	function abrirVentanaImpresion(tipo){
		var impresora = document.querySelector('input[name="rb_impresora"]:checked').value;
		
		//obtener valores
		var dominio 		= document.getElementById("dominio").value;
		var ruta	 		= document.getElementById("ruta").value;
		var direccion 		= "Modulos/Inventario/activos/";
		var cedula_global 	= document.getElementById("cedula_global").value;
		var Id_Per_Usu 		= document.getElementById("Id_Per_Usu").value;
		var Key_Usu 		= document.getElementById("Key_Usu").value;
		var Id_Act 			= document.getElementById("Id_Act").value;
		var pagina = '';


		/*Impresora local*/
		if(impresora ==1){
			if(tipo=="QR"){
				pagina ="imprime_qr_local.php";
			}else if(tipo=="BARRAS"){
				pagina ="imprime_barras_local.php";
			}

		/*Impresora remota*/
		}else if(impresora == 2){
			if(tipo=="QR"){
				pagina ="imprime_qr.php";
			}else if(tipo=="BARRAS"){
				pagina ="imprime_barras.php";
			}
		}

		
			

		var ventana = dominio+ruta+direccion+pagina+"?Id_Act="+Id_Act+"&cedula_global="+cedula_global+"&Id_Per_Usu="+Id_Per_Usu+"&Key_Usu="+Key_Usu;
		window.open(ventana, '_blank', 'width=400,height=400');
		
	}
</script>
<script type="text/javascript">
var selected_device;
var devices = [];
function setup()
{

  //Get the default device from the application as a first step. Discovery takes longer to complete.
  BrowserPrint.getDefaultDevice("printer", function(device)
      {
   
        
        //Add device to list of devices and to html select element
        selected_device = device;
        devices.push(device);
        var html_select = document.getElementById("selected_device");
        var option = document.createElement("option");
        document.querySelector("#rb_impresora1").checked = true;
        option.text = device.name;
        html_select.add(option);

        //Discover any other devices available to the application
        BrowserPrint.getLocalDevices(function(device_list){
          for(var i = 0; i < device_list.length; i++)
          {
            //Add device to list of devices and to html select element
            var device = device_list[i];
            if(!selected_device || device.uid != selected_device.uid)
            {
              devices.push(device);
              var option = document.createElement("option");
              option.text = device.name;
              option.value = device.uid;
              html_select.add(option);
            }
          }

          
        }, function(){alert("Error getting local devices")},"printer");

      }, function(error){
        document.querySelector("#tipo_impresora").style.display = 'none';
        document.querySelector("#rb_impresora2").checked = true;
      })
}
function getConfig(){
  BrowserPrint.getApplicationConfiguration(function(config){
    alert(JSON.stringify(config))
  }, function(error){
    alert(JSON.stringify(new BrowserPrint.ApplicationConfiguration()));
  })
}
function writeToSelectedPrinter(dataToWrite)
{
  selected_device.send(dataToWrite, undefined, errorCallback);
}
var readCallback = function(readData) {
  if(readData === undefined || readData === null || readData === "")
  {
    alert("No Response from Device");
  }
  else
  {
    alert(readData);
  }
  
}
var errorCallback = function(errorMessage){
  alert("Error: " + errorMessage);  
}
function readFromSelectedPrinter()
{

  selected_device.read(readCallback, errorCallback);
  
}
function getDeviceCallback(deviceList)
{
  alert("Devices: \n" + JSON.stringify(deviceList, null, 4))
}

function sendImage(imageUrl)
{
  url = window.location.href.substring(0, window.location.href.lastIndexOf("/"));
  url = url + "/" + imageUrl;
  selected_device.sendUrl(url, undefined, errorCallback)
}
function sendImageHttp(imageUrl)
{
  url = window.location.href.substring(0, window.location.href.lastIndexOf("/"));
  url = url + "/" + imageUrl;
  url = url.replace("https", "http");
  selected_device.sendUrl(url, undefined, errorCallback)
}
function onDeviceSelected(selected)
{
  for(var i = 0; i < devices.length; ++i){
    if(selected.value == devices[i].uid)
    {
      selected_device = devices[i];
      return;
    }
  }
}
setup();
</script>