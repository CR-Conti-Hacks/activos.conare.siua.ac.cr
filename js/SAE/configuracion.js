function Sube_Logo(){
   if(document.getElementById('archivo_logo').value==''){
      $(this).notifyMe(
				'top', //Bottom/top/left/ right
				'error', //error/info/success/default
				texto['Error']+':', //titulo
				texto['ERROR_Seleccionar_Archivo'], //texto
				400, //velocidad
				2400 //tiempo
			);
   }else if (document.getElementById('archivo_logo').value != document.getElementById('archivo_logo_original').value){
      if (LimitarTipoArchivo_IMG('archivo_logo')) {
         if(Tamano_Archivo('archivo_logo')>1){
              $(this).notifyMe(
                  'top', //Bottom/top/left/ right
                  'error', //error/info/success/default
                  texto['Error']+':', //titulo
                  texto['ERROR_Tamano_1MB'], //texto
                  400, //velocidad
                  2400 //tiempo
               );
        }else{
            //obtenemos el documento
            var f = $(this);
            //Este pega todos los campos del formulario
            //var formData = new FormData(document.getElementById("con_configuracion"));
            //Creo el objeto formData
            var formData = new FormData();
            
            //obtenemos el archivo
            var archivo=$('#archivo_logo')[0].files[0];
            
            //Lo anexamos a nuestro objeto formData.append("nombre_a_enviar", "valor");
            formData.append("archivo_logo", archivo);
            
            //Obtenemos la cedula y Id de usuario para guardar en bitacora
            var cedula_global = document.getElementById('cedula_global').value;
            var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
            var Key_Usu = document.getElementById('Key_Usu').value;
            
            //Los anexamos
            formData.append("cedula_global", cedula_global);
            formData.append("Id_Per_Usu", Id_Per_Usu);
            formData.append("Key_Usu", Key_Usu);
            
            $.ajax({
                url: "Modulos/SAE/Configuracion/ajax_guarda_logo.php",
                    type: "post",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                })
            .done(function(res){

               if (res==1) {
                  //Se guardo correctamente
                  $(this).notifyMe(
						'top', //Bottom/top/left/ right
						'success', //error/info/success/default
						texto['Exito']+':', //titulo
						texto['EXITO_Logo'], //texto
						400, //velocidad
						2400 //tiempo
					);
                  //Actualizar el nombre del archivo
                  document.getElementById('archivo_logo_original').value = document.getElementById('archivo_logo').value;
               //error atualizando en la BD
               }else if(res=='e1'){
                  $(this).notifyMe(
						'top', //Bottom/top/left/ right
						'error', //error/info/success/default
						texto['Error']+':', //titulo
						texto['ERROR_Actualizar_Nombre_Archivo'], //texto
						400, //velocidad
						2400 //tiempo
					);
               }else if(res=='e2'){
                  $(this).notifyMe(
						'top', //Bottom/top/left/ right
						'error', //error/info/success/default
						texto['Error']+':', //titulo
						texto['ERROR_Subir_Archivo'], //texto
						400, //velocidad
						2400 //tiempo
					);
               }else if(res=='e3'){
                  $(this).notifyMe(
						'top', //Bottom/top/left/ right
						'error', //error/info/success/default
						texto['Error']+':', //titulo
						texto['ERROR_no_existe_nombre_archivo'], //texto
						400, //velocidad
						2400 //tiempo
					);
               }
            });
           
        }
        
      }else{
         $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Extension_Imagen'], //texto
            400, //velocidad
            2400 //tiempo
         );
      }
   }
}

