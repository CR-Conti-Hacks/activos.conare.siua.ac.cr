/********************************************************************************************/
/*Licencia SAE

Es condición necesaria para la utilización, modificación, distribución, ingeniería inversa o cualquier  otro procedimiento informático que haga necesario el acceso al código fuente del Sistema de Administración Empresarial (SAE) desarrollado por Gustavo Matamoros González cédula 1-1162-0857 el consentimiento del mismo.

APLICABILIDAD Y DEFINICIONES

Esta Licencia se aplica al Sistema de Administración Empresarial, en cualquier medio convencional ó electrónico, autorizando al autor del sistema a distribuirlo bajo los términos descritos en los apartados posteriores.  En adelante la palabra Sistema se referirá al código fuente del Sistema de  Administración Empresarial. Cualquier persona es un licenciatario y será referido como Usted. Usted acepta la licencia si copia, modifica o distribuye el Sistema de cualquier modo que requiera permiso según la ley de propiedad intelectual.

CONDICIONES DE LICENCIA

Reconocimiento: En cualquier explotación del Sistema será necesario el reconocimiento de la autoría individual o colectiva.
No Comercial: En cualquier explotación del Sistema no se permite el uso comercial ó el uso con cualquier finalidad comercial.
Obra Derivada: En cualquier explotación del Sistema no se permite la obra derivada del mismo.
Redistribución: En cualquier explotación del Sistema no se permite la distribución y copia del mismo.
Publicidad: Con esta licencia el autor del Sistema no da permiso para usar su nombre para publicidad ni para asegurar o implicar aprobación de cualquier versión modificada.
Compartir Igual: La explotación autorizada incluye la creación de obras derivadas siempre que mantenga la misma licencia al ser divulgadas.
Uso exclusivo: En cualquier explotación del Sistema será de autorizado por el autor del sistema.
TRADUCCIÓN
La Traducción es considerada como un tipo de modificación, por lo que Usted no puede distribuir traducciones del Sistema.

TERMINACIÓN
Usted no puede copiar, modificar, sublicenciar o distribuir el Sistema salvo por lo permitido expresamente bajo esta Licencia. Cualquier intento en otra manera de copia, modificación, sublicenciamiento, o distribución de él es nulo, y dará por terminados automáticamente sus derechos bajo esa Licencia.
Si usted viola  esta Licencia, aplicará la licencia titular de copyright ó derechos de autor, quedando restaurada provisionalmente, a menos y hasta que el titular del copyright ó derechos de autor explícita y finalmente termine su licencia.
*/
/********************************************************************************************/



/******************************************************************/
/**************** Declaracion variables globales ******************/
/******************************************************************/
var ESTADO_NO_INICIADO = 0;
var ESTADO_CARGANDO = 1;
var ESTADO_CARGADO = 2;
var ESTADO_INTERACTIVO = 3;
var ESTADO_COMPLETO = 4;

var miAjax=null;

   
   
   
   
   
   
   
   
    
/******************************************************************/
/********************* Crear objeto AJAX   ************************/
/********* llamada: var miAjax = new NuevoAjax ********************/
/******************************************************************/
function NuevoAjax() {
    try {
	ajax = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
	try {
            ajax= new ActiveXObject("Microsoft.XMLHTTP");
	} catch (E) {
            ajax= false;
	}
    }
    if (!ajax && typeof XMLHttpRequest!='undefined') {
	ajax = new XMLHttpRequest();
    }
    return ajax
}













/******************************************************************/
/********************* CREA QUERY STRING   ************************/
/* llamada: creaQueryString(parametros,valores) *******************/
/* llamada: creaQueryString('param1;param2;','val1;val2;') ********/
/******************************************************************/
function creaQueryString(parametros,valores) {
    var array_parametros = parametros.split(";");
    var array_valores = valores.split(";");
    var cadena = '';
    for(var i=0; i<array_parametros.length-1;i++){
        cadena += encodeURIComponent(array_parametros[i])+"="+encodeURIComponent(array_valores[i])+"&";
    }
    cadena += "nocache=" + Math.random();

    return cadena;    
}













/******************************************************************/
/*************** LLAMADA ASINCRONA GENERICA ************************/
//var pagina ='hola.php';
//var parametros = "usuario;clave;";
//var valores = document.getElementById('usuario').value +';'+document.getElementById('clave').value+';';
//metodo GET / POST
//destino: Modulo/SAE/index.php
//CargaPagina(pagina,parametros, valores,'POST','destino');
/******************************************************************/
function CargaPagina(pagina,parametros,valores,metodo,destino) {
    OcultarMensajesAyuda();
    /***************************************************/
    /****************** Variables Locales  *************/
    /***************************************************/
    var miAjax = NuevoAjax();
    var respuesta;
    
    
    /***************************************************/
    /*********     Creamos la query string       *******/
    /***************************************************/
    var query_string = creaQueryString(parametros,valores);

    
    /***************************************************/
    /*********     Verificamos tipo de envió     *******/
    /***************************************************/
    if (metodo=='GET') {
        miAjax.open(metodo,pagina+'?'+query_string,true);
    }else if (metodo=='POST') {
        miAjax.open(metodo,pagina,true);
        miAjax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    }
    
    /***************************************************/
    /*********       Llamada AJAX ASINCRONA       ******/
    /***************************************************/
    miAjax.onreadystatechange=function() {
        if (miAjax.readyState==ESTADO_COMPLETO){
            if(miAjax.status==200){
                //Declaramos la variable que va almacenar los script
                var scs=miAjax.responseText.extractScript();
              
                document.getElementById(destino).innerHTML = miAjax.responseText;
                //Mandamos a ejecutar los scripts
                scs.evalScript();
                window.scrollTo(0,0);
            }
        }
    }
    if (metodo=='GET') {
        miAjax.send(null);
    }else if (metodo=='POST') {
        miAjax.send(query_string);
    }
    /***************************************************/
    /*******  FIN de Llamada AJAX SINCRONA       *******/
    /***************************************************/
    window.scrollTo(0,0);
}




