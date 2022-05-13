/******************************************************************/
/***************        CambiaTAB            **********************/
/******************************************************************/
function CambiaTAB(tab_a_ocultar, tab_a_mostrar) {
    document.getElementById(tab_a_ocultar).style.display = "none";
    document.getElementById(tab_a_mostrar).style.display = "block";
}

function MuestraTAB(tab_a_mostrar) {
    document.getElementById('TAB01').style.display = "none";
    document.getElementById('TAB02').style.display = "none";
    document.getElementById('TAB03').style.display = "none";
    document.getElementById('TAB04').style.display = "none";
    document.getElementById('TAB05').style.display = "none";
    Tipo = document.getElementById('Tipo').value;
    if (Tipo=="Estu") {
        document.getElementById('TAB06').style.display = "none";
    }
    document.getElementById('TAB07').style.display = "none";
    document.getElementById(tab_a_mostrar).style.display = "block";
}
/******************************************************************/
/***************    CargaIdentificacion      **********************/
/******************************************************************/
function CargaIdentificacion(txt_campo) {
    document.getElementById('id_usuario').value = document.getElementById(txt_campo).value;
}



/******************************************************************/
/*************** Validación  del inscripcion **********************/
/******************************************************************/
function validarDatosInscripcion(){
            
            var TI = document.getElementById('TI').value;        
           
           if((TI==1)&& (Valida_TXT('txt_cedula')) ) {
                    MuestraTAB('TAB02');
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'error', //error/info/success/default
                        texto['Error']+':', //titulo
                        texto['ERROR_Digitar_Su_Cedula'], //texto
                        200, //velocidad
                        3500 //tiempo
                    );
                    document.getElementById('txt_cedula').focus();
                    return false;
           }else if ((TI==1)&& (longitud_minima('txt_cedula',11))) {
                    MuestraTAB('TAB02');
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'error', //error/info/success/default
                        texto['Error']+':', //titulo
                        texto['ERROR_Tamano_Cedula'], //texto
                        200, //velocidad
                        3500 //tiempo
                    );
                    document.getElementById('txt_cedula').focus();
                    return false;
           }else if((TI==2)&& (Valida_TXT('txt_residencia')) ) {
                    MuestraTAB('TAB02');
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'error', //error/info/success/default
                        texto['Error']+':', //titulo
                        texto['ERROR_Digitar_Su_Residencia'], //texto
                        200, //velocidad
                        3500 //tiempo
                    );
                    document.getElementById('txt_residencia').focus();
                    return false;
           }else if ((TI==2)&& (longitud_minima('txt_residencia',13))) {
                    MuestraTAB('TAB02');
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'error', //error/info/success/default
                        texto['Error']+':', //titulo
                        texto['ERROR_Tamano_Residencia'], //texto
                        200, //velocidad
                        3500 //tiempo
                    );
                    document.getElementById('txt_residencia').focus();
                    return false;
           }else if((TI==3)&& (Valida_TXT('txt_pasaporte')) ) {
                    MuestraTAB('TAB02');
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'error', //error/info/success/default
                        texto['Error']+':', //titulo
                        texto['ERROR_Digitar_Su_Pasaporte'], //texto
                        200, //velocidad
                        3500 //tiempo
                    );
                    document.getElementById('txt_pasaporte').focus();
                    return false;
           }else if (Valida_TXT('txt_nombre')) {
                    MuestraTAB('TAB02');
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'error', //error/info/success/default
                        texto['Error']+':', //titulo
                        texto['ERROR_Digitar_Su_Nombre'], //texto
                        200, //velocidad
                        3500 //tiempo
                    );
                    document.getElementById('txt_nombre').focus();
                    return false;
           }else if (Valida_TXT('txt_ape1')) {
                    MuestraTAB('TAB02');
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'error', //error/info/success/default
                        texto['Error']+':', //titulo
                        texto['ERROR_Digitar_Su_Primer_Apellido'], //texto
                        200, //velocidad
                        3500 //tiempo
                    );
                    document.getElementById('txt_ape1').focus();
                    return false;
           }else if (document.getElementById('Pedir_Fecha_Nacimiento').value ==1 && Valida_TXT('Fecha_Nacimiento') ) {
                    MuestraTAB('TAB02');
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'error', //error/info/success/default
                        texto['Error']+':', //titulo
                        texto['ERROR_Seleccionar_Su_Fecha_Nacimiento'], //texto
                        200, //velocidad
                        3500 //tiempo
                    );
                    document.getElementById('Fecha_Nacimiento').focus();
                    return false;
           }else if (Valida_SELECT_0('genero')) {
                    MuestraTAB('TAB02');
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'error', //error/info/success/default
                        texto['Error']+':', //titulo
                        texto['ERROR_Seleccionar_Su_Genero'], //texto
                        200, //velocidad
                        3500 //tiempo
                    );
                    document.getElementById('genero').focus();
                    return false;
           }else if (document.getElementById('Pedir_Grados_Academicos').value ==1 && Valida_SELECT_0('grado_academico')) {
                    MuestraTAB('TAB02');
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'error', //error/info/success/default
                        texto['Error']+':', //titulo
                        texto['ERROR_Seleccionar_Su_Grado_Academico'], //texto
                        200, //velocidad
                        3500 //tiempo
                    );
                    document.getElementById('grado_academico').focus();
                    return false;
           }else if (document.getElementById('Nivel_Ubicacion_Conf').value >= 1 && Valida_SELECT_0('paises')) {
                    MuestraTAB('TAB03');
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'error', //error/info/success/default
                        texto['Error']+':', //titulo
                        texto['ERROR_Seleccionar_Su_Pais'], //texto
                        200, //velocidad
                        3500 //tiempo
                    );
                    document.getElementById('paises').focus();
                    return false;
           }else if (document.getElementById('Nivel_Ubicacion_Conf').value >= 2 && Valida_SELECT_0('provincias')) {
                    MuestraTAB('TAB03');
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'error', //error/info/success/default
                        texto['Error']+':', //titulo
                        texto['ERROR_Seleccionar_Su_Provincia'], //texto
                        200, //velocidad
                        3500 //tiempo
                    );
                    document.getElementById('provincias').focus();
                    return false;
           }else if (document.getElementById('Nivel_Ubicacion_Conf').value >= 3 && Valida_SELECT_0('cantones')) {
                    MuestraTAB('TAB03');
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'error', //error/info/success/default
                        texto['Error']+':', //titulo
                        texto['ERROR_Seleccionar_Su_Canton'], //texto
                        200, //velocidad
                        3500 //tiempo
                    );
                    document.getElementById('cantones').focus();
                    return false;
           }else if (document.getElementById('Nivel_Ubicacion_Conf').value == 4 && Valida_SELECT_0('distritos')) {
                    MuestraTAB('TAB03');
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'error', //error/info/success/default
                        texto['Error']+':', //titulo
                        texto['ERROR_Seleccionar_Su_Distrito'], //texto
                        200, //velocidad
                        3500 //tiempo
                    );
                    document.getElementById('distritos').focus();
                    return false;
           }else if (Valida_TXT('direccion')) {
                    MuestraTAB('TAB03');
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'error', //error/info/success/default
                        texto['Error']+':', //titulo
                        texto['ERROR_Digitar_Su_Direccion'], //texto
                        200, //velocidad
                        3500 //tiempo
                    );
                    document.getElementById('direccion').focus();
                    return false;
           }else{

                var telefonos = document.getElementsByName('telefonos[]');
                if (telefonos[0] == null || telefonos[0] =='undefined' ) {
                    MuestraTAB('TAB04');
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'error', //error/info/success/default
                        texto['Error']+':', //titulo
                        texto['ERROR_Agregar_Almenos_1_Telefono'], //texto
                        200, //velocidad
                        3500 //tiempo
                    );
                    document.getElementById('tipo_tel').focus();
                    return false;
                }else{
                   //Verificar que un telefono sea marcado para notificacion
                    var array_noti_tele = document.getElementsByName('tel_noti[]');
                    bandera = 0;
                    for(var i=0;i<array_noti_tele.length;i++){
                        if(array_noti_tele[i].value == 1){
                            bandera = 1;
                        }
                    }
                    if(bandera==0){
                        MuestraTAB('TAB04');
                        $(this).notifyMe(
                            'top', //Bottom/top/left/ right
                            'error', //error/info/success/default
                            texto['Error']+':', //titulo
                            texto['ERROR_Marcar_Almenos_1_Telefono_Notificacion'], //texto
                            200, //velocidad
                            3500 //tiempo
                        );
                        return false;
                    }else{
                        var correos = document.getElementsByName('correos[]');
                        if (correos[0] == null || correos[0] =='undefined' ) {
                            MuestraTAB('TAB05');
                            $(this).notifyMe(
                                'top', //Bottom/top/left/ right
                                'error', //error/info/success/default
                                texto['Error']+':', //titulo
                                texto['ERROR_Correo_Almenos_Uno'], //texto
                                200, //velocidad
                                3500 //tiempo
                            );
                            document.getElementById('txt_correo').focus();
                            return false;
                        }else{
                            //Verificar que un telefono sea marcado para notificacion
                            var array_noti_cor = document.getElementsByName('cor_noti[]');
                            bandera = 0;
                            for(var i=0;i<array_noti_cor.length;i++){
                                if(array_noti_cor[i].value == 1){
                                    bandera = 1;
                                }
                            }
                            if(bandera==0){
                                MuestraTAB('TAB05');
                                $(this).notifyMe(
                                    'top', //Bottom/top/left/ right
                                    'error', //error/info/success/default
                                    texto['Error']+':', //titulo
                                    texto['ERROR_Correo_Notificacion_Almenos_Uno'], //texto
                                    200, //velocidad
                                    3500 //tiempo
                                );
                                return false;
                            }else{
                                var Tipo = document.getElementById('Tipo').value;
                                if (Tipo=="Estu") {
                                        var centrostrabajo = document.getElementsByName('centrostrabajo[]');
                                        if (centrostrabajo[0] == null || centrostrabajo[0] =='undefined' ) {
                                            MuestraTAB('TAB06');
                                            $(this).notifyMe(
                                                'top', //Bottom/top/left/ right
                                                'error', //error/info/success/default
                                                texto['Error']+':', //titulo
                                                texto['ERROR_Seleccione_Carrera_Almenos_Una'], //texto
                                                200, //velocidad
                                                3500 //tiempo
                                            );
                                            document.getElementById('Id_CT').focus();
                                            return false;
                                        }else{
                                            
                                        }
                                   
                                }
                                var campo =''
                                if (TI==1) {
                                    campo ="txt_cedula";
                                }else if (TI==2) {
                                    campo = "txt_residencia";
                                }else if (TI==3) {
                                    campo = "txt_pasaporte";
                                }
                                CargaIdentificacion(campo);
                                if (Valida_TXT('contrasenna')) {
                                    MuestraTAB('TAB07');
                                    $(this).notifyMe(
                                        'top', //Bottom/top/left/ right
                                        'error', //error/info/success/default
                                        texto['Error']+':', //titulo
                                        texto['ERROR_Digite_Contrasenna_Inscripcion'], //texto
                                        200, //velocidad
                                        3500 //tiempo
                                    );
                                    return false;
                                }else if(Valida_TXT('contrasenna_confirmacion')){
                                    MuestraTAB('TAB07');
                                    $(this).notifyMe(
                                        'top', //Bottom/top/left/ right
                                        'error', //error/info/success/default
                                        texto['Error']+':', //titulo
                                        texto['ERROR_Digitar_Contrasena_Confirmacion'], //texto
                                        200, //velocidad
                                        3500 //tiempo
                                    );
                                    return false;
                                }else if(document.getElementById('contrasenna').value!= document.getElementById('contrasenna_confirmacion').value){
                                    MuestraTAB('TAB07');
                                    $(this).notifyMe(
                                        'top', //Bottom/top/left/ right
                                        'error', //error/info/success/default
                                        texto['Error']+':', //titulo
                                        texto['ERROR_Contrasennas_Diferentes'], //texto
                                        200, //velocidad
                                        3500 //tiempo
                                    );
                                    document.getElementById('contrasenna').value= '';
                                    document.getElementById('contrasenna_confirmacion').value='';
                                    return false;
                                }else if(Valida_SELECT_0('preguntas')){
                                    MuestraTAB('TAB07');
                                    $(this).notifyMe(
                                        'top', //Bottom/top/left/ right
                                        'error', //error/info/success/default
                                        texto['Error']+':', //titulo
                                        texto['ERROR_Seleccionar_Pregunta_Secreta'], //texto
                                        200, //velocidad
                                        3500 //tiempo
                                    );
                                    return false;
                                }else if(Valida_TXT('respuesta')){
                                    MuestraTAB('TAB07');
                                    $(this).notifyMe(
                                        'top', //Bottom/top/left/ right
                                        'error', //error/info/success/default
                                        texto['Error']+':', //titulo
                                        texto['ERROR_Digitar_Respuesta_Pregunta'], //texto
                                        200, //velocidad
                                        3500 //tiempo
                                    );
                                    return false;
                                }
                                
                            }
                        }
                    }                   
                    
                }
           
           }
           
           
           
           
            //formulario valido
            return true;
}

