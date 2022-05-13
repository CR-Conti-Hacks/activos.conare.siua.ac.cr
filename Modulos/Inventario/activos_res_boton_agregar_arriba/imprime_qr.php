<?php
	/***************************************************************************/
    $path = '../../../';
	include($path."Seguridad_Interfaz_GET.php");

    /****************************PARAMETROS  ***********************************/
	$Id_Act     		        = (isset($_GET['Id_Act'])) 			        ? $_GET['Id_Act'] 			        : '';

	//obtener impresora
	$sql ="SELECT Nombre_InvImp, IP_InvImp FROM tab_inventario_impresoras WHERE Id_InvImp = 1";
	$res = seleccion($sql);
	$IP_Impresora = $res[0]["IP_InvImp"];
	$Nombre_Impresora = $res[0]["Nombre_InvImp"];

	//sub dominio de impresion
	$sql = "SELECT Dominio_InvConf FROM tab_inventario_configuracion WHERE Id_InvConf = 1";
	$res_dominio_inventario = seleccion($sql);

	$dominio_inventario = '';
	if($res_dominio_inventario[0]["Dominio_InvConf"] !=''){
		$dominio_inventario	 = $res_dominio_inventario[0]["Dominio_InvConf"];
	}else{
		echo "error: no existe dominio para impresion de inventario";
		$dominio_inventario = $dominio.$ruta;
		exit;
	}

?>

<input type="hidden" id="IP_InvImp" name="Id_InvImp" value="<?=$IP_Impresora?>" />
<input type="hidden" id="Nombre_InvImp" name="Nombre_InvImp" value="<?=$Nombre_Impresora?>" />


<textarea id="zpl" cols="40" rows="20">
^XA
^PW380
^LL250
^LH0,0
^FS

^FWR
^FO50,50
^A0N,50,45^FD<?php echo 'SIUA'?>^FS
^FS

^FWR
^FO50,100
^A0N,50,45^FD<?=$Id_Act?>^FS
^FS


^FO190,30
^BQ,2,5,H,7
^FDQA,<?=$dominio_inventario?>?Id_Act=<?=$Id_Act?>
^FS

^XZ
</textarea>
<script>
    function print()
    {

     var zpl = document.getElementById("zpl").value;
      var ip_addr = document.getElementById("IP_InvImp").value;

      var url = "http://"+ip_addr+"/pstprnt";
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
   // this.close();
  </script>