/******************************************************************/
/*************** LLAMADA SINCRONA GENERICA ************************/
//var pagina ='hola.php';
//var parametros = "usuario;clave;";
//var valores = document.getElementById('usuario').value +';'+document.getElementById('clave').value+';';
//metodo GET / POST
//destino: Modulo/SAE/index.php
//CargaPagina(pagina,parametros, valores,'POST','destino');
/******************************************************************/
function CargaPagina_SIN(pagina,parametros,valores,metodo,destino) {
    OcultarMensajesAyuda();
    /***************************************************/
    /****************** Variables Locales  *************/
    /***************************************************/
    var miAjax = NuevoAjax();
    var respuesta;
    
    
    /***************************************************/
    /*********     Creamos la query string       *******/
    /***************************************************/
    var query_string = creaQueryString(parametros,valores);

    /***************************************************/
    /*********     Verificamos tipo de envió     *******/
    /***************************************************/
    if (metodo=='GET') {
        miAjax.open(metodo,pagina+'?'+query_string,false);
            miAjax.onreadystatechange=function() {
            if (miAjax.readyState==ESTADO_COMPLETO){
                if(miAjax.status==200){
                    
                    //Declaramos la variable que va almacenar los script
                    var scs=miAjax.responseText.extractScript();
                    document.getElementById(destino).innerHTML = miAjax.responseText;
                    
                    //Mandamos a ejecutar los scripts
                    scs.evalScript();
                    window.scrollTo(0,0);
                }
            }
        }
    }else if (metodo=='POST') {
        miAjax.open(metodo,pagina,false);
        miAjax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    }
    
    
    /***************************************************/
    /*********     Verificamos tipo de envió     *******/
    /***************************************************/
    if (metodo=='GET') {
        miAjax.send(null);
    }else if (metodo=='POST') {
        miAjax.send(query_string);
    }
    window.scrollTo(0,0);
}













/**********************************************************************/
/********************    Funcion cargaPaginaMenu **********************/
//Permite cargar paginas en menu:
//llamada: cargaPaginaMenu(pagina, parametros,valores)
/**********************************************************************/
function CargaPaginaMenu(pagina,parametros,valores) {

    document.querySelector("#saePreloader").style.display = "block";

    OcultarMensajesAyuda();
    /***************************************************/
    /****************** Variables Locales  *************/
    /***************************************************/
    var miAjax = NuevoAjax();
    var respuesta;
    
    /***************************************************/
    /************* Datos de SEGURIDAD      *************/
    /***************************************************/
    var cedula_global = document.getElementById('cedula_global').value;
    var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
    var Key_Usu = document.getElementById('Key_Usu').value;

    parametros += 'cedula_global;Id_Per_Usu;Key_Usu;';
    valores += cedula_global+';'+Id_Per_Usu+';'+Key_Usu+';';
    
    /***************************************************/
    /*********     Creamos la query string       *******/
    /***************************************************/
    var query_string = creaQueryString(parametros,valores);
    //alert(query_string)
    /***************************************************/
    /*********       Llamada AJAX ASINCRONA       ******/
    /***************************************************/
    miAjax.open('GET',pagina+'?'+query_string,true);
    miAjax.onreadystatechange=function() {
        if (miAjax.readyState==ESTADO_COMPLETO){
            if(miAjax.status==200){
                
                //Declaramos la variable que va almacenar los script
                var scs=miAjax.responseText.extractScript();
		
                document.getElementById('cuerpo').innerHTML = miAjax.responseText;

                //Mandamos a ejecutar los scripts
                scs.evalScript();
                window.scrollTo(0,0);
            }
        }
        document.querySelector("#saePreloader").style.display = "none";
    };
    miAjax.send(null);
    /***************************************************/
    /*******  FIN de Llamada AJAX SINCRONA       *******/
    /***************************************************/
    window.scrollTo(0,0);
}
















/**********************************************************************/
/**********             funcion salir ()                   ************/
/**********************************************************************/
function Salir(Id_Per_Usu){

    /***************************************************/
    /****************** Variables Locales  *************/
    /***************************************************/
    var  miAjax=NuevoAjax();
    pagina="Salir.php";
   
    /***************************************************/
    /************* Datos de SEGURIDAD      *************/
    /***************************************************/
    var cedula_global = document.getElementById('cedula_global').value;
    var Key_Usu = document.getElementById('Key_Usu').value;
    var parametros = 'cedula_global;Id_Per_Usu;Key_Usu;';
    var valores = cedula_global+';'+Id_Per_Usu+';'+Key_Usu+';';
    
    /***************************************************/
    /*********     Creamos la query string       *******/
    /***************************************************/
    var query_string = creaQueryString(parametros,valores);
    
    /***************************************************/
    /*********       Llamada AJAX ASINCRONA       ******/
    /***************************************************/
    miAjax.open("GET",pagina+'?'+query_string,true);
    miAjax.onreadystatechange=function() {
    if (miAjax.readyState==4){
         if(miAjax.status==200){
         var respuesta = miAjax.responseText;
 
         var dominio =  document.getElementById('dominio').value;
         var ruta =  document.getElementById('ruta').value;
         
         
         location.href=dominio+ruta+"index.php?";
       }
      }
    }
    miAjax.send(null);
    window.scrollTo(0,0);
	/***************************************************/
    /*******  FIN de Llamada AJAX SINCRONA       *******/
    /***************************************************/	
}