/******************************************************************/
/*************** Guardar datos inscripcion   **********************/
/******************************************************************/
function guardarDatosInscripcion() {
    if (validarDatosInscripcion()) {

            //obtenemos el documento
            var f = $(this);
            //Este pega todos los campos del formulario
            //var formData = new FormData(document.getElementById("con_configuracion"));
            //Creo el objeto formData
            var formData = new FormData();
            
            /*************************************************************/
            /*****************      TAB 01: FOTO   ***********************/
            /*************************************************************/
            var archivo=$('#foto')[0].files[0];

            //Lo anexamos a nuestro objeto formData.append("nombre_a_enviar", "valor");
            formData.append("foto", archivo);
            
            /*************************************************************/
            /**************      TAB 02: DATOS PERSONALES ****************/
            /*************************************************************/
            var Tipo = document.getElementById('Tipo').value;
            var TI= document.getElementById('TI').value;
            var txt_cedula = document.getElementById('txt_cedula').value;
            var txt_residencia = document.getElementById('txt_residencia').value;
            var txt_pasaporte = document.getElementById('txt_pasaporte').value;
            var txt_nombre = document.getElementById('txt_nombre').value;
            var txt_ape1 = document.getElementById('txt_ape1').value;
            var txt_ape2 = document.getElementById('txt_ape2').value;
            var genero = document.getElementById('genero').value;
            
            var Pedir_Fecha_Nacimiento = document.getElementById('Pedir_Fecha_Nacimiento').value;
            var Fecha_Nacimiento =0;
            if (Pedir_Fecha_Nacimiento==1) {
                Fecha_Nacimiento = document.getElementById('Fecha_Nacimiento').value;
            }
            
         
            var Pedir_Grados_Academicos = document.getElementById('Pedir_Grados_Academicos').value;
            var grado_academico=0;
            if (Pedir_Grados_Academicos==1) {
                grado_academico = document.getElementById('grado_academico').value;
            }
                  
            /*************************************************************/
            /**************      TAB 03: DATOS Ubicacion  ****************/
            /*************************************************************/
            var Nivel_Ubicacion_Conf = document.getElementById('Nivel_Ubicacion_Conf').value;
            var paises = 0;
            var provincias = 0;
            var cantones = 0;
            var distritos = 0;
            if (Nivel_Ubicacion_Conf==1) {
                paises = document.getElementById('paises').value;
            }else if (Nivel_Ubicacion_Conf==2) {
                paises = document.getElementById('paises').value;
                provincias = document.getElementById('provincias').value;
            }else if (Nivel_Ubicacion_Conf==3) {
                paises = document.getElementById('paises').value;
                provincias = document.getElementById('provincias').value;
                cantones = document.getElementById('cantones').value;
            }else if (Nivel_Ubicacion_Conf==4) {
                paises = document.getElementById('paises').value;
                provincias = document.getElementById('provincias').value;
                cantones = document.getElementById('cantones').value;
                distritos = document.getElementById('distritos').value;
            }
            var direccion = document.getElementById('direccion').value;
            
            
            /*************************************************************/
            /**************      TAB 04: TELEFONOS        ****************/
            /*************************************************************/
             var array_telefonos = document.getElementsByName('telefonos[]');
             var array_tipo_tel = document.getElementsByName('tipo_tel[]');
             var array_noti_tel = document.getElementsByName('tel_noti[]');
             var array_publi_tel = document.getElementsByName('tel_publi[]');
             var telefonos ='';
             var tipos_tel = '';
             var noti_tel = '';
             var publi_tel = '';
             
            for(var i=0;i<array_telefonos.length;i++){
                telefonos += array_telefonos[i].value + '/';
                tipos_tel += array_tipo_tel[i].value + '/';
                noti_tel += array_noti_tel[i].value + '/';
                publi_tel += array_publi_tel[i].value + '/';
            }
            /*************************************************************/
            /**************      TAB 05: CORREOS          ****************/
            /*************************************************************/
            var array_correos = document.getElementsByName('correos[]');
            var array_noti_cor = document.getElementsByName('cor_noti[]');
            var array_publi_cor = document.getElementsByName('cor_publi[]');
            
            var correos = '';
            var noti_cor ='';
            var publi_cor ='';
            
            for(var i=0;i<array_correos.length;i++){
                correos += array_correos[i].value.toLowerCase() + '/';
                noti_cor += array_noti_cor[i].value + '/';
                publi_cor += array_publi_cor[i].value + '/';
            }
            
            /*************************************************************/
            /**************      TAB 06: EDUCACION        ****************/
            /*************************************************************/
            
            var centrostrabajo = '';
            var universidades = '';
            var escuelas = '';
            var carreras = '';
            if (Tipo=="Estu") {
                var array_centrostrabajo = document.getElementsByName('centrostrabajo[]');
                var array_universidades = document.getElementsByName('universidades[]');
                var array_escuelas = document.getElementsByName('escuelas[]');
                var array_carreras = document.getElementsByName('carreras[]');
                for(var i=0;i<array_centrostrabajo.length;i++){
                    centrostrabajo += array_centrostrabajo[i].value + '/';
                    universidades += array_universidades[i].value + '/';
                    escuelas += array_escuelas[i].value + '/';
                    carreras += array_carreras[i].value + '/';
                }
            }
            /*************************************************************/
            /**************      TAB 07: USUARIO          ****************/
            /*************************************************************/
            var id_usuario = document.getElementById('id_usuario').value;
            var contrasenna = hex_md5(document.getElementById('contrasenna').value);
            var preguntas = document.getElementById('preguntas').value;
            var respuesta = document.getElementById('respuesta').value;
            

            
        
       
            

           
            //Los anexamos
            formData.append("Tipo", Tipo);
            formData.append("TI", TI);
            formData.append("txt_cedula", txt_cedula);
            formData.append("txt_residencia", txt_residencia);
            formData.append("txt_pasaporte", txt_pasaporte);
            formData.append("txt_nombre", txt_nombre);
            formData.append("txt_ape1", txt_ape1);
            formData.append("txt_ape2", txt_ape2);
            formData.append("Fecha_Nacimiento", Fecha_Nacimiento);
            formData.append("genero", genero);
            formData.append("grado_academico", grado_academico);
            formData.append("paises", paises);
            formData.append("provincias", provincias);
            formData.append("cantones", cantones);
            formData.append("distritos", distritos);
            formData.append("direccion", direccion);
            formData.append("telefonos", telefonos);
            formData.append("tipos_tel", tipos_tel);
            formData.append("noti_tel", noti_tel);
            formData.append("publi_tel", publi_tel);
            formData.append("correos", correos);
            formData.append("noti_cor", noti_cor);
            formData.append("publi_cor", publi_cor);
            formData.append("centrostrabajo", centrostrabajo);
            formData.append("universidades", universidades);
            formData.append("escuelas", escuelas);
            formData.append("carreras", carreras);
            formData.append("id_usuario", id_usuario);
            formData.append("contrasenna", contrasenna);
            formData.append("preguntas", preguntas);
            formData.append("respuesta", respuesta);
           
            $.ajax({
                url: "../ajax_inscripcion.php",
                    type: "post",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                })
             .done(function(res){
                if (res==1) {
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'success', //error/info/success/default
                        texto['Exito']+':', //titulo
                        texto['EXITO_Inscripcion'], //texto
                        200, //velocidad
                        4500 //tiempo
                    );
                    setTimeout(function(){
                    location.href = "../../index.php";
                    
                    },3500);
                
                }else{
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'error', //error/info/success/default
                        texto['Error']+':', //titulo
                        texto['ERROR_Inscripcion'], //texto
                        200, //velocidad
                        3500 //tiempo
                    );
                }
            });
    
        
    }
}