/**********************************************************************/
/********** funcion Guarda_TXT_Conf () ************/
//recibe el objeto a guardar (this)
//recibe el nombre de la tabla
//recibe el nombre del campo de la BD
//pagina que atiende solicitud
//etiqueta: span a ocultar
//campo: nombre del campo TXT
//fin_de_texto: mensaje del final segundos, px etc
//Mensaje a mostrar
/**********************************************************************/
function Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,etiqueta,campo,fin_de_texto,mensaje){
    
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
    /********** Obtenemos datos del formulario *********/
    /***************************************************/
    var valor = document.getElementById(objeto).value;
    if (valor =='') {
        valor=null
        
    }
    
    /***************************************************/
    /********* Los concatenamos a las parametros *******/
    /***************************************************/
    parametros += 'valor;tabla;nombre_campo;';
    valores += valor+';'+tabla+';'+nombre_campo+';';
     
        
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
                //Actualizar el Campo y ocultar la edición
                if (valor==null) {
                    document.getElementById(etiqueta).innerHTML = "Configurar";
                }else{
                    document.getElementById(etiqueta).innerHTML = valor+fin_de_texto;    
                }
                
                ActivaEdicion(etiqueta,campo,objeto,1)
            }
        }
    }
    miAjax.send(null);
    /***************************************************/
    /*******  FIN de Llamada AJAX SINCRONA       *******/
    /***************************************************/
}


/*************************************************************************/
/************** Funcion GuardaMedida_ancho  ******************************/
/*************************************************************************/
function GuardaMedida_ancho(Texto,objeto,tabla,nombre_campo, pagina,etiqueta,campo,fin_de_texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    //Acepta 8: backspace / 0: Tabulacion
    if (tecla==8 || tecla==0) return true;
    if (tecla==13) {
      //verificamos si el campo esta vacion
      if (Valida_TXT(objeto)) {
          $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Valida_Ancho_Vacio_Logo'], //texto
            400, //velocidad
            2400 //tiempo
         );
      }else if(document.getElementById(objeto).value <= 0){
         $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Valida_Ancho_Mayor_Cero'], //texto
            400, //velocidad
            2400 //tiempo
         );
      }else{
        Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,etiqueta,campo,fin_de_texto);
        return; 
      }
        
    }
    //Patron aceptado
    var patron =/[0-9]/;
    //Obtener un caracter segun numero ASCII
    var te = String.fromCharCode(tecla); 
    //Evaluamos el caracter en el patron
    return patron.test(te); 
}


/*************************************************************************/
/************** Funcion GuardaMedida_alto ******************************/
/*************************************************************************/
function GuardaMedida_alto(Texto,objeto,tabla,nombre_campo, pagina,etiqueta,campo,fin_de_texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    //Acepta 8: backspace / 0: Tabulacion
    if (tecla==8 || tecla==0) return true;
    if (tecla==13) {
      //verificamos si el campo esta vacion
      if (Valida_TXT(objeto)) {
          $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Valida_Alto_Vacio_Logo'], //texto
            400, //velocidad
            2400 //tiempo
         );
      }else if(document.getElementById(objeto).value <= 0){
         $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Valida_Alto_Mayor_Cero'], //texto
            400, //velocidad
            2400 //tiempo
         );
      }else{
        Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,etiqueta,campo,fin_de_texto);
        return; 
      }
        
    }
    //Patron aceptado
    var patron =/[0-9]/;
    //Obtener un caracter segun numero ASCII
    var te = String.fromCharCode(tecla); 
    //Evaluamos el caracter en el patron
    return patron.test(te); 
}
/*************************************************************************/
/************** Funcion Guarda_Nombre_Empresa ******************************/
/*************************************************************************/
function Guarda_Nombre_Empresa(Texto,objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==13) {
      if (Valida_TXT(objeto)) {
         $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Valida_Nombre_Empresa_Vacio'], //texto
            400, //velocidad
            2400 //tiempo
         );
      }else{
        Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto);
        return; 
      }
    }
}

/*************************************************************************/
/************** Funcion Guarda_Nombre_Quienes ****************************/
/*************************************************************************/
function Guarda_Nombre_Quienes(Texto,objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==13) {
      if (Valida_TXT(objeto)) {
         $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Valida_Quienes_Empresa_Vacio'], //texto
            400, //velocidad
            2400 //tiempo
         );
      }else{
        Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto);
        return; 
      }
    }
}


