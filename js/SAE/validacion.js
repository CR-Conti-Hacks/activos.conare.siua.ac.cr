
/*************************************************************************/
/********************* Funcion soloNumeros  ******************************/
/********* llamada: onkeypress="return soloNumeros(event)" ***************/
//Permite al usuario solo digitar numeros
/*************************************************************************/
function soloNumeros(Texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    //Acepta 8: backspace / 0: Tabulacion
    if (tecla==8 || tecla==0) return true;
    //Patron aceptado
    var patron =/[0-9]/;
    //Obtener un caracter segun numero ASCII
    var te = String.fromCharCode(tecla); 
    //Evaluamos el caracter en el patron
    return patron.test(te); 
}

function soloNumeros2(campo) {
   if (isNaN(document.getElementById(campo).value) ) {
    alert ('Solo se permite numeros');
    document.getElementById(campo).value ='';
   }
}



/************************************************************************/
/********************* Funcion soloNumeros  *****************************/
/********* llamada: onKeyPress="return soloTexto(event)" **************/
//Permite al usuario solo digitar letras, ñ Ñ guion bajo y espacios

/************************************************************************/
function soloTexto(Texto) { 
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==8 || tecla==0) return true; 
    var patron =/[a-zA-ZñÑ_\s]/;
    var te = String.fromCharCode(tecla); 
    return patron.test(te); 
}
    
    
/************************************************************************/
/*************** Validacion GENERICA campo TEXTO  ***********************/
/*************** llamada: if(Valida_TXT('nombre_obj')) ******************/
//Valida si los datos son:
//null
//length=0
//espacios en blanco
//hace focus sobre el objeto
//return true (error)
//false si todo esta bien
//Hace trim()
/************************************************************************/
function Valida_TXT(nombre_obj){
    var valor = document.getElementById(nombre_obj).value;
    if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
        document.getElementById(nombre_obj).focus();
        return true;
    }
    //Hacer trim() -> quitar espacios en blanco al inicio y fin de la cadena
    document.getElementById(nombre_obj).value = valor.trim()
    return false;
}

/************************************************************************/
/*************** Validacion GENERICA campo TEXTO  ***********************/
/*************** llamada: if(Valida_FOTO('nombre_obj')) ******************/
//Valida si los datos son:
//null
//length=0
//espacios en blanco
//hace focus sobre el objeto
//return true (error)
//false si todo esta bien
//Hace trim()
/************************************************************************/
function Valida_FOTO(nombre_obj){
    var valor = document.getElementById(nombre_obj).value;
    if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
        $('#'+nombre_obj).click();
        
        return true;
    }
    return false;
}

/***********************************************************************/
/*************** Validacion GENERICA campo CORREO  *********************/
/*************** llamada: if(Valida_CORREO('nombre_obj')) **************/
//Valida si el correo no tiene un formato valido
//return true (error)
//false si todo esta bien
//Hace trim()
/***********************************************************************/
function Valida_CORREO(nombre_obj){
    var valor = document.getElementById(nombre_obj).value;
    if( !(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(valor)) ) {
        document.getElementById(nombre_obj).focus();
        return true;
    }
    //Hacer trim() -> quitar espacios en blanco al inicio y fin de la cadena
    document.getElementById(nombre_obj).value = valor.trim()
    return false;
}


/***********************************************************************/
/*************** Validacion GENERICA campo SELECT_0  *******************/
/*************** llamada: if(Valida_SELECT_0('nombre_obj')) ************/
//Valida si la opcion selecciona es diferente de 0
//return true (error)
//false si todo esta bien
/***********************************************************************/
function Valida_SELECT_0(nombre_obj){
    var indice = document.getElementById(nombre_obj).selectedIndex;
    //Si el indice es null o el valor que pusimos por defecto 0
    if( indice == null  ) {
        document.getElementById(nombre_obj).focus();
        return true;
    }else if(document.getElementById(nombre_obj).value ==0){
        document.getElementById(nombre_obj).focus();
        return true;
    }
    return false;
}

/***********************************************************************/
/*************** Validacion GENERICA campo SELECT_X  *******************/
/*************** llamada: if(Valida_SELECT_X('nombre_obj')) ************/
//Valida si la obcion selecciona es diferente de 'X'
//return true (error)
//false si todo esta bien
/***********************************************************************/
function Valida_SELECT_X(nombre_obj){
    var indice = document.getElementById(nombre_obj).selectedIndex;
    //Si el indice es null o el valor que pusimos por defecto 0
    if( indice == null || indice == 'X' ) {
        document.getElementById(nombre_obj).focus();
        return true;
    }
    return false;
}