/***********************************************************************************/
/**********           Funcion Habilitar_Provincia         ***********************/
//esta función carga el combo de provincias segun el pais seleccionado
/***********************************************************************************/


function Habilitar_Provincia_Inscripcion(ruta){
    
    
    //Deshabilitar los otros combos
    Nivel_Ubi_Conf = document.getElementById('Nivel_Ubicacion_Conf').value;
    
   
    //Si tiene las provincias habilitadas
    if (Nivel_Ubi_Conf==2) {
        Reinicia_Combo('provincias');
        
    //Si tiene habilitados los cantones
    }else if (Nivel_Ubi_Conf==3) {
        Reinicia_Combo('provincias');
        Reinicia_Combo('cantones'); 
       
    //Si tiene habiliados los distritos
    }else if (Nivel_Ubi_Conf==4) {
        Reinicia_Combo('provincias');
        Reinicia_Combo('cantones');
        Reinicia_Combo('distritos');    
    }
   
    //Obtenemos el valor del pais seleccionado
    var Id_Pai = document.getElementById('paises').value;
    
            
    //Variables
    var pagina = ruta+"INSCRIPCION/plantilla002/Habilita_Provincia_HTML_Inscripcion.php";
    var parametros = "Id_Pai="+Id_Pai+"&ruta="+ruta;
    var URL = pagina+"?"+parametros;
    var destino = document.getElementById('div_provincias');
    var miAjax = NuevoAjax();
    
    //Abrimos la pagina de forma sincrona
    //para deterner a javascript hasta recibir un resultado
    miAjax.open("GET",URL,false);
    miAjax.send(null);
    error = miAjax.responseText;
    destino.innerHTML= error;

    $('#provincias').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: texto['ERROR_Seleccionar_Su_Provincia']
	});
    
}


