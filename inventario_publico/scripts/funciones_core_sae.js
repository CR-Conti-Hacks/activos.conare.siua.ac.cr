
String.prototype.splice = function(idx, rem, str) {
    return this.slice(0, idx) + str + this.slice(idx + Math.abs(rem));
};

/**************************************************************************************/
/************************** sae_cambio_identificacion       ***************************/
//esta funcion recibe: objeto_html, id_objeto_afectado, funcion_a_ejecutar
//llamada <select onchange="sae_cambio_identicacion(this, 'id_text', cambio_identificacion)">

//Encuentra el objeto asociado a la opcion del select actual
//Ejecuta la función recibida por parámetros con los parametros identificacion (objeto con informacion de la identificacion seleccionada), id_objeto_afectado

/*************************************************************************************/    




function sae_cambio_identificacion ( objeto_html, id_objeto_afectado, funcion_a_ejecutar){
	//Busca en el array de tipos de indentificación, cual coninside y lo devuelve
	function encuentraNombre (sae_identificacion){
		return sae_identificacion.id === objeto_html.value;
	}
	// Identificacion toma el valor que se busca
	var identificacion = sae_tipo_identificaciones.find(encuentraNombre);
	
	//Se ejecuta la función y se le pasa el id del objeto que afectará
	funcion_a_ejecutar (identificacion, id_objeto_afectado);
}

/**************************************************************************************/
/*********************************** sae_dar_formato  ********************************/
//esta funcion recibe: id_objeto_html
//llamada <select onkeyup="sae_dar_formato(event)">

//Hace que el formato para cada tipo de indentificación se coloce como debe
//En cada vez que se presiona una nueva tecla se hace la validacion para que se siga el formato apropiado

/*************************************************************************************/    



function sae_dar_formato (event){

	var objeto = $("#"+event.target.id);
	var formato = objeto.attr ("data-formato");
	var posicion = objeto[0].selectionStart;
	var textoValido = "";
	var tam;
	
	if (objeto.val().length < formato.length)
		tam = objeto.val().length;
	else
		tam = formato.length;
	
	for (var i = 0; i < tam; i++)
	{
		if (sae_determina_patron (formato[i]).test (objeto.val()[i]))	
			textoValido += objeto.val()[i];
		else
		{
			if (formato[i] != "#" && formato[i] != "@" && formato[i] != "$")
			{
				objeto.val(objeto.val().splice(i, 0, formato[i]));
				tam++;
				if (sae_determina_patron (formato[i]).test (objeto.val()[i]))	
					textoValido += objeto.val()[i];
				
				if (posicion >= i)
					posicion++;		
			}
		}

	}

	objeto.val(textoValido);
	objeto[0].selectionEnd = posicion; 
	
}

/**************************************************************************************/
/*********************************** sae_determina_patron  ********************************/
//esta funcion recibe: caracter
//llamada sae_determina_patron (char)

//Devuelve la expresión regular según qué tipo de valores se acepten
// # Numerico
// @ Alfabético
// $ Alfanumérico
// default Cualquier otro caracter que se use para separación / Caracter necesario

/*************************************************************************************/    



function sae_determina_patron (caracter)
{
	switch (caracter)
	{
		case "#":
			return /[0-9]/g;
			break;
		case "@":
			return /[a-zA-ZñÑ]/g;
			break;
		case "$":
			return /[0-9a-zA-ZñÑ]/g;
			break;
		default:
			return new RegExp (caracter, "g");
			break;
	}
}

function sae_valida_form (event){
	event.preventDefault();
	var id = event.target.id;
	
	var text = $("form#"+id+" input[type=text]:visible");

	text.each (function(){
		if(!sae_cumple_formato ($(this).attr("formato"), $(this).val()))
			$(this).addClass ("invalido");
		else
			$(this).removeClass ("invalido");
	});
}

function sae_cumple_formato(formato, texto){
	var valido = true;

	
	for (var i = 0; i < texto.length; i++)
		if (sae_determina_patron (formato[i]).test (texto[i]) == false)
			valido = false;
	
	if (texto.length != formato.length)
		valido = false;
		
	return valido;
	
}