/*************************************************************************/
/*************** Validacion GENERICA campo Checkbox Unico  ***************/
/*************** llamada: if(Valida_CHECKBOX_U('nombre_obj')) ************/
//Valida si un checkbox unico esta marcado
//return true (error)
//false si todo esta bien
/*************************************************************************/
function Valida_CHECKBOX_U(nombre_obj){
    if(document.getElementById(nombre_obj).checked) {
        document.getElementById(nombre_obj).focus();
        return true;
    }
    return false;
}


/*************************************************************************/
/*********** Validacion GENERICA campo Checkbox formulario  **************/
/********* llamada: if(Valida_CHECKBOX_G('nombre_formulario')) ***********/
//Valida si al menos un checkbox de un formulario esta marcado
//return true (error)
//false si todo esta bien
/*************************************************************************/
function Valida_CHECKBOX_FORMULARIO(nombre_formulario){
    var formulario = document.getElementById(nombre_formulario);
    //creamos una bandera si esta en 0  no hay ningun checkbok marcado
    //Si se convierte a 1 al menos 1 checkbox esta marcado
    var marcado = 0;
                                    
    //Recorriendo todos los elementos input del formulario
    for(var i=0; i < formulario.elements.length; i++){
        //pregunte si es de tipo checkbox
        if (formulario.elements[i].type == "checkbox") {
            //Si esta marcado 
            if (formulario.elements[i].checked) {
                marcado = 1;
            }
        }
    }
    //No se marco ninguno 
    if (marcado == 0) {
        //Volvemos a recorrer los elementos para encontrar el primer checkbok
        //y poder colocar el focus()
        for(var i=0; i < formulario.elements.length; i++){
            //pregunte si es de tipo checkbox
            if (formulario.elements[i].type == "checkbox") {
                break;
            }
        }
        formulario.elements[i].focus();
        return true;
    }
    return false;
}    

/*************************************************************************/
/*********** Validacion GENERICA campo radio bottom UNICO  ***************/
/*************** llamada: if(Valida_RADIO_U('nombre_obj')) ***************/
//Valida si un radio botom unico esta marcado
//return true (error)
//false si todo esta bien
/*************************************************************************/
function Valida_RADIO_U(nombre_obj){
    if(document.getElementById(nombre_obj).checked) {
        document.getElementById(nombre_obj).focus();
        return true;
    }
    return false;
}


/*************************************************************************/
/*********** Validacion GENERICA campo radio bottom VARIOS  ***************/
/*************** llamada: if(Valida_RADIO_U('nombre_obj')) ************/
//Valida si un radio botom unico esta marcado
//return true (error)
//false si todo esta bien
/*************************************************************************/
function Valida_RADIOS(nombre_obj){
    var radios = document.getElementsByName(nombre_obj);
    
    //creamos bandera
    var marcado = 0;
    for (var i=0;i<radios.length;i++){
        if (radios[i].checked){
            marcado = 1;
            break;
        }
    }
    //si no hay ninguno marcado
    if (marcado == 0) {
        radios[0].focus();
        return true
    }
    return false;
}


/*************************************************************************/
/*********** Validacion GENERICA longitud cadena minima  ***************/
/*************** llamada: if(longitud(numero)) ************/
//Valida si un radio botom unico esta marcado
//return true (error)
//false si todo esta bien
/*************************************************************************/
function longitud_minima(nombre_obj, numero_caracteres){
    var obj = document.getElementById(nombre_obj);
    
    //si no hay ninguno marcado
    if (obj.value.length < numero_caracteres) {
        obj.focus();
        return true
    }
    return false;
}

/*************************************************************************/
/*********** Limita cantidad caracteres a digitar   ***************/
/*************** llamada: if(longitud(numero)) ************/

/*************************************************************************/
function Limita_Tamano(nombre_obj, numero_caracteres){
    var obj = document.getElementById(nombre_obj);
    if (obj.value.length > numero_caracteres) {
        obj.value = obj.value.slice(0,numero_caracteres); 
    }
    return false;
}