/*************************************************************************/
/************** Funcion Guarda_Pais_Conf      ****************************/
/*************************************************************************/
function Guarda_Pais_Conf(objeto) {
    
    if (Valida_SELECT_0(objeto)) {
         $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Seleccionar_Pais'], //texto
            400, //velocidad
            2400 //tiempo
         );
    }else{
      var miAjax = NuevoAjax();
      var respuesta;
      
      //obtenemos la cedula del usuario logeado
      var cedula_global = document.getElementById('cedula_global').value;
      var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
      var Key_Usu = document.getElementById('Key_Usu').value;
      
      //obtenemos el valor
      var valor = document.getElementById(objeto).value;
      
      var parametros = 'valor;cedula_global;Id_Per_Usu;Key_Usu;tabla;nombre_campo;';
      var valores = valor+';'+cedula_global+';'+Id_Per_Usu+';'+Key_Usu+';tab_configuracion;Id_Pai_Conf;';
      
      
      //creamos la query string
      var query_string = creaQueryString(parametros,valores);
      var pagina = 'Modulos/SAE/Genericos/ajax_guarda_TXT.php';
      
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
                          texto['EXITO_Modificar_Pais'], //texto
                          200, //velocidad
                          1000 //tiempo
                      );
                  }else if(respuesta=='e1'){
                      $(this).notifyMe(
                          'top', //Bottom/top/left/ right
                          'error', //error/info/success/default
                          texto['Error']+':', //titulo
                          texto['ERROR_Modificando_Pais'] , //texto
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
    }
}

/*************************************************************************/
/************** Funcion Guarda_Direccion_Conf ****************************/
/*************************************************************************/
function Guarda_Direccion_Conf(Texto,objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==13) {
      if (Valida_TXT(objeto)) {
         $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Valida_Direccion_Empresa_Vacio'], //texto
            400, //velocidad
            2400 //tiempo
         );
      }else{
        Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto);
        return; 
      }
    }
}

/*************************************************************************/
/************** Funcion Guarda_Telefono_Conf ******************************/
/*************************************************************************/
function Guarda_Telefono_Conf(Texto,objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==13) {
      if (Valida_TXT(objeto)) {
         $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Valida_Telefono_Empresa_Vacio'], //texto
            400, //velocidad
            2400 //tiempo
         );
      }else{
        Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto);
        return; 
      }
    }
}

/*************************************************************************/
/************** Funcion Guarda_Fax_Conf ******************************/
/*************************************************************************/
function Guarda_Fax_Conf(Texto,objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==13) {
      
        Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto);
        return; 
      
    }
}


/*************************************************************************/
/************** Funcion Guarda_Correo_Conf ******************************/
/*************************************************************************/
function Guarda_Correo_Conf(Texto,objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==13) {
      if (Valida_TXT(objeto)) {
         $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Valida_Correo_Empresa_Vacio'], //texto
            400, //velocidad
            2400 //tiempo
         );
      }else if(Valida_CORREO(objeto)){
         $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Valida_Correo_Formato'], //texto
            400, //velocidad
            2400 //tiempo
         );
      }else{
        Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto);
        return; 
      }
    }
}

/*************************************************************************/
/************** Funcion Guarda_Nombre_Sistema ******************************/
/*************************************************************************/
function Guarda_Nombre_Sistema(Texto,objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==13) {
      if (Valida_TXT(objeto)) {
         $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Valida_Nombre_Sistema_Empresa_Vacio'], //texto
            400, //velocidad
            2400 //tiempo
         );
      }else{
        Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto);
        return; 
      }
    }
}

/*************************************************************************/
/************** Funcion Guarda_Nombre_Resumen******************************/
/*************************************************************************/
function Guarda_Nombre_Resumen(Texto,objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==13) {
      if (Valida_TXT(objeto)) {
         $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Valida_Nombre_Resumen_Empresa_Vacio'], //texto
            400, //velocidad
            2400 //tiempo
         );
      }else{
        Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto);
        return; 
      }
    }
}

/*************************************************************************/
/************** Funcion Guarda_Bienvenida   ******************************/
/*************************************************************************/
function Guarda_Bienvenida(Texto,objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==13) {
      if (Valida_TXT(objeto)) {
         $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Valida_Bienvenida_Empresa_Vacio'], //texto
            400, //velocidad
            2400 //tiempo
         );
      }else{
        Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto);
        return; 
      }
    }
}