function Habilitar_Canton_Inscripcion(ruta){
    
    
    //Deshabilitar los otros combos
    Nivel_Ubi_Conf = document.getElementById('Nivel_Ubicacion_Conf').value;
    
   
    if (Nivel_Ubi_Conf==3) {
        Reinicia_Combo('cantones'); 
       
    //Si tiene habiliados los distritos
    }else if (Nivel_Ubi_Conf==4) {
        Reinicia_Combo('cantones');
        Reinicia_Combo('distritos');    
    }
   
    //Obtenemos el valor del pais seleccionado
    var Id_Pro = document.getElementById('provincias').value;
            
    //Variables
    var pagina = ruta+"INSCRIPCION/plantilla002/Habilita_Canton_HTML_Inscripcion.php";
    var parametros = "Id_Pro="+Id_Pro+"&ruta="+ruta;
    var URL = pagina+"?"+parametros;
    var destino = document.getElementById('div_cantones');
    var miAjax = NuevoAjax();
    
    //Abrimos la pagina de forma sincrona
    //para deterner a javascript hasta recibir un resultado
    miAjax.open("GET",URL,false);
    miAjax.send(null);
    error = miAjax.responseText;
    destino.innerHTML= error;
    $('#cantones').darkTooltip({
		opacity:0.9,
		size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: texto['ERROR_Seleccionar_Su_Canton']
	});
    
}