/*************************************************************************/
/************************** ObtieneValor   *******************************/
//llamada: ObtieneValor('nombre formulario', 'nombre de objeto')
//Sirve para:
//          cajas de texto
//          combox simple
//          combox multiple (los retorna como cadena separada por ";" punto y coma)
//          textarea
//          radios bottom dependientes name="variable[]"
//La funcion hace TRIM()
/*************************************************************************/
function ObtieneValor(nombre_formulario, nombre_obj){
    
    //referimos el formulario
    var formulario = document.getElementById(nombre_formulario);
            
    //variable para guardar el valor
    var valor = null;
            
    //recorremos el fomulario
    for(var i=0; i < formulario.elements.length; i++){
                                    
        //pregunte si este este es el objeto buscado
        if (formulario.elements[i].name == nombre_obj || formulario.elements[i].id == nombre_obj) {
            var elemento = formulario.elements[i];

            //Si es un caja de texto / textarea / checkbox
            if (elemento.type == 'text' || elemento.type == 'textarea' || elemento.type=="checkbox" ) {
                valor = elemento.value;
            //Si es combobox de una seleccion 
            }else if (elemento.type == 'select-one') {
                valor = elemento[elemento.selectedIndex].value;
                         
            //Si es un combo box de multiple seleccion
            }else if (elemento.type == 'select-multiple') {
            
                //Concatena los valores en una cadena separada por punto y coma ";"
                var valores = '';
                //recorremos para saber cual esta marcado y obtener su valor
                for (var i = 0; i < elemento.options.length; i++) {
                    if(elemento.options[i].selected ==true){
                        valores += elemento.options[i].value+';';
                    }
                }
                valor = valores;
            
            //Si es un grupo de radio botom  obtiene el marcado                 
            }else if(elemento.type=='radio'){
                var radios = document.getElementsByName(nombre_obj);
                var valor = '';
                for(var i = 0; i < radios.length; i++){
                    if(radios[i].checked){
                        valor  = radios[i].value;
                    }
                }
            }
            break;
        }
    }
    //Hacer trim() -> quitar espacios en blanco al inicio y fin de la cadena
    return valor.trim();
}

/*************************************************************************/
/************************** ObtieneCHECKBOXs   ***************************/
//esta funcion recibe el nombre de un grupo de checkbox
//llamada: ObtieneCHECKBOX('variable[]')
//funciona tambien individual
//ej: name="variable[]"
//y los devuelve como cadena donde:
//1= marcado/true
//0= no marcado/false
/*************************************************************************/
function ObtieneCHECKBOX(nombre_obj,simbolo) {
    var checkboxs = document.getElementsByName(nombre_obj);
    var valores = '';
    for(var i = 0; i < checkboxs.length; i++){
        if(checkboxs[i].checked){
            valores += '1'+simbolo;
        }else{
            valores += '0'+simbolo;
        }
    }
    return valores;
}

/*************************************************************************/
/************************** ObtieneRADIO       ***************************/
//esta funcion recibe el nombre de un grupo de checkbox
//funciona tambien individual
//llamada: ObtieneRADIO('variable[]')
//ej: name="variable[]"
//y devuelve el valor del elemento marcado
/*************************************************************************/     
function ObtieneRADIO(nombre_obj) {
    var radios = document.getElementsByName(nombre_obj);
    var valor = '';
    for(var i = 0; i < radios.length; i++){
        if(radios[i].checked){
            valor  = radios[i].value;
            break;
        }
    }
    return valor;
}
/*************************************************************************/
/************************** ObtieneRADIOS   ***************************/
//esta funcion recibe el nombre de un grupo de radios
//ej: name="variable[]"
//y los devuelve como cadena donde:
//1= marcado/true
//0= no marcado/false
/*************************************************************************/
function ObtieneRADIOS(nombre_obj) {
    var radios = document.getElementsByName(nombre_obj);
    var valores = '';
    for(var i = 0; i < radios.length; i++){
        if(radios[i].checked){
            valores += '1;';
        }else{
            valores += '0;';
        }
    }
    return valores;
}

/**************************************************************
onkeyup="mascara(this,'-',patron_telefono,true)" maxlength="9"
onkeyup="mascara(this,'-',patron_cedula,true)" maxlength="11"
****************************************************************/
var patron_cedula = new Array(1,4,4);
var patron_telefono = new Array(4,4);
var patron_ip = new Array(3,3,3,3);
var patron_Lat_Long = new Array(3,3,3,3);
			
function mascara(d,sep,pat,nums){
	if(d.valant != d.value){
		val = d.value
		largo = val.length
		val = val.split(sep)
		val2 = ''
		for(r=0;r<val.length;r++){
			val2 += val[r]	
		}
		if(nums){
			for(z=0;z<val2.length;z++){
				if(isNaN(val2.charAt(z))){
					letra = new RegExp(val2.charAt(z),"g")
					val2 = val2.replace(letra,"")
				}
			}
		}
		val = ''
		val3 = new Array()
		for(s=0; s<pat.length; s++){
			val3[s] = val2.substring(0,pat[s])
			val2 = val2.substr(pat[s])
		}
		for(q=0;q<val3.length; q++){
			if(q ==0){
				val = val3[q]
			}
			else{
				if(val3[q] != ""){
    				val += sep + val3[q]
				}
			}
		}
		d.value = val
		d.valant = val
	}
}