/*************************************************************************/
/************** Funcion Guarda_Session_Conf ******************************/
/*************************************************************************/
function Guarda_Session_Conf(Texto,objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==13) {
      if (Valida_TXT(objeto)) {
         $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Valida_Session_Empresa_Vacio'], //texto
            400, //velocidad
            2400 //tiempo
         );
      }else{
        Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto);
        return; 
      }
    }
}

/*************************************************************************/
/************** Funcion GuardaMedida_TS  ******************************/
/*************************************************************************/
function GuardaMedida_TS(Texto,objeto,tabla,nombre_campo, pagina,etiqueta,campo,fin_de_texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    //Acepta 8: backspace / 0: Tabulacion
    if (tecla==8 || tecla==0) return true;
    if (tecla==13) {
      //verificamos si el campo esta vacion
      if (Valida_TXT(objeto)) {
          $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Valida_Tiempo_Session_Empresa_Vacio'], //texto
            400, //velocidad
            2400 //tiempo
         );
      }else if(document.getElementById(objeto).value <= 0){
         $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Valida_Tiempo_Session_Empresa_Mayor_Cero'], //texto
            400, //velocidad
            2400 //tiempo
         );
      }else{
        Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,etiqueta,campo,fin_de_texto);
        return; 
      }
        
    }
    //Patron aceptado
    var patron =/[0-9]/;
    //Obtener un caracter segun numero ASCII
    var te = String.fromCharCode(tecla); 
    //Evaluamos el caracter en el patron
    return patron.test(te); 
}

/*************************************************************************/
/************** Funcion Guarda_Dominio_Conf ******************************/
/*************************************************************************/
function Guarda_Dominio_Conf(Texto,objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==13) {
      if (Valida_TXT(objeto)) {
         $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Valida_Dominio_Empresa_Vacio'], //texto
            400, //velocidad
            2400 //tiempo
         );
      }else{
        Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto);
        return; 
      }
    }
}

/*************************************************************************/
/************** Funcion Guarda_Carpeta_Conf ******************************/
/*************************************************************************/
function Guarda_Carpeta_Conf(Texto,objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==13) {
      if (Valida_TXT(objeto)) {
         $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Valida_Carpeta_Empresa_Vacio'], //texto
            400, //velocidad
            2400 //tiempo
         );
      }else{
        Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto);
        habilitaBtnVerificaCarpeta('0')
        document.getElementById('ruta').value = document.getElementById(objeto).value;
        return; 
      }
    }
}

/*************************************************************************/
/********* Funcion habilitaBtnVerificaCarpeta ****************************/
/*************************************************************************/
function habilitaBtnVerificaCarpeta(valor){
      
   if (valor ==1) {
      $(this).notifyMe(
		'top', //Bottom/top/left/ right
		'info', //error/info/success/default
		texto['Info']+':', //titulo
		texto['INFO_Recuerde_Verifica_Carpeta'], //texto
		200, //velocidad
		3800 //tiempo
					);
      document.getElementById("btn_verifica_carpeta").disabled = false;
   }else if (valor==0) {
      document.getElementById("btn_verifica_carpeta").disabled = true;
   }
}

/*************************************************************************/
/************** Funcion Guarda_Llave_Conf   ******************************/
/*************************************************************************/
function Guarda_Llave_Conf(Texto,objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==13) {
      if (Valida_TXT(objeto)) {
         $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Valida_Llave_Empresa_Vacio'], //texto
            400, //velocidad
            2400 //tiempo
         );
      }else{
        Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto);
        return; 
      }
    }
}

