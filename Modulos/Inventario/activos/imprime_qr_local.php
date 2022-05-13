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
  /**************************  PARAMETROS **********************************/
  /*************************************************************************/
	$Id_Act     		        = (isset($_GET['Id_Act'])) 			        ? $_GET['Id_Act'] 			        : '';

	/*************************************************************************/
  /*****************    OBTENER IMPRESORA     ******************************/
  /*************************************************************************/
	$sql ="SELECT Nombre_InvImp, IP_InvImp FROM tab_inventario_impresoras WHERE Id_InvImp = 1";
	$res = seleccion($sql);
	$IP_Impresora = $res[0]["IP_InvImp"];
	$Nombre_Impresora = $res[0]["Nombre_InvImp"];

	//sub dominio de impresion
	$sql = "SELECT Dominio_InvConf FROM tab_inventario_configuracion WHERE Id_InvConf = 1";
	$res_dominio_inventario = seleccion($sql);

	/*************************************************************************/
  /*******************  DOMINIO PARA IMPRESIÓN   ***************************/
  /*************************************************************************/
  $dominioImpresion = '';
  if($Dominio_Impresion_ACON !=''){
    $dominioImpresion  = $Dominio_Impresion_ACON;
  }else{
    echo "error: no existe dominio para impresión de inventario";
    $dominioImpresion = $dominio.$ruta;
    exit;
  }

?>

<input type="hidden" id="IP_InvImp" name="Id_InvImp" value="<?=$IP_Impresora?>" />
<input type="hidden" id="Nombre_InvImp" name="Nombre_InvImp" value="<?=$Nombre_Impresora?>" />
<select id="selected_device" onchange=onDeviceSelected(this);></select>
<script type="text/javascript" src="<?=$dominio.$ruta?>js/Inventario/BrowserPrint-2.0.0.75.min.js" ></script>

<script type="text/javascript">
var codigo = "^XA"+
"^PW380"+
"^LL250"+
"^LH0,0"+
"^FS"+

"^FWR"+
"^FO50,50"+
"^A0N,50,45^FD<?php echo $Diminutivo_ACON?>^FS"+
"^FS"+

"^FWR"+
"^FO50,100"+
"^A0N,50,45^FD<?=$Id_Act?>^FS"+
"^FS"+


"^FO190,30"+
"^BQ,2,5,H,7"+
"^FDQA,<?=$dominio_inventario?>?Id_Act=<?=$Id_Act?>"+
"^FS"+

"^XZ";
var selected_device;
var devices = [];
function setup()
{
  //Get the default device from the application as a first step. Discovery takes longer to complete.
  BrowserPrint.getDefaultDevice("printer", function(device)
      {
    
        console.log("entro");
        console.log(device);
        //Add device to list of devices and to html select element
        selected_device = device;
        devices.push(device);
        var html_select = document.getElementById("selected_device");
        var option = document.createElement("option");
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
        writeToSelectedPrinter(codigo);
      }, function(error){
        alert(error);
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
