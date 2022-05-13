/******************************************************************/
/******************* Funcion SubirSessionURL  *********************/
//Se hace forma sincrona para detener la ejecucion de la funcion
//Hasta retornar un resultado
/******************************************************************/

function SubirSessionURL(direccion_web,cedula_encriptada){
    var miAjax=NuevoAjax();
	var pagina = 'Include/Session/ControlURL.php?';
	
	pagina += 'direccion_web='+direccion_web+'&cedula_encriptada='+cedula_encriptada;
     miAjax.open("GET",pagina,false);
	miAjax.send(pagina);
	respuesta = miAjax.responseText;
        //Si se creo actualizao corractamente la session
        //Se retorna un 1
        return respuesta;	
                
}