/*************************************************************************/
/************** Funcion Guarda_Nivel_Ubicacion_Conf      ****************************/
/*************************************************************************/
function Guarda_Nivel_Ubicacion_Conf(objeto) {
    

      var miAjax = NuevoAjax();
      var respuesta;
      
      //obtenemos la cedula del usuario logeado
      var cedula_global = document.getElementById('cedula_global').value;
      var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
      var Key_Usu = document.getElementById('Key_Usu').value;
      
      //obtenemos el valor
      var valor = document.getElementById(objeto).value;
      
      var parametros = 'valor;cedula_global;Id_Per_Usu;Key_Usu;tabla;nombre_campo;';
      var valores = valor+';'+cedula_global+';'+Id_Per_Usu+';'+Key_Usu+';tab_configuracion;Nivel_Ubicacion_Conf;';
      
      
      //creamos la query string
      var query_string = creaQueryString(parametros,valores);
      var pagina = 'Modulos/SAE/Genericos/ajax_guarda_TXT.php';
      
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
                          texto['EXITO_Mod_Nivel_Ubicacion_Empresa'], //texto
                          200, //velocidad
                          2500 //tiempo
                      );
                  }else if(respuesta=='e1'){
                      $(this).notifyMe(
                          'top', //Bottom/top/left/ right
                          'error', //error/info/success/default
                          texto['Error']+':', //titulo
                          texto['ERROR_Mod_Nivel_Ubicacion_Empresa'], //texto
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
    
}

/*************************************************************************/
/******* Funcion GuardaCantidad_Registros_Conf ***************************/
/*************************************************************************/
function GuardaCantidad_Registros_Conf(Texto,objeto,tabla,nombre_campo, pagina,etiqueta,campo,fin_de_texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    //Acepta 8: backspace / 0: Tabulacion
    if (tecla==8 || tecla==0) return true;
    if (tecla==13) {
      //verificamos si el campo esta vacion
      if (Valida_TXT(objeto)) {
          $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Valida_Cantidad_Registros_Empresa_Vacio'], //texto
            400, //velocidad
            2400 //tiempo
         );
      }else if(document.getElementById(objeto).value <= 0){
         $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_valida_CR_mayor_cero'], //texto
            400, //velocidad
            2400 //tiempo
         );
      }else{
        Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,etiqueta,campo,fin_de_texto);
        return; 
      }
        
    }
    //Patron aceptado
    var patron =/[0-9]/;
    //Obtener un caracter segun numero ASCII
    var te = String.fromCharCode(tecla); 
    //Evaluamos el caracter en el patron
    return patron.test(te); 
}

