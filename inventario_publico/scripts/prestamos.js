window.addEventListener("load", function load(event){
    
    
	//Comprobar si el navegador soporta localstorage
    if (typeof(Storage) !== "undefined") {
    	window.removeEventListener("load", load, false); //remover listener, ya no es necesario
	    //LISTENER DE COMBOX
	    document.querySelector("#sel_tipo_identificacion_ingresar").selectedIndex = "0";
	    document.querySelector("#sel_tipo_identificacion_ingresar").addEventListener("change", function(){
	    	sae_cambio_identificacion(this,'txt_identificacion_ingresar', actualiza_datos);
	    });
	    //LISTENER DE IDENTIFICACION
	    document.querySelector("#txt_identificacion_ingresar").value = "";
	    document.querySelector("#txt_identificacion_ingresar").addEventListener("keyup",sae_dar_formato);
	    
	    document.querySelector("#txt_clave").value = "";

	    //Listener boton
	    document.querySelector("#btn_ingresar").addEventListener("click",Ingresar);	

	    //verificar si ya esta logeado
	    if (sessionStorage.TI) {
	    	document.querySelector("#sel_tipo_identificacion_ingresar").selectedIndex = sessionStorage.TI-1;
	    }
	    if (sessionStorage.usuario) {
	    	document.querySelector("#txt_identificacion_ingresar").value = sessionStorage.usuario;
	    }
	    if (sessionStorage.clave) {
	    	document.querySelector("#txt_clave").value = sessionStorage.clave;
	    	document.querySelector("#btn_ingresar").click();
	    }

	} else {
	    alert("Su navegador no soporta este sistema!");
	    window.location.href="index.php";
	}
},false);


/***************************************************************************/
/******************** PASO6: Crear funcion personal  ***********************/
/***************************************************************************/
		
function actualiza_datos(identificacion, id_objeto_afectado){
		if (identificacion){
		$("#"+id_objeto_afectado).prop("title", identificacion.nombre).attr("formato", identificacion.formato).prop("maxlength", identificacion.cantidad_caracteres).val("");
		$("#label_identificacion").html(identificacion.nombre);
	}else{
		$("#"+id_objeto_afectado).prop("title", "Cédula de Identidad").attr("formato", "@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@").prop("maxlength", "100").val("");
	}
}

/***************************************************************************/
/********************        validaIngreso           ***********************/
/***************************************************************************/
function validaIngreso(){
	var limite_caracteres = document.querySelector("#txt_identificacion_ingresar").getAttribute("maxlength");


	if(Valida_TXT("txt_identificacion_ingresar")){
		document.querySelector("#label_error").innerHTML = "Debe digitar la identificación!";
		return false;
	}else if(longitud_minima("txt_identificacion_ingresar",limite_caracteres)){
		document.querySelector("#label_error").innerHTML = "La identificación debe ser de "+limite_caracteres +" caracteres";
		return false;
	}else if(Valida_TXT("txt_clave")){
		document.querySelector("#label_error").innerHTML = "Debe su contraseña!";
		return false;
	}
	return true;
}


/***************************************************************************/
/********************           Ingresar             ***********************/
/***************************************************************************/
function Ingresar(event){
	//Prevenir default
	event.preventDefault();
	if(validaIngreso()){

		//Obtenemos los datos
		var TI = document.getElementById('sel_tipo_identificacion_ingresar').value;
		var usuario = document.getElementById('txt_identificacion_ingresar').value;
		var clave_enc = hex_md5(document.getElementById('txt_clave').value);
		var clave = document.getElementById('txt_clave').value;
    	var parametros = "TI="+TI+"&usuario="+usuario+"&clave="+clave_enc;
		
		/*****************************************************************/
		/***************   AJAX2 GET - validar user    *******************/
		/*****************************************************************/
		var xhr = new XMLHttpRequest();
		xhr.open('GET', 'validaUsuarioPublico.php?'+parametros, true);
		xhr.onreadystatechange = function(e) {
		  if (this.readyState == 4 && this.status == 200) {
		    var respuesta = this.responseText;
		    //El usuario no existe
		    if(respuesta=="e1"){
		    	document.querySelector("#label_error").innerHTML = "El usuario no existe!";
		    	return;
		    //La clave no es la del usuario
		    }else if(respuesta =="e2"){
		    	document.querySelector("#label_error").innerHTML = "La constraseña no concuerda con el usuario!";
		    	return;
		    //Se encuentra logeado en otro navegador
		    }else if(respuesta =="e3"){
		    	document.querySelector("#label_error").innerHTML = "Usted se encuentra logeado en otro navegador!";
		    	return;
		    //Todo bien
		    }else if(respuesta =="e5"){
		    	document.querySelector("#label_error").innerHTML = "Error creando la session contacte al administrador!";
		    	return;
		    //Todo bien
		    }else {
		    	//Guardar los datos en el local storage
		    	sessionStorage.usuario = usuario;
		    	sessionStorage.clave = clave;
		    	sessionStorage.TI = TI;
		    	/*****************************************************************/
				/***************   AJAX2 GET - principal       *******************/
				/*****************************************************************/
				var xhr_principal = new XMLHttpRequest();
				xhr_principal.open('GET', 'principal.php?', true);
				xhr_principal.onreadystatechange = function(e) {
				  if (this.readyState == 4 && this.status == 200) {
				    var respuesta = this.responseText;
			
				    document.querySelector("#contenedor").innerHTML = respuesta;
				   
				   
				  }
				};

				xhr_principal.send();
				/*****************************************************************/
				/***************   FIN AJAX2 GET - principal   *******************/
				/*****************************************************************/
		    }
		  }
		};

		xhr.send();

	}
}