/**********************************************************************/
/**********        funcion Guarda_Checkbox ()              ************/
//recibe el objeto a guardar (this)
//recibe el nombre de la tabla
//recibe el nombre del campo de la BD
//pagina que atiende solicitud
/**********************************************************************/
function Guarda_Checkbox(objeto,tabla,nombre_campo, pagina){
    
    /***************************************************/
    /****************** Variables Locales  *************/
    /***************************************************/
    var miAjax = NuevoAjax();
    var respuesta;
    
    /***************************************************/
    /************* Datos de SEGURIDAD      *************/
    /***************************************************/
    var cedula_global = document.getElementById('cedula_global').value;
    var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
    var Key_Usu = document.getElementById('Key_Usu').value;
    var parametros = 'cedula_global;Id_Per_Usu;Key_Usu;';
    var valores = cedula_global+';'+Id_Per_Usu+';'+Key_Usu+';';
    
    
    
    
    /***************************************************/
    /**********   Verificamos el checbox       *********/
    /***************************************************/
    if (objeto.checked == true) {
        marcado = 1; 
    }else if (objeto.checked == false) {
        marcado = 0; 
    }
    
    /***************************************************/
    /********* Los concatenamos a las parametros *******/
    /***************************************************/
    parametros += 'marcado;nombre_campo;tabla;';
    valores += marcado+';'+nombre_campo+';'+tabla+';';
     
    /***************************************************/
    /*********     Creamos la query string       *******/
    /***************************************************/
    var query_string = creaQueryString(parametros,valores);
    
    /***************************************************/
    /*********       Llamada AJAX ASINCRONA       ******/
    /***************************************************/
    miAjax.open('GET',pagina+'?'+query_string,true);
    miAjax.onreadystatechange=function() {
        if (miAjax.readyState==ESTADO_COMPLETO){
            if(miAjax.status==200){
                
                //Declaramos la variable que va almacenar los script
                var scs=miAjax.responseText.extractScript();
		
                var respuesta = miAjax.responseText.trim();
                //El dato se actualizao correctamente
                if (respuesta=='1') {
                    $(this).notifyMe(
						'top', //Bottom/top/left/ right
						'success', //error/info/success/default
						texto['Exito']+':', //titulo
						texto['EXITO_Parametro'], //texto
						200, //velocidad
						1000 //tiempo
					);
                }else if(respuesta=='e1'){
                    $(this).notifyMe(
						'top', //Bottom/top/left/ right
						'error', //error/info/success/default
						texto['Error']+':', //titulo
						texto['Error_Generico'], //texto
						200, //velocidad
						1000 //tiempo
					);
                }             
                
                //Mandamos a ejecutar los scripts
                scs.evalScript(); 
            }
        }
    }
    miAjax.send(null);
    /***************************************************/
    /*******  FIN de Llamada AJAX SINCRONA       *******/
    /***************************************************/
}












/**********************************************************************/
/*******************     ActivaEdicion         ************************/
//Esta función activa la edición de un span aun input
//Llamado: ActivaEdicion('etiqueta_nombre(span)','campo_nombre(span_con_input)','txt_nombre_empresa(nombre_input)',0)
//o=ocultar el viejo y mostrar el nuevo
//1=ocultar el nuevo y mostrar el viejo
/**********************************************************************/
function ActivaEdicion(etiqueta,campo,nombre_campo,estado) {
    if (estado ==0) {
        document.getElementById(etiqueta).style.display='none';
        document.getElementById(campo).style.display='inline';
        document.getElementById(nombre_campo).focus();
    }else if (estado ==1) {
        document.getElementById(etiqueta).style.display='inline';
        document.getElementById(campo).style.display='none';
    }
}






/****************************************************************************/
/***************** Funcion Verificar_Carpeta          ***********************/
//Verifica si la carpeta contiene una ruta correcta en caso se hackeo
/****************************************************************************/
function Verificar_Carpeta(direccion,mostrar_men,campo){
    $(this).notifyMe(
		'top', //Bottom/top/left/ right
		'info', //error/info/success/default
		texto['Info']+':', //titulo
		texto['INFO_Verifica_Carpeta'], //texto
		200, //velocidad
		2000 //tiempo
					);
    /***************************************************/
    /****************** Variables Locales  *************/
    /***************************************************/ 
    var miAjax = NuevoAjax();
    var respuesta;
   
    /***************************************************/
    /**********        Obtenemos datos         *********/
    /***************************************************/ 
    var cedula_global = document.getElementById('cedula_global').value;
    var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
    var Key_Usu = document.getElementById('Key_Usu').value;
    var dominio =  document.getElementById('dominio').value;
    var pagina = dominio+ruta+'Conf_Carpeta.php';
    //La direccion que digita el usuario
    var ruta =  document.getElementById('txt_carpeta').value;
    
    /***************************************************/
    /*********     Creamos la query string       *******/
    /***************************************************/
    var parametros = 'cedula_global;Id_Per_Usu;Key_Usu;';
    var valores = cedula_global+';'+Id_Per_Usu+';'+Key_Usu+';';
    //creamos la query string
    var query_string = creaQueryString(parametros,valores);

    
    /***************************************************/
    /*********        Llamada AJAX SINCRONA       ******/
    /***************************************************/
    miAjax.open("GET",pagina+'?'+query_string,false);
	miAjax.send();
    //Declaramos la variable que va almacenar los script
    var scs=miAjax.responseText.extractScript();
    var respuesta = miAjax.responseText.trim();
    //Mandamos a ejecutar los scripts
    scs.evalScript();
    
    /***************************************************/
    /*********        Control de Errores          ******/
    /***************************************************/
    if (respuesta=='1') {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'success', //error/info/success/default
            texto['Exito']+':', //titulo
            texto['EXITO_Ruta_Carpeta_Empresa'], //texto
            300, //velocidad
            5500 //tiempo
        );

    }else{
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Ruta_Carpeta_Empresa'], //texto
            300, //velocidad
            5500 //tiempo
        );
    }

}



