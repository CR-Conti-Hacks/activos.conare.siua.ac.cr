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


	$sql ="SELECT Nombre_InvImp, IP_InvImp FROM tab_inventario_impresoras WHERE Id_InvImp = 1";
	$res = seleccion($sql);
	$IP_Impresora = $res[0]["IP_InvImp"];
	$Nombre_Impresora = $res[0]["Nombre_InvImp"];


    $ID = str_pad($Id_Act, 9, "0", STR_PAD_LEFT);
?>
<input type="hidden" id="IP_InvImp" name="Id_InvImp" value="<?=$IP_Impresora?>" />
<input type="hidden" id="Nombre_InvImp" name="Nombre_InvImp" value="<?=$Nombre_Impresora?>" />

<textarea id="zpl" cols="40" rows="20">
^XA
^PW360
^LH0,0
^FS
^FWR

^FO0,40
^BY2^B3N,N,100,N,N
^FD<?=$ID?>
^FS

^FO10,150
^A0N,50,45^FD<?php echo $Diminutivo_ACON.'-'.$ID?>^FS
^FS



^XZ
</textarea>
<script>
    function print()
    {

		var zpl = document.getElementById("zpl").value;
		var ip_addr = document.getElementById("IP_InvImp").value;

		var url = "http://"+ip_addr+"/pstprnt";
		//alert(url)
		var method = "POST";
		var async = true;
		var request = new XMLHttpRequest();

		request.onload = function () {
		  //var status = request.status; // HTTP response status, e.g., 200 for "200 OK"
		  //var data = request.responseText; // Returned data, e.g., an HTML document.
		};

		request.open(method, url, async);
	   // request.setRequestHeader("Content-Length", zpl.length);

		// Actually sends the request to the server.
		request.send(zpl);
    }
    print();
   //  this.close();
  </script>
