

/**********************************************************/
/****************** validaGA    **********************/
//Se encarga de validar los datos necesarios de un módulo
//Retorna:
//false = hay error
//true = todo esta correcto
/**********************************************************/
function validaZon(){
          if (Valida_TXT('txt_nombre_Zon')&&Valida_TXT('txt_diminutivo_Zon')){
          $(this).notifyMe(
                 'top', //Bottom/top/left/ right
                 'error', //error/info/success/default
                 texto['Error']+':', //titulo
                 texto['ERROR_Formulario_Zon'], //texto
                 400, //velocidad
                 2400 //tiempo
              );
             return false;
          }
          else{
               if (Valida_TXT('txt_nombre_Zon')) {
                  $(this).notifyMe(
                      'top', //Bottom/top/left/ right
                      'error', //error/info/success/default
                      texto['Error']+':', //titulo
                      texto['ERROR_Nombre_Zon'], //texto
                      400, //velocidad
                      2400 //tiempo
                   );
                  return false;
               }
               else{
                    if (Valida_TXT('txt_diminutivo_Zon')) {
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'error', //error/info/success/default
                        texto['Error']+':', //titulo
                        texto['ERROR_Diminutivo_Zon'], //texto
                        400, //velocidad
                        2400 //tiempo
                     );
                    return false;
                    }
                    else{
                         var correo=document.getElementById('txt_correo_Zon').value;
                         if (correo!="") {
                                   if (Valida_CORREO('txt_correo_Zon')) {
                                        $(this).notifyMe(
                                        'top', //Bottom/top/left/ right
                                        'error', //error/info/success/default
                                        texto['Error']+':', //titulo
                                        texto['ERROR_Formato_Correo'], //texto
                                        400, //velocidad
                                        2400 //tiempo
                                        );
                                        return false;
                                   }

                         }
                         else{
                              var telefono=document.getElementById('txt_telefono_Zon').value;
                              var fax=document.getElementById('txt_fax_Zon').value;
                              if (telefono!="") {
                                   if (telefono.length !=9) {
                                        $(this).notifyMe(
                                        'top', //Bottom/top/left/ right
                                        'error', //error/info/success/default
                                        texto['Error']+':', //titulo
                                        texto['ERROR_Cantidad_Numeros'], //texto
                                        400, //velocidad
                                        2400 //tiempo
                                        );
                                        return false;
                                   }
                              }
                              if (fax!="") {
                                   if (fax.length !=9) {
                                         $(this).notifyMe(
                                             'top', //Bottom/top/left/ right
                                             'error', //error/info/success/default
                                             texto['Error']+':', //titulo
                                             texto['ERROR_Cantidad_Numeros'], //texto
                                             400, //velocidad
                                             2400 //tiempo
                                             );
                                             return false;
                                   }
                              }
                         }
                         
                         
                    }
               }
          }
          
          return true;
}
/**********************************************************/
/****************** agregarCM    **********************/
//Se encarga de agregar un grado academico
/**********************************************************/
function agregarZon(){

    if (validaZon()) {
     /***************************************************/
          /****************** Variables Globales *************/
          /***************************************************/
          var miAjax = NuevoAjax();
          var respuesta;
          var pagina = 'Modulos/SAE/Catalogos/centros_trabajo/universidades/zonas/ajax_agr_zona.php';
          
          /***************************************************/
          /************* Datos de SEGURIDAD      *************/
          /***************************************************/
          var cedula_global = document.getElementById('cedula_global').value;
          var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
          var Key_Usu = document.getElementById('Key_Usu').value;
          var parametros = 'cedula_global;Id_Per_Usu;Key_Usu;';
          var valores = cedula_global+';'+Id_Per_Usu+';'+Key_Usu+';';
          
          /***************************************************/
          /*** Datos de busqueda y ordenamiento   ************/
          /***************************************************/
          var Id_CT = document.getElementById('Id_CT').value;
          var Id_Uni = document.getElementById('Id_Uni').value;
          
          var bs_nom_ct = document.getElementById('bs_nom_ct').value;
          var or_nom_ct = document.getElementById('or_nom_ct').value;
          var or_nom_ct_tipo = document.getElementById('or_nom_ct_tipo').value;
          
          var bs_dim_ct = document.getElementById('bs_dim_ct').value;
          var or_dim_ct = document.getElementById('or_dim_ct').value;
          var or_dim_ct_tipo = document.getElementById('or_dim_ct_tipo').value;
          
          var bs_nom_uni = document.getElementById('bs_nom_uni').value;
          var or_nom_uni = document.getElementById('or_nom_uni').value;
          var or_nom_uni_tipo = document.getElementById('or_nom_uni_tipo').value;
          
          var bs_dim_uni = document.getElementById('bs_dim_uni').value;
          var or_dim_uni = document.getElementById('or_dim_uni').value;
          var or_dim_uni_tipo = document.getElementById('or_dim_uni_tipo').value;
          
          var bs_nom_zon = document.getElementById('bs_nom_zon').value;
          var or_nom_zon = document.getElementById('or_nom_zon').value;
          var or_nom_zon_tipo = document.getElementById('or_nom_zon_tipo').value;
          
          var bs_dim_zon = document.getElementById('bs_dim_zon').value;
          var or_dim_zon = document.getElementById('or_dim_zon').value;
          var or_dim_zon_tipo = document.getElementById('or_dim_zon_tipo').value;
          
     
          /***************************************************/
          /********** Obtenemos datos del formulario *********/
          /***************************************************/
          var file_logo=document.getElementById('file_logo_Zon').value;
          var txt_nombre = document.getElementById('txt_nombre_Zon').value;
          var txt_diminutivo = document.getElementById('txt_diminutivo_Zon').value;
          var txt_telefono = document.getElementById('txt_telefono_Zon').value;
          var txt_fax = document.getElementById('txt_fax_Zon').value;
          var txt_direccion = document.getElementById('txt_direccion_Zon').value;
          var txt_correo = document.getElementById('txt_correo_Zon').value;
          var txt_latitud = document.getElementById('txt_latitud_Zon').value;
          var txt_longitud = document.getElementById('txt_longitud_Zon').value;
          
          /***************************************************/
          /********* Los concatenamos a los parametros *******/
          /***************************************************/
          
          parametros += 'Id_Uni;';
          valores += Id_Uni+';';
          parametros += 'Id_CT;';
          valores += Id_CT+';';
          parametros += 'file_logo;';
          valores += file_logo+';';
          parametros += 'txt_nombre;';
          valores += txt_nombre+';';
          parametros += 'txt_diminutivo;';
          valores += txt_diminutivo+';';
          parametros += 'txt_telefono;';
          valores += txt_telefono+';';
          parametros += 'txt_fax;';
          valores += txt_fax+';';
          parametros += 'txt_direccion;';
          valores += txt_direccion+';';
          parametros += 'txt_correo;';
          valores += txt_correo+';';
          parametros += 'txt_latitud;';
          valores += txt_latitud+';';
          parametros += 'txt_longitud;';
          valores += txt_longitud+';';
          
          /***************************************************/
          /*********     Creamos la query string       *******/
          /***************************************************/
          var query_string = creaQueryString(parametros,valores);
          
          /***************************************************/
          /*********       Llamada AJAX ASINCRONA       *******/
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
                              texto['EXITO_Agregar_Zon'], //texto
                              200, //velocidad
                              2500 //tiempo
                          );
                      }else if(respuesta=='e1'){
                          $(this).notifyMe(
                              'top', //Bottom/top/left/ right
                              'error', //error/info/success/default
                              texto['Error']+':', //titulo
                              texto['ERROR_Agregar_Zon'], //texto
                              200, //velocidad
                              2500 //tiempo
                          );
                      }             
                      
                      //Mandamos a ejecutar los scripts
                      scs.evalScript();
                     
                      CargaPaginaMenu('Modulos/SAE/Catalogos/centros_trabajo/universidades/zonas/con_zonas.php','Id_Uni;Id_CT;bs_nom_ct;or_nom_ct;or_nom_ct_tipo;bs_dim_ct;or_dim_ct;or_dim_ct_tipo;bs_nom_uni;or_nom_uni;or_nom_uni_tipo;bs_dim_uni;or_dim_uni;or_dim_uni_tipo;bs_nom_zon;or_nom_zon;or_nom_zon_tipo;bs_dim_zon;or_dim_zon;or_dim_zon_tipo;mostrar_efecto;',Id_Uni+';'+Id_CT+';'+bs_nom_ct+';'+or_nom_ct+';'+or_nom_ct_tipo+';'+bs_dim_ct+';'+or_dim_ct+';'+or_dim_ct_tipo+';'+bs_nom_uni+';'+or_nom_uni+';'+or_nom_uni_tipo+';'+bs_dim_uni+';'+or_dim_uni+';'+or_dim_uni_tipo+';'+
                                     bs_nom_zon+';'+or_nom_zon+';'+or_nom_zon_tipo+';'+bs_dim_zon+';'+or_dim_zon+';'+or_dim_zon_tipo+';1;')
                      
                  }
              }
          }
          miAjax.send(null);
          /***************************************************/
          /*******  FIN de Llamada AJAX SINCRONA       *******/
          /***************************************************/
    }

}