/****************************************************************************/
/*****************           Funcion Ordenar          ***********************/
//Utilizada para mandar a ordenar una pagina de consulta por un campo
//En orden Asendente  o desendente
//pagina: pagina a ordenar
//campo: campo por el cual ordenar
//tipo: ASC o DESC
//Parametros y valores
/*
onClick="javascript:Ordenar('Modulos/SAE/Perfiles/con_perfiles.php',
												   'or_nom_per',
												   'Nombre_Rol',
												   'or_nom_per_tipo',
												   'pagina;inicio;bs_nom_per;',
												   '<?=$pagina?>;<?=$inicio?>;'
												   +document.getElementById('bs_nom_per').value+';'
												);
*/
/****************************************************************************/
function Ordenar(pagina,campo,valor,tipo,parametros,valores){
    
    /********************************************************************/
    /********* PASO#1: enviar el tipo de ordenamiento al campo **********/
    /********************************************************************/
    if((document.getElementById(tipo).value=='ASC')||(document.getElementById(tipo).value=='')){
        document.getElementById(tipo).value = 'DESC';
    }else{
        document.getElementById(tipo).value = 'ASC';
    }
    
    /********************************************************************/
    /******* PASO#2: agregar el parametro de tipo de ordenamiento *******/
    /********************************************************************/
    parametros += campo+';'+tipo+';';
    valores += valor+';'+document.getElementById(tipo).value+';';

    /********************************************************************/
    /*******      PASO#3: volver a cargar la pagina               *******/
    /********************************************************************/
    CargaPaginaMenu(pagina,parametros,valores);

}



/****************************************************************************/
/*****************    Funcion MostrarBusqueda         ***********************/
//Muestra o oculta el formulario de busqueda en una pagina de consulta
/****************************************************************************/
function MostrarBusqueda(){
	var estado = document.getElementById('Buscar').style.display;
	if(estado == 'none'){
		document.getElementById('Buscar').style.display = 'block';	
	}else if(estado == 'block'){
		document.getElementById('Buscar').style.display = 'none';	
	}
        
}


/***********************************************************************************/
/*****************           Funcion MostrarOcultar          ***********************/
//muestra o culta un elemento
//llamada: MostrarOcultar('buscar')
/***********************************************************************************/
function MostrarOcultar(objeto){
	
	elem = document.getElementById(objeto);
	
	if(elem.style.display=='block'){
		elem.style.display='none';
	}else if(elem.style.display=='none'){
		elem.style.display='block';
	}
}




/****************************************************************************/
/*****************           Funcion Buscar          ***********************/
//Utilizada para las busquedas de registros
//LLamada desde campo
/*onKeyPress="Buscar(
								event,
								'Modulos/SAE/Perfiles/con_perfiles.php',
								'or_nom_per;or_nom_per_tipo;bs_nom_per;',
								document.getElementById('or_nom_per').value+';'
								+document.getElementById('or_nom_per_tipo').value+';'
								+document.getElementById('bs_nom_per').value
							);"
*/
//Llamada desde boton
/*
onclick="javascript:
						Buscar(
								'',
								'Modulos/SAE/Perfiles/con_perfiles.php',
								'or_nom_per;or_nom_per_tipo;bs_nom_per;',
								document.getElementById('or_nom_per').value+';'
								+document.getElementById('or_nom_per_tipo').value+';'
								+document.getElementById('bs_nom_per').value
							);"
*/
//Texto: contiene la tecla presionada si es ENTER la invoca
//pagina: pagina a llamar
//parametros y valores
/****************************************************************************/
function Buscar(Texto,pagina,parametros,valores){

    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    //Si presiono EnTER o dio clic en el boton 
    if ((tecla==13)||(Texto=='')){
       // alert(parametros)
        //alert(valores)
        CargaPaginaMenu(pagina,parametros,valores);

    }
    

}