function Habilitar_Distrito_Inscripcion(ruta){
    
    
    //Deshabilitar los otros combos
    Nivel_Ubi_Conf = document.getElementById('Nivel_Ubicacion_Conf').value;
    
   
    if (Nivel_Ubi_Conf==4) {
        Reinicia_Combo('distritos');    
    }
   
    //Obtenemos el valor del pais seleccionado
    var Id_Can = document.getElementById('cantones').value;
            
    //Variables
    var pagina = ruta+"INSCRIPCION/plantilla002/Habilita_Distrito_HTML_Inscripcion.php";
    var parametros = "Id_Can="+Id_Can+"&ruta="+ruta;
    var URL = pagina+"?"+parametros;
    var destino = document.getElementById('div_distritos');
    var miAjax = NuevoAjax();
    
    //Abrimos la pagina de forma sincrona
    //para deterner a javascript hasta recibir un resultado
    miAjax.open("GET",URL,false);
    miAjax.send(null);
    error = miAjax.responseText;
    destino.innerHTML= error;

    $('#distritos').darkTooltip({
		opacity:0.9,
        size: 'large',
		animation:'flipIn',
		gravity:'west', // 
		confirm:false,
		theme:'dark',
		content: texto['ERROR_Seleccionar_Su_Distrito']
	});
}