/**********************************************************/
/****************** modificarPerfil  **********************/
//Se encarga de modificar un perfil
/**********************************************************/
function Zon_ENTER_soloTexto(Texto) {
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    if (tecla==8 || tecla==0) return true;
    if (tecla==13) {
     agregarGA();

     return;
    }
    var patron =/[a-zA-ZñÑ_\s]/;
    var te = String.fromCharCode(tecla); 
    return patron.test(te); 
}


function modificarZon(){
         //Si todo esta bien
         if (validaZon()) {
       
          /***************************************************/
          /****************** Variables Globales *************/
          /***************************************************/
          var miAjax = NuevoAjax();
          var respuesta;
          var pagina = 'Modulos/SAE/Catalogos/centros_trabajo/universidades/zonas/ajax_mod_zona.php';
          
          /***************************************************/
          /************* Datos de SEGURIDAD      *************/
          /***************************************************/
          var cedula_global = document.getElementById('cedula_global').value;
          var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
          var Key_Usu = document.getElementById('Key_Usu').value;
          var parametros = 'cedula_global;Id_Per_Usu;Key_Usu;';
          var valores = cedula_global+';'+Id_Per_Usu+';'+Key_Usu+';';
        
        
          /***************************************************/
          /*** Datos de bursqueda y ordenamiento  ************/
          /***************************************************/
          
          var Id_CT = document.getElementById('Id_CT').value;
          var Id_Uni = document.getElementById('Id_Uni').value;
          
          var bs_nom_ct = document.getElementById('bs_nom_ct').value;
          var bs_dim_ct = document.getElementById('bs_dim_ct').value;
          var bs_nom_uni = document.getElementById('bs_nom_uni').value;
          var bs_dim_uni = document.getElementById('bs_dim_uni').value;
          var bs_nom_zon = document.getElementById('bs_nom_zon').value;
          var bs_dim_zon = document.getElementById('bs_dim_zon').value;
          
          var or_nom_ct = document.getElementById('or_nom_ct').value;
          var or_dim_ct = document.getElementById('or_dim_ct').value;
          var or_nom_uni = document.getElementById('or_nom_uni').value;
          var or_dim_uni = document.getElementById('or_dim_uni').value;
          var or_nom_zon = document.getElementById('or_nom_zon').value;
          var or_dim_zon = document.getElementById('or_dim_zon').value;
          
          var or_nom_ct_tipo = document.getElementById('or_nom_ct_tipo').value;
          var or_dim_ct_tipo = document.getElementById('or_dim_ct_tipo').value;
          var or_nom_uni_tipo = document.getElementById('or_nom_uni_tipo').value;
          var or_dim_uni_tipo = document.getElementById('or_dim_uni_tipo').value;
          var or_nom_zon_tipo = document.getElementById('or_nom_zon_tipo').value;
          var or_dim_zon_tipo = document.getElementById('or_dim_zon_tipo').value;
           
        
          /***************************************************/
          /********** Obtenemos datos del formulario *********/
          /***************************************************/
          var Id_Zon = document.getElementById('Id_Zon').value;
          var file_logo=document.getElementById('file_logo_Zon').value;
          var txt_nombre = document.getElementById('txt_nombre_Zon').value;
          var txt_diminutivo = document.getElementById('txt_diminutivo_Zon').value;
          var txt_telefono = document.getElementById('txt_telefono_Zon').value;
          var txt_fax = document.getElementById('txt_fax_Zon').value;
          var txt_direccion = document.getElementById('txt_direccion_Zon').value;
          var txt_correo = document.getElementById('txt_correo_Zon').value;
        
        /***************************************************/
          /********* Los concatenamos a los parametros *******/
          /***************************************************/
          parametros += 'Id_Zon;';
          valores += Id_Zon+';';
          parametros += 'Id_Uni;';
          valores += Id_Uni+';';
          parametros += 'Id_CT;';
          valores += Id_CT+';';
          parametros += 'file_logo;';
          valores += file_logo+';';
          parametros += 'txt_nombre;';
          valores += txt_nombre+';';
          parametros += 'txt_diminutivo;';
          valores += txt_diminutivo+';';
          parametros += 'txt_telefono;';
          valores += txt_telefono+';';
          parametros += 'txt_fax;';
          valores += txt_fax+';';
          parametros += 'txt_direccion;';
          valores += txt_direccion+';';
          parametros += 'txt_correo;';
          valores += txt_correo+';';

        /***************************************************/
        /*********     Creamos la query string       *******/
        /***************************************************/
        var query_string = creaQueryString(parametros,valores);
        
        
        /***************************************************/
        /*********       Llamada AJAX ASINCRONA       *******/
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
                            texto['EXITO_Modificar_Zon'], //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }else if(respuesta=='e1'){
                        $(this).notifyMe(
                            'top', //Bottom/top/left/ right
                            'error', //error/info/success/default
                            texto['Error']+':', //titulo
                            texto['ERROR_Modificar_Zon'], //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }             
                    
                    //Mandamos a ejecutar los scripts
                    scs.evalScript();
                     CargaPaginaMenu('Modulos/SAE/Catalogos/centros_trabajo/universidades/zonas/con_zonas.php','Id_Uni;Id_CT;bs_nom_ct;or_nom_ct;or_nom_ct_tipo;bs_dim_ct;or_dim_ct;or_dim_ct_tipo;bs_nom_uni;or_nom_uni;or_nom_uni_tipo;bs_dim_uni;or_dim_uni;or_dim_uni_tipo;bs_nom_zon;or_nom_zon;or_nom_zon_tipo;bs_dim_zon;or_dim_zon;or_dim_zon_tipo;mostrar_efecto;',Id_Uni+';'+Id_CT+';'+bs_nom_ct+';'+or_nom_ct+';'+or_nom_ct_tipo+';'+bs_dim_ct+';'+or_dim_ct+';'+or_dim_ct_tipo+';'+bs_nom_uni+';'+or_nom_uni+';'+or_nom_uni_tipo+';'+bs_dim_uni+';'+or_dim_uni+';'+or_dim_uni_tipo+';'+
                                     bs_nom_zon+';'+or_nom_zon+';'+or_nom_zon_tipo+';'+bs_dim_zon+';'+or_dim_zon+';'+or_dim_zon_tipo+';1;')
                    CerrarVentana()
                }
            }
        }
        miAjax.send(null);
        /***************************************************/
        /*******  FIN de Llamada AJAX SINCRONA       *******/
        /***************************************************/
    }
}