/***********************************************************************************/
/*****************           Funcion MostrarVentana          ***********************/
//Utilizada para mostrar un contenido en una ventana
//Efecto: numero entre 1 y 20
//objeto: objeto que invoca la ventana
//efecto: numero de efecto del 1 al 20
//pagina: pagina a mostrar
//parametros y valores
/*
onClick="MostrarVentana(
            this,
            1,
            'Modulos/SAE/Perfiles/mod_perfiles.php',
            'Id_Rol;pagina;inicio;or_nom_per;or_nom_per_tipo;bs_nom_per;',
            '<?=$res[$i]['Id_Rol']?>;<?=$pagina?>;<?=$inicio?>;<?=$or_nom_per?>;<?=$or_nom_per_tipo?>;<?=$bs_nom_per?>;')"
*/
/***********************************************************************************/
function MostrarVentana(objeto, efecto,pagina,parametros,valores){
    
    
    OcultarMensajesAyuda();
    /***************************************************/
    /****************** Variables Globales *************/
    /***************************************************/
    var miAjax = NuevoAjax();
    var respuesta;
    
    
    /***************************************************/
    /************* Datos de SEGURIDAD      *************/
    /***************************************************/
    var cedula_global = document.getElementById('cedula_global').value;
    var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
    var Key_Usu = document.getElementById('Key_Usu').value;
    parametros += 'cedula_global;Id_Per_Usu;Key_Usu;';
    valores += cedula_global+';'+Id_Per_Usu+';'+Key_Usu+';';
    
    /***************************************************/
    /*********     Creamos la query string       *******/
    /***************************************************/
    var query_string = creaQueryString(parametros,valores);
    
//alert(query_string)
    /***************************************************/
    /*********      limpiamos la ventana         *******/
    /***************************************************/
    document.getElementById('ventana_emergente').innerHTML = "";
    
    
    
    /***************************************************/
    /*********       Llamada AJAX SINCRONA        ******/
    /***************************************************/
    miAjax.open("GET",pagina+'?'+query_string,false);
	miAjax.send();
    console.log(miAjax.responseText)
    //Declaramos la variable que va almacenar los script
    var scs=miAjax.responseText.extractScript();
    var respuesta = miAjax.responseText.trim();
    //Mandamos a ejecutar los scripts
    scs.evalScript();
    
    /***************************************************/
    /*********   Cargamos el resultado            ******/
    /***************************************************/
    var contenido = '<div class="md-content">';
    contenido += respuesta;
    contenido += '</div>';
    document.getElementById('ventana_emergente').innerHTML = contenido;
    
    /***************************************************/
    /*********    mandamos a ejecutar el efecto   ******/
    /***************************************************/
    CreaEfectoVentana(objeto, efecto);
    
}

function MostrarDetalle(pagina,parametros,valores, fila){
        //Si es 1 es mandar a traer los datos
        if(ImagenDetalle(fila)==1){
            /***************************************************/
            /****************** Variables Globales *************/
            /***************************************************/
            var miAjax = NuevoAjax();
            var respuesta;
            
            
            /***************************************************/
            /************* Datos de SEGURIDAD      *************/
            /***************************************************/
            var cedula_global = document.getElementById('cedula_global').value;
            var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
            var Key_Usu = document.getElementById('Key_Usu').value;
            parametros += 'cedula_global;Id_Per_Usu;Key_Usu;';
            valores += cedula_global+';'+Id_Per_Usu+';'+Key_Usu+';';
            
            /***************************************************/
            /*********     Creamos la query string       *******/
            /***************************************************/
            var query_string = creaQueryString(parametros,valores);
            
            /***************************************************/
            /*********       Llamada AJAX SINCRONA        ******/
            /***************************************************/
            miAjax.open("GET",pagina+'?'+query_string,false);
            miAjax.send();
            //Declaramos la variable que va almacenar los script
            var scs=miAjax.responseText.extractScript();
            var respuesta = miAjax.responseText.trim();
            //Mandamos a ejecutar los scripts
            scs.evalScript();
            
            /***************************************************/
            /*********   Cargamos el resultado            ******/
            /***************************************************/
            var divResultado = document.getElementById('X'+fila);
            var Imagen = document.getElementById('img_detalle'+fila);	
            divResultado.innerHTML = respuesta;
            //document.getElementById('encabezado_tabla').style.display = "none";
            
        }else{
            //document.getElementById('encabezado_tabla').style.display = "block";
        }
}
/***********************************************************************************/
/*****************           Funcion ImagenDetalle       ***********************/
//Esta función cambia la imagen de mostrar un detalle
/***********************************************************************************/
function ImagenDetalle(fila){
        var ruta = document.getElementById('ruta').value;
        var dominio = document.getElementById('dominio').value;
                
		//cambiar la imagen
		var Imagen = document.getElementById('img_detalle'+fila);	
		var Obj_Div = document.getElementById('X'+fila);
        
		if(Imagen.src == dominio+ruta+"img/SAE/mostrar_detalle.png"){
			Imagen.src = dominio+ruta+"img/SAE/ocultar_detalle.png";
			Obj_Div.style.display='block';
            return 1;
		}else if(Imagen.src == dominio+ruta+"img/SAE/ocultar_detalle.png"){
			Imagen.src = dominio+ruta+"img/SAE/mostrar_detalle.png";
			Obj_Div.style.display='none';
            return 0;
		}
}

