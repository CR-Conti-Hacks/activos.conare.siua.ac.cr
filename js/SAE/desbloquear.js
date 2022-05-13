/******************************************************************/
/********************* Funcion ENTER **************************/
//Verifica si se presiono la telca ENTER
//onkeypress="validar_ENTER(event)"
/******************************************************************/
function validar_ENTER_desbloquear(e) {

  tecla = (document.all) ? e.keyCode : e.which;

  if (tecla==13){
     desbloquearUsuario();
  }

}

function soloNumeros_desbloquear(Texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    //Acepta 8: backspace / 0: Tabulacion
    if (tecla==8 || tecla==0) return true;
    if (tecla==13) {
        desbloquearUsuario();
    }
    //Patron aceptado
    var patron =/[0-9]/;
    //Obtener un caracter segun numero ASCII
    var te = String.fromCharCode(tecla); 
    //Evaluamos el caracter en el patron
    return patron.test(te); 
}



/******************************************************************/
/********** Validación  del desbloquear usuario  ******************/
/******************************************************************/
function validarDatosDesbloquear(){
            
        var mensaje_error = document.getElementById('msj_error_desbloquear');
          var TI = document.getElementById('TI_desbloquear').value;
         
         if ((TI==1) && (Valida_TXT('txt_cedula_desbloquear'))) {
              mensaje_error.innerHTML= texto['ERROR_Digitar_Cedula']; 
             $( "#Desbloquear" ).effect( "shake" );
             return false;
         }else if ((TI==1)&&(longitud_minima('txt_cedula_desbloquear',11))) {
             mensaje_error.innerHTML= texto['ERROR_Cedula_9_Digitos'];
             $( "#Desbloquear" ).effect( "shake" );
             return false;
         }else if ((TI==2)&&(Valida_TXT('txt_residencia_desbloquear'))) {
             mensaje_error.innerHTML= texto['ERROR_Digitar_Residencia'];
             $( "#Desbloquear" ).effect( "shake" );
             return false;
         }else if ((TI==2)&&(longitud_minima('txt_residencia_desbloquear',13))) {
             mensaje_error.innerHTML= texto['ERROR_Residencia_13_Digitos'];
             $( "#Desbloquear" ).effect( "shake" );
             return false;
         }else if ((TI==3)&&(Valida_TXT('txt_pasaporte_desbloquear'))) {
             mensaje_error.innerHTML= texto['ERROR_Digitar_Pasaporte'];
             $( "#Desbloquear" ).effect( "shake" );
             return false;
         }else if(Valida_TXT('clave_desbloquear')){
             mensaje_error.innerHTML= texto['ERROR_Digitar_Contrasena'];
             $( "#Desbloquear" ).effect( "shake" );
             return false;
         }else if (Valida_SELECT_0('preguntas_desbloquear')) {
            mensaje_error.innerHTML= texto['ERROR_Seleccionar_Pregunta_Secreta'];
            $( "#Desbloquear" ).effect( "shake" );
            return false;
         }else if(Valida_TXT('respuesta_desbloquear')){
             mensaje_error.innerHTML= texto['ERROR_Digitar_Respuesta_Pregunta'];
             $( "#Desbloquear" ).effect( "shake" );
             return false;
         }
         return true;
      

}

/******************************************************************/
/*************** Guardar datos inscripcion   **********************/
/******************************************************************/
function desbloquearUsuario() {
    if (validarDatosDesbloquear()) {
            
        var mensaje_error = document.getElementById('msj_error_desbloquear');
            
            
         /****************************************************/
         //obtenemos los datos
         /****************************************************/
         var TI = document.getElementById('TI_desbloquear').value;
         var usuario = '';
         if (TI ==1) {
             usuario = document.getElementById('txt_cedula_desbloquear').value;
         }else if (TI==2) {
             usuario = document.getElementById('txt_residencia_desbloquear').value;
         }else if (TI==3) {
             usuario = document.getElementById('txt_pasaporte_desbloquear').value;
         }
         var contrasena = hex_md5(document.getElementById('clave_desbloquear').value);
         var pregunta = document.getElementById('preguntas_desbloquear').value;
         var respuesta= document.getElementById('respuesta_desbloquear').value;

         /****************************************************/
         //Creamos el query_string
         /****************************************************/
         var query_string = creaQueryString('usuario;contrasena;pregunta;respuesta;TI;',
                                            usuario+';'+contrasena+';'+pregunta+';'+respuesta+';'+TI+';');
        

        /****************************************************/
        //creamos los parametros para manejar el ajax
        /****************************************************/
        var miAjax = NuevoAjax();
        var pagina = "ajax_desbloquearUsuario.php";
        var respuesta;
        

        /****************************************************/
        //ejecutamos la llamada a ajax por GET
        /****************************************************/
        miAjax.open("GET",pagina+'?'+query_string,true);
        miAjax.onreadystatechange=function() {
            if (miAjax.readyState==ESTADO_COMPLETO){
                        if(miAjax.status==200){
                                    respuesta = miAjax.responseText;
                                    //La cedula no existe
                                    if (respuesta =='e1') {
                                                mensaje_error.innerHTML= texto['ERROR_desbloquear_004'];
                                                $( "#Desbloquear" ).effect( "shake" );
                                    //La persona esta desactivada
                                    }else if (respuesta=="e2") {
                                                mensaje_error.innerHTML= texto['ERROR_desbloquear_005'];
                                                $( "#Desbloquear" ).effect( "shake" );
                                    //Consultamos si la persona tiene derechos de usuario en el sistema
                                    //Si NO es un usuario
                                    }else if (respuesta=="e3") {
                                                mensaje_error.innerHTML= texto['ERROR_desbloquear_006'];
                                                $( "#Desbloquear" ).effect( "shake" );
                                    //No es usuario activo en el sistema		
                                    }else if (respuesta=="e4") {
                                                mensaje_error.innerHTML= texto['ERROR_desbloquear_007'];
                                                $( "#Desbloquear" ).effect( "shake" );
                                    }else if (respuesta=="e5") {
                                                mensaje_error.innerHTML= texto['ERROR_desbloquear_009'];
                                                $( "#Desbloquear" ).effect( "shake" );
                                    }else if (respuesta=="e6") {
                                                mensaje_error.innerHTML= texto['ERROR_desbloquear_010'];
                                                $( "#Desbloquear" ).effect( "shake" );
                                    }else if (respuesta==1) {
                                                alert(texto['EXITO_desbloquear_001']);
                                                $('#Desbloquear').fadeOut(500);
                                                $('#login').slideDown("slow");
                                                //Darle el foco a la caja de usuario
                                                document.getElementById('usuario').focus();
                                                document.getElementById('usuario').value='';
                                                document.getElementById('clave').value='';
                                    }

                        }
            }
        }
        miAjax.send(null);
    }
}