/**********************************************************/
/****************** eliminarPerfil  **********************/
//Se encarga de eliminar un perfil
/**********************************************************/
function eliminarZon(){
             
        /***************************************************/
        /****************** Variables Globales *************/
        /***************************************************/
        var miAjax = NuevoAjax();
        var respuesta;
        var pagina = 'Modulos/SAE/Catalogos/centros_trabajo/universidades/zonas/ajax_eli_zona.php';
        
        /***************************************************/
        /************* Datos de SEGURIDAD      *************/
        /***************************************************/
        var cedula_global = document.getElementById('cedula_global').value;
        var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
        var Key_Usu = document.getElementById('Key_Usu').value;
        var parametros = 'cedula_global;Id_Per_Usu;Key_Usu;';
        var valores = cedula_global+';'+Id_Per_Usu+';'+Key_Usu+';';
        
        
        /***************************************************/
        /***  Datos de busqueda y ordenamiento  ************/
        /***************************************************/
          var bs_nom_ct = document.getElementById('bs_nom_ct').value;
          var bs_dim_ct = document.getElementById('bs_dim_ct').value;
          var bs_nom_uni = document.getElementById('bs_nom_uni').value;
          var bs_dim_uni = document.getElementById('bs_dim_uni').value;
          var bs_nom_zon = document.getElementById('bs_nom_zon').value;
          var bs_dim_zon = document.getElementById('bs_dim_zon').value;
          
          var or_nom_ct = document.getElementById('or_nom_ct').value;
          var or_dim_ct = document.getElementById('or_dim_ct').value;
          var or_nom_uni = document.getElementById('or_nom_uni').value;
          var or_dim_uni = document.getElementById('or_dim_uni').value;
          var or_nom_zon = document.getElementById('or_nom_zon').value;
          var or_dim_zon = document.getElementById('or_dim_zon').value;
          
          var or_nom_ct_tipo = document.getElementById('or_nom_ct_tipo').value;
          var or_dim_ct_tipo = document.getElementById('or_dim_ct_tipo').value;
          var or_nom_uni_tipo = document.getElementById('or_nom_uni_tipo').value;
          var or_dim_uni_tipo = document.getElementById('or_dim_uni_tipo').value;
          var or_nom_zon_tipo = document.getElementById('or_nom_zon_tipo').value;
          var or_dim_zon_tipo = document.getElementById('or_dim_zon_tipo').value;
        

        
        /***************************************************/
        /********** Obtenemos datos del formulario *********/
        /***************************************************/
        var Id_Zon = document.getElementById('Id_Zon').value;
        var Id_CT = document.getElementById('Id_CT').value;
        var Id_Uni = document.getElementById('Id_Uni').value;
        
       
        /***************************************************/
        /********* Los concatenamos a las parametros *******/
        /***************************************************/
        parametros += 'Id_Zon;';
        valores += Id_Zon+';';
        
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
                            texto['EXITO_Eliminar_Zon'], //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }else if(respuesta=='e1'){
                        $(this).notifyMe(
                            'top', //Bottom/top/left/ right
                            'error', //error/info/success/default
                            texto['Error']+':', //titulo
                            texto['ERROR_Eliminar_Zon'], //texto
                            200, //velocidad
                            1000 //tiempo
                        );
                    }             
                    
                    //Mandamos a ejecutar los scripts
                    scs.evalScript();
                    CargaPaginaMenu('Modulos/SAE/Catalogos/centros_trabajo/universidades/zonas/con_zonas.php','Id_Uni;Id_CT;bs_nom_ct;or_nom_ct;or_nom_ct_tipo;bs_dim_ct;or_dim_ct;or_dim_ct_tipo;bs_nom_uni;or_nom_uni;or_nom_uni_tipo;bs_dim_uni;or_dim_uni;or_dim_uni_tipo;bs_nom_zon;or_nom_zon;or_nom_zon_tipo;bs_dim_zon;or_dim_zon;or_dim_zon_tipo;',Id_Uni+';'+Id_CT+';'+bs_nom_ct+';'+or_nom_ct+';'+or_nom_ct_tipo+';'+bs_dim_ct+';'+or_dim_ct+';'+or_dim_ct+';'+bs_nom_uni+';'+or_nom_uni+';'+or_nom_uni_tipo+';'+bs_dim_uni+';'+or_dim_uni+';'+or_dim_uni_tipo+';'+bs_nom_zon+';'+or_nom_zon+';'+or_nom_zon_tipo+';'+bs_dim_zon+';'+or_dim_zon+';'+or_dim_zon_tipo+';')
                    CerrarVentana()
                }
            }
        }
        miAjax.send(null);
        /***************************************************/
        /*******  FIN de Llamada AJAX SINCRONA       *******/
        /***************************************************/

}