function Habilita_Universidad_Inscripcion(ruta, Saltarse_CONARE){
        
        //Deshabilitar los otros combos
        Reinicia_Combo('Id_Uni');
        Reinicia_Combo('Id_Esc');
        Reinicia_Combo('Id_Car');
                
        //Obtenemos el valor del pais seleccionado
        var Id_CT = document.getElementById('Id_CT').value;
            
            
        //Variables
        var pagina = ruta+"Modulos/SAE/Catalogos/centros_trabajo/Habilita_Universidad_JSON.php";
        var parametros = "Id_CT="+Id_CT+"&ruta="+ruta;;
        var URL = pagina+"?"+parametros;
    
        var destino = document.getElementById('contenedor_universidad');
        var miAjax=NuevoAjax();
                
        //Abrimos la pagina de forma sincrona
        //para deterner a javascript hasta recibir un resultado
        miAjax.open("GET",URL,false);
        miAjax.send(null);
    
        
        //Obtenemos la respuesta y la parseamos a JSON
        var resultado = JSON.parse(miAjax.responseText.trim());
   
    
        //texto tendra el contenido del div_provincias
        //el label y el select
        var nuevo_combo =   "<select name='Id_Uni' id='Id_Uni' class='estilo_input' onchange="+'"Habilita_Escuela_Inscripcion('+"'"+ruta+"')"+'"';
        
        if(resultado.length == 1){
            nuevo_combo += "disabled='disabled'";
        }
        
        nuevo_combo += ">";
        
       
                   
        //pasamos a crear los hijos
	
        for (var i=0;i<resultado.length;i++){
            
            //Saltarse conare
            if (Saltarse_CONARE==1) {
                if (resultado[i]['valor']!=1) {
                    nuevo_combo += '<option value="'+resultado[i]['valor']+'" >';
                    if (resultado[i]['valor']=='0') {
                        nuevo_combo += resultado[i]['nombre'];   
                    }else{
                        nuevo_combo += resultado[i]['diminutivo'];
                        nuevo_combo += ' / ';
                        nuevo_combo += resultado[i]['nombre'];
                    }
                    nuevo_combo += '</option>';        
                }
            }else{
                nuevo_combo += '<option value="'+resultado[i]['valor']+'" >';
                if (resultado[i]['valor']=='0') {
                    nuevo_combo += resultado[i]['nombre'];   
                }else{
                    nuevo_combo += resultado[i]['diminutivo'];
                    nuevo_combo += ' / ';
                    nuevo_combo += resultado[i]['nombre'];
                }
                nuevo_combo += '</option>';        
            }
            
        
        }    
       
    
            
        nuevo_combo += '</select>';
        nuevo_combo += '<label for="Id_Uni">'+texto['Universidad']+'</label>';
        
        destino.innerHTML = nuevo_combo;
    
        $('#Id_Uni').darkTooltip({
            opacity:0.9,
            size: 'large',
            animation:'flipIn',
            gravity:'west', //west,east,north,south
            confirm:false,
            theme:'dark',
            content: texto['ERROR_Seleccionar_Su_Universidad']
        });
}