/*************************************************************************/
/************************** LimitarTipoArchivo_IMG   ***************************/
//esta funcion valida el tipo de archivos a subir IMAGENES
//ej:  onchange="LimitarTipoArchivo('foto')"
//retorna tur si es una image
//False si no lo es
/*************************************************************************/
function LimitarTipoArchivo_IMG(objeto) {
    
    var campo = document.getElementById(objeto);
    var arrExtensions=new Array("bmp", "gif", "jpg", "jpeg", "png");
   // var arrExtensions=new Array("doc", "docx", "pdf", "odt", "xls","odp");
    
    
    var strFilePath = campo.value;
    
    var arrTmp = strFilePath.split(".");
    var strExtension = arrTmp[arrTmp.length-1].toLowerCase();
    var blnExists = false;
    for (var i=0; i<arrExtensions.length; i++) {
        if (strExtension == arrExtensions[i]) {
            blnExists = true;
            break;
        }
    }
    return blnExists;
}

/*****************************************************************************/
/********************* Funcion validaCantidadTexArea *************************/
//HTML:
//<span class="gris font06">( el tamaño maximo del texto 1000 es de caracteres )</span>
//<br/>
//<input readonly type=text name="Tam_quienes" id="Tam_quienes" size=3 maxlength=3 value="<?=$Tam_quienes ?>" class="width50 gris">
//<br />
//<textarea id="txt_quienes" name="txt_quienes" class="width500 height350" 
//onKeyDown="validaCantidadTexArea('txt_quienes','Tam_quienes',1000);"
//onKeyUp="validaCantidadTexArea('txt_quienes','Tam_quienes',1000);"><?=$Quienes_Somos_Conf?></textarea>
//llamada:
//onKeyDown="validaCantidadTexArea('txt_quienes','Tam_quienes',1000);"
//onKeyUp="validaCantidadTexArea('txt_quienes','Tam_quienes',1000);"
/*****************************************************************************/
function validaCantidadTexArea(Campo, Cuadro_Cant, maxlimit) {
	field = document.getElementById(Campo);

	countfield = document.getElementById(Cuadro_Cant);

	if (field.value.length > maxlimit) // if too long...trim it!
	field.value = field.value.substring(0, maxlimit);
	// otherwise, update 'characters left' counter
	else 
	countfield.value = maxlimit - field.value.length;
}


/*************************************************************************/
/************************** Tamano_Archivo  ***************************/
//Obtiene el tamaño del archivo
//Tamano_Archivo('foto_logo')
/*************************************************************************/
function Tamano_Archivo(objeto) {
    var input, file;

    //Comprobar que el navegador soporta el FileReader
    if (!window.FileReader) {
        $(this).notifyMe(
				'top', //Bottom/top/left/ right
				'error', //error/info/success/default
				'Error:', //titulo
				'Su navegador no soporta este tipo de carga de imagenes, por favor actualicelo e intente de nuevo', //texto
				400, //velocidad
				2400 //tiempo
		);
        return;
    }
    //Obtenemos el objeto a validar
    input = document.getElementById(objeto);
    
    //Comprobar que existe un campo tipo file
    if (!input) {
         $(this).notifyMe(
				'top', //Bottom/top/left/ right
				'error', //error/info/success/default
				'Error:', //titulo
				'No hay ningun campo de carga con el nombre solicitado', //texto
				400, //velocidad
				2400 //tiempo
		);
    }
    else if (!input.files) {
        $(this).notifyMe(
				'top', //Bottom/top/left/ right
				'error', //error/info/success/default
				'Error:', //titulo
				'Su navegador no soporta la propiedad "Files"', //texto
				400, //velocidad
				2400 //tiempo
		);
        
    }
    else if (!input.files[0]) {
        $(this).notifyMe(
				'top', //Bottom/top/left/ right
				'error', //error/info/success/default
				'Error:', //titulo
				'Todavía no a cargado ninguna imagen', //texto
				400, //velocidad
				2400 //tiempo
		);
        
    }
    else {
        //Obtenemos el archivo
        var archivo = input.files[0];
        //Obtenemos el tamaño en bytes
        var tam_bytes = archivo.size;
        //lo convertinos a kilobytes
        var tam_kilo = tam_bytes/1024
        //lo convertinos a Megabytes
        var tam_mega = tam_kilo/1024
        return tam_mega;
    }
}


/*************************************************************************/
/************************** Convierte_Mayuscula***************************/
//Recibe un objeto obtiene su valor y lo convierte a mayuscula
//onkeyup="Convierte_Mayuscula('txt_nombre')"
/*************************************************************************/
function Convierte_Mayuscula(objeto) {
    document.getElementById(objeto).value = document.getElementById(objeto).value.toUpperCase();
    
}
 