function Sube_Logo_Zon(){

     if (document.getElementById('file_logo_Zon').value != document.getElementById('archivo_logo_original').value){
          if (LimitarTipoArchivo_IMG('file_logo_Zon')) {
               if(Tamano_Archivo('file_logo_Zon')>1){
                    $(this).notifyMe(
                    'top', //Bottom/top/left/ right
                    'error', //error/info/success/default
                    texto['Error']+':', //titulo
                    texto['ERROR_tamano_1MB'], //texto
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
                    var archivo=$('#file_logo_Zon')[0].files[0];
                    //Lo anexamos a nuestro objeto formData.append("nombre_a_enviar", "valor");
                    formData.append("file_logo_Zon", archivo);
                         
                    //Obtenemos la cedula y Id de usuario para guardar en bitacora
                    var cedula_global = document.getElementById('cedula_global').value;
                    var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
                    var Key_Usu = document.getElementById('Key_Usu').value;
                         
                    //Los anexamos
                    formData.append("cedula_global", cedula_global);
                    formData.append("Id_Per_Usu", Id_Per_Usu);
                    formData.append("Key_Usu", Key_Usu);
              
                    $.ajax({
                         url: "Modulos/SAE/Catalogos/centros_trabajo/universidades/zonas/ajax_guarda_logo.php",
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
                                   texto['EXITO_logo'], //texto
                                   400, //velocidad
                                   2400 //tiempo
                              );
                              //Actualizar el nombre del archivo
                              document.getElementById('archivo_logo_original').value = document.getElementById('file_logo_Zon').value;
                              //error atualizando en la BD
                         }else{
                              $(this).notifyMe(
                                   'top', //Bottom/top/left/ right
                                   'error', //error/info/success/default
                                   texto['Error']+':', //titulo
                                   texto['ERROR_subir_archivo'], //texto
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
                    texto['ERROR_extension_imagen'], //texto
                    400, //velocidad
                     2400 //tiempo
                  );
          }
     }    
}



function Modificar_Logo_Zon(){

     if (document.getElementById('file_logo_Zon').value != document.getElementById('archivo_logo_original').value){
      if (LimitarTipoArchivo_IMG('file_logo_Zon')) {
         if(Tamano_Archivo('file_logo_Zon')>1){
              $(this).notifyMe(
                  'top', //Bottom/top/left/ right
                  'error', //error/info/success/default
                  texto['Error']+':', //titulo
                  texto['ERROR_tamano_1MB'], //texto
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
            var archivo=$('#file_logo_Zon')[0].files[0];
            
            //Lo anexamos a nuestro objeto formData.append("nombre_a_enviar", "valor");
            formData.append("file_logo_Zon", archivo);
            
            //Obtenemos la cedula y Id de usuario para guardar en bitacora
            var cedula_global = document.getElementById('cedula_global').value;
            var Id_Per_Usu = document.getElementById('Id_Per_Usu').value;
            var Key_Usu = document.getElementById('Key_Usu').value;
            var Id_Zon=document.getElementById('Id_Zon').value;

            //Los anexamos
            formData.append("cedula_global", cedula_global);
            formData.append("Id_Per_Usu", Id_Per_Usu);
            formData.append("Key_Usu", Key_Usu);
            formData.append("Id_Zon", Id_Zon);
            
            $.ajax({
                url: "Modulos/SAE/Catalogos/centros_trabajo/universidades/zonas/ajax_mod_logo.php",
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
						texto['EXITO_logo'], //texto
						400, //velocidad
						2400 //tiempo
					);
                  //Actualizar el nombre del archivo
                  document.getElementById('archivo_logo_original').value = document.getElementById('file_logo_Zon').value;
               //error atualizando en la BD
               }else if(res=='e1'){
                  $(this).notifyMe(
						'top', //Bottom/top/left/ right
						'error', //error/info/success/default
						texto['Error']+':', //titulo
						texto['ERROR_actualizar_nombre_archivo'], //texto
						400, //velocidad
						2400 //tiempo
					);
               }else{
                    if(res=='e2'){
                  $(this).notifyMe(
						'top', //Bottom/top/left/ right
						'error', //error/info/success/default
						texto['Error']+':', //titulo
						texto['ERROR_subir_archivo'], //texto
						400, //velocidad
						2400 //tiempo
					);
               }else{
                    if(res=='e3'){
                  $(this).notifyMe(
						'top', //Bottom/top/left/ right
						'error', //error/info/success/default
						texto['Error']+':', //titulo
						texto['ERROR_no_existe_nombre_archivo'], //texto
						400, //velocidad
						2400 //tiempo
					);
               }
                    
               } 
               }
                      
            }); //done
           
        }//fin
        
      }else{
         $(this).notifyMe(
            'top', //Bottom/top/left/ right
            'error', //error/info/success/default
            texto['Error']+':', //titulo
            texto['ERROR_extension_imagen'], //texto
            400, //velocidad
            2400 //tiempo
         );
      }
   }//!=
     

   
}//nombre metodo