/***********************************************************************************/
/*****************           Funcion CreaEfectoVentana       ***********************/
//Utilizada para mostrar el efecto en una ventana
//objeto: objeto que invoca la ventana
//efecto: numero de efecto del 1 al 20
/*
CreaEfectoVentana(objeto, efecto);
*/
/***********************************************************************************/
function CreaEfectoVentana(objeto,efecto){
    
    /******************************************/
    /* obtenga el div de fondo de la ventanas */
    /******************************************/
    var overlay = document.querySelector( '.md-overlay' );
    
    /******************************************/
    /*       haga el fondo visible            */
    /******************************************/
    overlay.style.visibility = "visible" ;
    
    /******************************************/
    /*            obtenga la ventana          */
    /******************************************/
    var modal = document.getElementById('ventana_emergente');
    
    /******************************************/
    /*   funcion para ocultar la ventana      */
    /******************************************/
    function removeModal( hasPerspective ) {
		classie.remove( modal, 'md-show' );
        classie.add( modal, 'md-modal' );
        classie.add( modal, 'md-effect-'+efecto );
    
        /******************************************/
        /*          oculte el fondo               */
        /******************************************/    
        overlay.style.visibility = "hidden";
		if( hasPerspective ) {
			classie.remove( document.documentElement, 'md-perspective' );
		}
	}
    
    /******************************************/
    /*       funcion para perpectiva          */
    /******************************************/
	function removeModalHandler() {
		removeModal( classie.has( objeto, 'md-setperspective' ) ); 
	}
    
    /******************************************/
    /*       obtenga el boton de cerrar       */
    /******************************************/
    close = document.getElementById('btn_cerrar');
    
    /******************************************/
    /*       Limpiamos la ventana             */
    /******************************************/
    document.getElementById("ventana_emergente").className = "";
    
    /******************************************/
    /*       mostramos la ventana             */
    /******************************************/
    classie.add( modal, 'md-modal' );
    classie.add( modal, 'md-effect-'+efecto );
    classie.add( modal, 'md-show' );
    
    /******************************************/
    /*activamos el click afuera de la ventana para cerarla   */
    /******************************************/            
    overlay.removeEventListener( 'click', removeModalHandler );
    overlay.addEventListener( 'click', removeModalHandler );
    
    /******************************************/
    /*       funcion para perpectiva          */
    /******************************************/
    if( classie.has( objeto, 'md-setperspective' ) ) {
        setTimeout( function() {
            classie.add( document.documentElement, 'md-perspective' );
        }, 25 );
    }
    /******************************************/
    /*       Listener para cerrado            */
    /******************************************/
   /* close.addEventListener( 'click', function( ev ) {
        ev.stopPropagation();
        removeModalHandler();
    });
    */
    
}

/***********************************************************************************/
/*****************           Funcion CerrarVentana           ***********************/
//permite cerrar una ventana abierta
//llamada: CerrarVentana()
/***********************************************************************************/
function CerrarVentana() {
    OcultarMensajesAyuda();
    document.getElementById('ventana_emergente').innerHTML = "";
    document.getElementById("ventana_emergente").className = "";
    var overlay = document.querySelector( '.md-overlay' );
    overlay.style.visibility = "hidden";
}


/***********************************************************************************/
/**********           Funcion VerificaMensajeUsuario         ***********************/
//pesta función verifica cada 10 segundos si el usuario tiene alguna notificación
//llamada: body onload = "VerificaMensajeUsuario()"
//Para usuarla:
//layout: growl         efectos:scale(sirve)|slide(sirve)|genie(sirve)|jelly (sirve)
//layout: attached      efectos:flip(sirve)|bouncyflip 
//layout: bar           efectos:slidetop(no tiene cerrar)|exploader(no tiene cerrar)
//layout: other         efectos:boxspinner|cornerexpand(NO USAR)|loadingcircle|thumbslider
//type: notice|warning|error|success
//ttl: (tiempo para cerrarse automaticamente en milisegundos)
//Demo:growl: scale|slide|genie|jellye: <p>This is just a simple notice. Everything is in order and this is a <a href="#">simple link</a>.</p>
//Demo:attached/flip: <p>Your preferences have been saved successfully. See all your settings in your <a href="#">profile overview</a>.</p>
//Demo:growl/slide: <p>Hello there! I\'m a classic notification but I have some elastic jelliness thanks to <a href="http://bouncejs.com/">bounce.js</a>. </p>
//Demo:bar/slidetop:         <span class="icon icon-megaphone"></span><p>You have some interesting news in your inbox. Go <a href="#">check it out</a> now.</p>
//Demo:bar/exploader:         <span class="icon icon-settings"></span><p>Your preferences have been saved successfully. See all your settings in your <a href="#">profile overview</a>.</p>
//Demo:other/boxspinner:    <p>I am using a beautiful spinner from <a href="http://tobiasahlin.com/spinkit/">SpinKit</a></p>
//Demo:other/cornerexpand:    <p><span class="icon icon-bulb"></span> I\'m appearing in a morphed shape thanks to <a href="http://snapsvg.io/">Snap.svg</a></p>
//Demo:other/loadingcircle:    <p>Whatever you did, it was successful!</p>
//Demo:other/thumbslider:    <div class="ns-thumb"><img src="img/user1.jpg"/></div><div class="ns-content"><p><a href="#">Zoe Moulder</a> accepted your invitation.</p></div>
/***********************************************************************************/
function VerificaMensajeUsuario() {

    /***************************************************/
    /****************** Variables Globales *************/
    /***************************************************/
    var miAjax = NuevoAjax();
    var respuesta;
    var pagina_ajax = "Modulos/SAE/Usuarios/ajax_verifica_mensaje_usuarios.php";
    
    /***************************************************/
    /************* Datos de SEGURIDAD      *************/
    /***************************************************/
    var cedula_global = document.getElementById('cedula_global').value;
    var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
    var Key_Usu = document.getElementById('Key_Usu').value;
    var parametros = 'cedula_global;Id_Per_Usu;Key_Usu;';
    var valores = cedula_global+';'+Id_Per_Usu+';'+Key_Usu+';';
    
    /***************************************************/
    /*********     Creamos la query string       *******/
    /***************************************************/
    var query_string = creaQueryString(parametros,valores);
    
    /***************************************************/
    /*********       Llamada AJAX ASINCRONA       *******/
    /***************************************************/
    miAjax.open('GET',pagina_ajax+'?'+query_string,true);

    miAjax.onreadystatechange=function() {
        if (miAjax.readyState==ESTADO_COMPLETO){
            if(miAjax.status==200){
                
                //Declaramos la variable que va almacenar los script
                var scs=miAjax.responseText.extractScript();
                var respuesta = miAjax.responseText.trim();
                var mensajes = respuesta.split("¤");
                var men = '';
                var id_notificacion = document.getElementById('id_notificacion').value;

                for(i=0;i < mensajes.length-1; i++){
                  men = mensajes[i].split("~");
                  if(men[3]=='loadingcircle'){
                    var svgshape = document.getElementById( 'notification-shape' );
                    eval("var notificacion"+id_notificacion+" = new NotificationFx({wrapper : svgshape,message :'"+men[1]+"',layout:'"+men[2]+"',effect:'"+men[3]+"',type:'"+men[4]+"',ttl:'"+men[5]+"',onClose : function(){ cierraNotificacion("+men[0]+");} });");
                  }else{
                    eval("var notificacion"+id_notificacion+" = new NotificationFx({message :'"+men[1]+"',layout:'"+men[2]+"',effect:'"+men[3]+"',type:'"+men[4]+"',ttl:'"+men[5]+"',onClose : function(){ cierraNotificacion("+men[0]+");} });");
                  }
                  
                  //alert("notificacion"+id_notificacion+".show();")
                  eval("notificacion"+id_notificacion+".show();");
                  id_notificacion++;
                }
                //alert(respuesta)
                document.getElementById('id_notificacion').value = id_notificacion;
  
                                   
                //Mandamos a ejecutar los scripts
                scs.evalScript();
               
            }
        }
    }
    miAjax.send(null);
    /***************************************************/
    /*******  FIN de Llamada AJAX SINCRONA       *******/
    /***************************************************/
    setTimeout('VerificaMensajeUsuario()',10000);
}