function Habilita_Escuela_Inscripcion(ruta){
            
        //Deshabilitar los otros combos
        Reinicia_Combo('Id_Esc');
        Reinicia_Combo('Id_Car');
                
        //Obtenemos el valor del pais seleccionado
        var Id_Uni = document.getElementById('Id_Uni').value;
                
                
        //Variables
        var pagina = ruta+"Modulos/SAE/Catalogos/centros_trabajo/universidades/Habilita_Escuela_JSON.php";
        var parametros = "Id_Uni="+Id_Uni+"&ruta="+ruta;;
        var URL = pagina+"?"+parametros;
    
        var destino = document.getElementById('contenedor_escuela');
        var miAjax=NuevoAjax();
            
        //Abrimos la pagina de forma sincrona
        //para deterner a javascript hasta recibir un resultado
        miAjax.open("GET",URL,false);
        miAjax.send(null);
    
        //Obtenemos la respuesta y la parseamos a JSON
        var resultado = JSON.parse(miAjax.responseText.trim());
       
        
        //texto tendra el contenido del div_provincias
        //el label y el select
        var nuevo_combo =   "<select name='Id_Esc' id='Id_Esc' class='estilo_input' onchange="+'"Habilita_Carrera_Inscripcion('+"'"+ruta+"')"+'"';
        
        if(resultado.length == 1){
            nuevo_combo += "disabled='disabled'";
        }
        
        nuevo_combo += ">";
        
       
                   
        //pasamos a crear los hijos
	
        for (var i=0;i<resultado.length;i++){
            nuevo_combo += '<option value="'+resultado[i]['valor']+'" >';
            if (resultado[i]['valor']=='0') {
                nuevo_combo += resultado[i]['nombre'];   
            }else{
                nuevo_combo += resultado[i]['diminutivo'];
                nuevo_combo += ' / ';
                nuevo_combo += resultado[i]['nombre'];
            }
            nuevo_combo += '</option>';
        
        }    
       
    
	    
        nuevo_combo += '</select>';
        nuevo_combo += '<label for="Id_Esc">'+texto['Escuelas']+'</label>';
        destino.innerHTML = nuevo_combo;
    
        $('#Id_Esc').darkTooltip({
            opacity:0.9,
            size: 'large',
            animation:'flipIn',
            gravity:'west', //west,east,north,south
            confirm:false,
            theme:'dark',
            content: texto['ERROR_Seleccionar_Su_Escuela']
        });
}