/*************************************************************************/
/************** Funcion Guarda_Perfil_Default_Conf      ****************************/
/*************************************************************************/
function Guarda_Perfil_Default_Conf(objeto,tipo) {
    
   if (Valida_SELECT_0(objeto)) {
      var error = '';
      var nombre_campo = '';
      if (tipo=='Emp') {
        error = texto['ERROR_Valida_Plantilla_Defecto_Empresa'];
      }else if(tipo=='Estu'){
         error = texto['ERROR_Valida_Plantilla_Defecto_Estudiante'];
      }
         $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            error, //texto
            400, //velocidad
            2400 //tiempo
         );
   }else{
      if (tipo=='Emp') {
        nombre_campo = 'Id_Rol_Emp_Conf';
      }else if(tipo=='Estu'){
         nombre_campo = 'Id_Rol_Estu_Conf';
      }
      var miAjax = NuevoAjax();
      var respuesta;
      
      //obtenemos la cedula del usuario logeado
      var cedula_global = document.getElementById('cedula_global').value;
      var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
      var Key_Usu = document.getElementById('Key_Usu').value;
      
      //obtenemos el valor
      var valor = document.getElementById(objeto).value;
      
      var parametros = 'valor;cedula_global;Id_Per_Usu;Key_Usu;tabla;nombre_campo;';
      var valores = valor+';'+cedula_global+';'+Id_Per_Usu+';'+Key_Usu+';tab_configuracion;'+nombre_campo+';';
      
      
      //creamos la query string
      var query_string = creaQueryString(parametros,valores);
      var pagina = 'Modulos/SAE/Genericos/ajax_guarda_TXT.php';
      
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
                          texto['EXITO_Mod_Perfil_Defecto_Empresa'], //texto
                          200, //velocidad
                          2500 //tiempo
                      );
                  }else if(respuesta=='e1'){
                      $(this).notifyMe(
                          'top', //Bottom/top/left/ right
                          'error', //error/info/success/default
                          texto['Error']+':', //titulo
                          texto['ERROR_Mod_Perfil_Defecto_Empresa'], //texto
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
   } 
}
/*************************************************************************/
/************** Funcion Guarda_PI_Conf      ****************************/
/*************************************************************************/
function Guarda_PI_Conf(objeto,tipo) {
    
      if (tipo=='Emp') {
        nombre_campo = 'Id_PI_Emp_Conf';
      }else if(tipo=='Estu'){
         nombre_campo = 'Id_PI_Estu_Conf';
      }
      var miAjax = NuevoAjax();
      var respuesta;
      
      //obtenemos la cedula del usuario logeado
      var cedula_global = document.getElementById('cedula_global').value;
      var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
      var Key_Usu = document.getElementById('Key_Usu').value;
      
      //obtenemos el valor
      var valor = document.getElementById(objeto).value;
      
      var parametros = 'valor;cedula_global;Id_Per_Usu;Key_Usu;tabla;nombre_campo;';
      var valores = valor+';'+cedula_global+';'+Id_Per_Usu+';'+Key_Usu+';tab_configuracion;'+nombre_campo+';';
      
      
      //creamos la query string
      var query_string = creaQueryString(parametros,valores);
      var pagina = 'Modulos/SAE/Genericos/ajax_guarda_TXT.php';
      
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
                          texto['EXITO_Mod_Plantilla_Inscripcion_Empresa'], //texto
                          200, //velocidad
                          2500 //tiempo
                      );
                  }else if(respuesta=='e1'){
                      $(this).notifyMe(
                          'top', //Bottom/top/left/ right
                          'error', //error/info/success/default
                          texto['Error']+':', //titulo
                          texto['ERROR_Mod_Plantilla_Inscripcion_Empresa'], //texto
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
   
}
/*************************************************************************/
/****** Funcion Cambia_imagen_PlanCor_Inscripcion   **********************/
/*************************************************************************/
function Cambia_imagen_PlanCor_Inscripcion(objeto,destino) {
   var id_objeto = document.getElementById(objeto).value;
   var dominio = document.getElementById('')
   var miAjax = NuevoAjax();
   var respuesta;
      
   //obtenemos la cedula del usuario logeado
   var cedula_global = document.getElementById('cedula_global').value;
   var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
   var Key_Usu = document.getElementById('Key_Usu').value;
      
   //obtenemos el valor
   var valor = document.getElementById(objeto).value;
      
   var parametros = 'valor;cedula_global;Id_Per_Usu;Key_Usu;id_objeto;';
   var valores = valor+';'+cedula_global+';'+Id_Per_Usu+';'+Key_Usu+';'+id_objeto+';';
      
      
   //creamos la query string
   var query_string = creaQueryString(parametros,valores);
   var pagina = 'Modulos/SAE/Configuracion/ajax_cambia_imagen_planCor_Inscripcion.php';
      
   miAjax.open('GET',pagina+'?'+query_string,true);
      
      
   miAjax.onreadystatechange=function() {
      if (miAjax.readyState==ESTADO_COMPLETO){
         if(miAjax.status==200){
                  
            //Declaramos la variable que va almacenar los script
            var scs=miAjax.responseText.extractScript();
            var respuesta = miAjax.responseText.trim();
            document.getElementById(destino).src = respuesta;    
            //Mandamos a ejecutar los scripts
            scs.evalScript();

         }
      }
   }
   miAjax.send(null);
}

/*************************************************************************/
/************** Funcion Guarda_PlanCor_Conf      ****************************/
/*************************************************************************/
function Guarda_PlanCor_Conf(objeto) {
    

      nombre_campo = 'Id_PlanCor_Inscripcion_Conf';
      var miAjax = NuevoAjax();
      var respuesta;
      
      //obtenemos la cedula del usuario logeado
      var cedula_global = document.getElementById('cedula_global').value;
      var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
      var Key_Usu = document.getElementById('Key_Usu').value;
      
      //obtenemos el valor
      var valor = document.getElementById(objeto).value;
      
      var parametros = 'valor;cedula_global;Id_Per_Usu;Key_Usu;tabla;nombre_campo;';
      var valores = valor+';'+cedula_global+';'+Id_Per_Usu+';'+Key_Usu+';tab_configuracion;'+nombre_campo+';';
      
      
      //creamos la query string
      var query_string = creaQueryString(parametros,valores);
      var pagina = 'Modulos/SAE/Genericos/ajax_guarda_TXT.php';
      
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
                          texto['EXITO_Mod_Plantilla_Inscripcion_Correo'], //texto
                          200, //velocidad
                          2500 //tiempo
                      );
                  }else if(respuesta=='e1'){
                      $(this).notifyMe(
                          'top', //Bottom/top/left/ right
                          'error', //error/info/success/default
                          texto['Error']+':', //titulo
                          texto['ERROR_Mod_Plantilla_Inscripcion_Correo'], //texto
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
   
}
/*************************************************************************/
/******* Funcion Guarda_Titulo_Inscripcion_Emp  ***************************/
/*************************************************************************/
function Guarda_Titulo_Inscripcion_Emp(Texto,objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==13) {
      if (Valida_TXT(objeto)) {
         $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Valida_TI_Emp_Vacio'], //texto
            400, //velocidad
            2400 //tiempo
         );
      }else{
        Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto);
        return; 
      }
    }
}
/*************************************************************************/
/******* Funcion Guarda_Titulo_Inscripcion_Estu  ***************************/
/*************************************************************************/
function Guarda_Titulo_Inscripcion_Estu(Texto,objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==13) {
      if (Valida_TXT(objeto)) {
         $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_Valida_TI_Estu_Vacio'], //texto
            400, //velocidad
            2400 //tiempo
         );
      }else{
        Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto);
        return; 
      }
    }
}
/*************************************************************************/
/************** Funcion Guarda_IP_LDAP   ******************************/
/*************************************************************************/
function Guarda_IP_LDAP(Texto,objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==13) {
       Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto);
    }
}