/***********************************************************************************/
/**********           Funcion cierraNotificacion         ***********************/
//esta función Elimina el mensaje de usuario que tenga el id pasado como parametro
//Se ejecuta en el onclose
/***********************************************************************************/
function cierraNotificacion(Id_Men){
    
    /***************************************************/
    /****************** Variables Globales *************/
    /***************************************************/
    var miAjax = NuevoAjax();
    var respuesta;
    var pagina_ajax = "Modulos/SAE/Usuarios/ajax_elimina_mensaje_usuarios.php";
    
    /***************************************************/
    /************* Datos de SEGURIDAD      *************/
    /***************************************************/
    var cedula_global = document.getElementById('cedula_global').value;
    var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
    var Key_Usu = document.getElementById('Key_Usu').value;
    var parametros = 'cedula_global;Id_Per_Usu;Key_Usu;Id_Men;';
    var valores = cedula_global+';'+Id_Per_Usu+';'+Key_Usu+';'+Id_Men+';';
    

    
    /***************************************************/
    /*********     Creamos la query string       *******/
    /***************************************************/
    var query_string = creaQueryString(parametros,valores);
    
    /***************************************************/
    /*********       Llamada AJAX ASINCRONA       *******/
    /***************************************************/
    miAjax.open('GET',pagina_ajax+'?'+query_string,true);

    miAjax.onreadystatechange=function() {
        if (miAjax.readyState==ESTADO_COMPLETO){
            if(miAjax.status==200){
                
                //Declaramos la variable que va almacenar los script
                var scs=miAjax.responseText.extractScript();
                var respuesta = miAjax.responseText.trim();
                if (respuesta=='0') {
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'error', //error/info/success/default
                        texto['ERROR']+':', //titulo
                        texto['Error_Eliminando_Mensaje_Usuario'], //texto
                        200, //velocidad
                        2500 //tiempo
                    );
                }      
                //Mandamos a ejecutar los scripts
                scs.evalScript();
               
            }
        }
    }
    miAjax.send(null);
    /***************************************************/
    /*******  FIN de Llamada AJAX SINCRONA       *******/
    /***************************************************/
}