function Habilita_Carrera_Inscripcion(ruta){
            
        //Deshabilitar los otros combos
        Reinicia_Combo('Id_Car');
                
        //Obtenemos el valor del pais seleccionado
        var Id_Esc = document.getElementById('Id_Esc').value;
                
                
        //Variables
        var pagina = ruta+"Modulos/SAE/Catalogos/centros_trabajo/universidades/carreras/Habilita_Carrera_JSON.php";
        var parametros = "Id_Esc="+Id_Esc+"&ruta="+ruta;;
        var URL = pagina+"?"+parametros;
    
        var destino = document.getElementById('contenedor_carrera');
        var miAjax=NuevoAjax();
            
        //Abrimos la pagina de forma sincrona
        //para deterner a javascript hasta recibir un resultado
        miAjax.open("GET",URL,false);
        miAjax.send(null);
    
        //Obtenemos la respuesta y la parseamos a JSON
        var resultado = JSON.parse(miAjax.responseText.trim());
       
        
        //texto tendra el contenido del div_provincias
        //el label y el select
        var nuevo_combo =   "<select name='Id_Car' id='Id_Car' class='estilo_input' ";
        
        if(resultado.length == 1){
            nuevo_combo += "disabled='disabled'";
        }
        
        nuevo_combo += ">";
        
       
                   
        //pasamos a crear los hijos
	
        for (var i=0;i<resultado.length;i++){
            nuevo_combo += '<option value="'+resultado[i]['valor']+'" >';
            if (resultado[i]['valor']=='0') {
                nuevo_combo += resultado[i]['nombre'];   
            }else{
                nuevo_combo += resultado[i]['diminutivo'];
                nuevo_combo += ' / ';
                nuevo_combo += resultado[i]['nombre'];
            }
            nuevo_combo += '</option>';
        
        }    
       
    
	    
        nuevo_combo += '</select>';
        nuevo_combo += '<label for="Id_Car">'+texto['Carrera']+'</label>';
        destino.innerHTML = nuevo_combo;
        $('#Id_Car').darkTooltip({
            opacity:0.9,
            size: 'large',
            animation:'flipIn',
            gravity:'west', //west,east,north,south
            confirm:false,
            theme:'dark',
            content: texto['ERROR_Seleccionar_Su_Carrera']
        });
}

/***********************************************************************************/
/**********                Funcion VerificaCedula ()         ***********************/
//esta función verifica si un cedula existe dentro del sistema
//llamada: onblur="VerificaCedula(this.value)"
/***********************************************************************************/      
function VerificaIdentificacion_Inscripcion(path,identificacion_verificar,campo) {
    /***************************************************/
    /****************** Variables Globales *************/
    /***************************************************/
    var miAjax = NuevoAjax();
    var respuesta;
    var pagina_ajax = path + "Modulos/SAE/Personas/ajax_verificaIdentificacion.php";
    /***************************************************/
    /************* Cedula a verificar      *************/
    /***************************************************/
    var parametros = 'identificacion_verificar;';
    var valores = identificacion_verificar+';';
    
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
                respuesta = miAjax.responseText.trim();
                if(respuesta==1){
                    $(this).notifyMe(
                        'top', //Bottom/top/left/ right
                        'error', //error/info/success/default
                        texto['Error']+':', //titulo
                        texto['ERROR_Identificacion_Existe'], //texto
                        400, //velocidad
                        4400 //tiempo
                    );
                    document.getElementById(campo).value = '';
                    document.getElementById(campo).focus();    
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

function CambiarValidacion() {
    var TI = document.getElementById('TI').value;
    //Si es cedula
    if (TI==1) {
        document.getElementById('fila_txt_cedula').style.display = "block";
        document.getElementById('fila_txt_residencia').style.display = "none";
        document.getElementById('fila_txt_pasaporte').style.display = "none";
    }else if (TI==2) {
        document.getElementById('fila_txt_cedula').style.display = "none";
        document.getElementById('fila_txt_residencia').style.display = "block";
        document.getElementById('fila_txt_pasaporte').style.display = "none";
    }else if (TI==3) {
        document.getElementById('fila_txt_cedula').style.display = "none";
        document.getElementById('fila_txt_residencia').style.display = "none";
        document.getElementById('fila_txt_pasaporte').style.display = "block";
    }
    document.getElementById('txt_cedula').value ='';
    document.getElementById('txt_residencia').value ='';
    document.getElementById('txt_pasaporte').value ='';
}