/*************************************************************************/
/********** Funcion Guarda_Direccion_Facebook   **************************/
/*************************************************************************/
function Guarda_Direccion_Facebook(Texto,objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==13) {
       Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto);
    }
}
/*************************************************************************/
/********** Funcion Guarda_Usuario_Facebook     **************************/
/*************************************************************************/
function Guarda_Usuario_Facebook(Texto,objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==13) {
       Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto);
    }
}
/*************************************************************************/
/********** Funcion Guarda_Password_Facebook    **************************/
/*************************************************************************/
function Guarda_Password_Facebook(Texto,objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==13) {
       Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto);
    }
}



/*************************************************************************/
/********** Funcion Guarda_Direccion_Twitter    **************************/
/*************************************************************************/
function Guarda_Direccion_Twitter(Texto,objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==13) {
       Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto);
    }
}
/*************************************************************************/
/********** Funcion Guarda_Usuario_Twitter      **************************/
/*************************************************************************/
function Guarda_Usuario_Twitter(Texto,objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==13) {
       Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto);
    }
}
/*************************************************************************/
/********** Funcion Guarda_Password_Twitter     **************************/
/*************************************************************************/
function Guarda_Password_Twitter(Texto,objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==13) {
       Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto);
    }
}





/*************************************************************************/
/********** Funcion Guarda_Direccion_Google_Plus *************************/
/*************************************************************************/
function Guarda_Direccion_Google_Plus(Texto,objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==13) {
       Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto);
    }
}
/*************************************************************************/
/********** Funcion Guarda_Usuario_Google_Plus  **************************/
/*************************************************************************/
function Guarda_Usuario_Google_Plus(Texto,objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==13) {
       Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto);
    }
}
/*************************************************************************/
/********** Funcion Guarda_Password_Google_Plus **************************/
/*************************************************************************/
function Guarda_Password_Google_Plus(Texto,objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==13) {
       Guarda_TXT_Conf(objeto,tabla,nombre_campo, pagina,obj_viejo,obj_nuevo,fin_de_texto);
    }
}