/***********************************************************************************/
/**********           Funcion IMU (InsertaMensajeUsuario)    ***********************/
//esta función inserta un mensaje en la bandeja de un usuario
//llamada: IMU(3,'<span class="icon icon-settings"></span><p>Your preferences have been saved successfully. See all your settings in your <a href="#">profile overview</a>.</p>','growl','flip','warning',60000)
//Para usuarla:
//layout: growl         efectos:scale(sirve)|slide(sirve)|genie(sirve)|jelly (sirve)
//layout: attached      efectos:flip(sirve)|bouncyflip 
//layout: bar           efectos:slidetop(no tiene cerrar)|exploader(no tiene cerrar)
//layout: other         efectos:boxspinner|cornerexpand(NO USAR)|loadingcircle|thumbslider
//type: notice|warning|error|success
//ttl: (tiempo para cerrarse automaticamente en milisegundos)
//Demo:growl: scale|slide|genie|jellye: <p>This is just a simple notice. Everything is in order and this is a <a href="#">simple link</a>.</p>
//Demo:attached/flip|bouncyflip: <p>Your preferences have been saved successfully. See all your settings in your <a href="#">profile overview</a>.</p>
//Demo:growl/slide: <p>Hello there! I\'m a classic notification but I have some elastic jelliness thanks to <a href="http://bouncejs.com/">bounce.js</a>. </p>
//Demo:bar/slidetop:         <span class="icon icon-megaphone"></span><p>You have some interesting news in your inbox. Go <a href="#">check it out</a> now.</p>
//Demo:bar/exploader:         <span class="icon icon-settings"></span><p>Your preferences have been saved successfully. See all your settings in your <a href="#">profile overview</a>.</p>
//Demo:other/boxspinner:    <p>I am using a beautiful spinner from <a href="http://tobiasahlin.com/spinkit/">SpinKit</a></p>
//Demo:other/cornerexpand:    <p><span class="icon icon-bulb"></span> I\'m appearing in a morphed shape thanks to <a href="http://snapsvg.io/">Snap.svg</a></p>
//Demo:other/loadingcircle:    <p>Whatever you did, it was successful!</p>
//Demo:other/thumbslider:    <div class="ns-thumb"><img src="img/user1.jpg"/></div><div class="ns-content"><p><a href="#">Zoe Moulder</a> accepted your invitation.</p></div>
/***********************************************************************************/
function IMU(Id_Per_Usu_Men, Mensaje_Men, Diseno_Men,Efecto_Men,Tipo_Men,Tiempo_Men){
    
    /***************************************************/
    /****************** Variables Globales *************/
    /***************************************************/
    var miAjax = NuevoAjax();
    var respuesta;
    var pagina_ajax = "Modulos/SAE/Usuarios/ajax_agr_mensaje_usuarios.php";
    
    /***************************************************/
    /************* Datos de SEGURIDAD      *************/
    /***************************************************/
    var cedula_global = document.getElementById('cedula_global').value;
    var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
    var Key_Usu = document.getElementById('Key_Usu').value;
    var parametros = 'cedula_global;Id_Per_Usu;Key_Usu;';
    var valores = cedula_global+';'+Id_Per_Usu+';'+Key_Usu+';';
    
    /***************************************************/
    /********* Los concatenamos a las parametros *******/
    /***************************************************/
    parametros += 'Id_Per_Usu_Men;Mensaje_Men;Diseno_Men;Efecto_Men;Tipo_Men;Tiempo_Men;';
    valores += Id_Per_Usu_Men+';'+Mensaje_Men+';'+Diseno_Men+';'+Efecto_Men+';'+Tipo_Men+';'+Tiempo_Men+';';
    
    
    
    /***************************************************/
    /*********     Creamos la query string       *******/
    /***************************************************/
    var query_string = creaQueryString(parametros,valores);
    
    /***************************************************/
    /*********        Llamada AJAX SINCRONA       ******/
    /***************************************************/
    miAjax.open("GET",pagina_ajax+'?'+query_string,false);
	miAjax.send();
    //Declaramos la variable que va almacenar los script
    var scs=miAjax.responseText.extractScript();
    var respuesta = miAjax.responseText.trim();
    if (respuesta=='e1') {
        $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Agregando_Mensaje'], //texto
            200, //velocidad
            2500 //tiempo
        );
    }else if (respuesta==1) {
        return true;
    }
    //Mandamos a ejecutar los scripts
    scs.evalScript();
    /***************************************************/
    /*******  FIN de Llamada AJAX SINCRONA       *******/
    /***************************************************/
}

function Reinicia_Combo(nombre_obj){
            
    //Relacionamos el objeto
    var combo = document.getElementById(nombre_obj);

    //cambiamos su tamaño
    combo.length = 1;
                
    //Creamos la opcion default [Seleccione] = 0
    combo.options[0].value = "0";
    combo.options[0].text = "[Seleccione]";
               
    //Deshabilitamos el combo
    combo.disabled = true;
            
}
        

/**********************************************************/
/******************** Llamados ENTER **********************/
//onKeyPress="return ENTER_soloTexto(event,'agregarCM()')"
//onKeyPress="return ENTER_soloNumeros(event,'agregarCM()')"
//onKeyPress="ENTER(event,'agregarCM()')"
/**********************************************************/
function ENTER_soloTexto(Texto,funcion) {
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==8 || tecla==0) return true;
    if (tecla==13) {
        eval(funcion)
        return;
    }
    var patron =/[a-zA-ZñÑ_\s]/;
    var te = String.fromCharCode(tecla); 
    return patron.test(te); 
}

function ENTER_soloNumeros(Texto,funcion) {
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==8 || tecla==0) return true;
     if (tecla==13) {
     eval(funcion)
     return;
    }
    var patron =/[0-9]/;
    var te = String.fromCharCode(tecla); 
    return patron.test(te); 
}

function ENTER(Texto,funcion) {
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==13) {
     eval(funcion)
     return;
    }
}
/**********************************************************/
/************* * OcultarMensajesAyuda *********************/
//oculta los mensajes de ayuda para evitar erro de que quede el mensaje
//al presionar ENTER
/**********************************************************/
function OcultarMensajesAyuda(){
    var elementos = document.getElementsByName("mensajes_sae_ayuda");
    for (x=0;x<elementos.length;x++){
        elementos[x].style.display = "none";
    }
    return true;
}

