window.addEventListener("load",init);

function init(){

  /*Determinar si es chrom active microfono*/
  es_chrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;

  if(!es_chrome){
    document.querySelector("#boton_mic").style.display = "none";
  }

  $(".loading").hide();


  //Verificar si tiene camara y microfono
  detectarDispositivos();
  
  //Listener submit form busqueda
  document.getElementById('form_busqueda_numero').addEventListener('submit', function(evt){
      evt.preventDefault();
      var txt_numero_activo = document.getElementById('txt_numero_activo').value;
      buscarActivo(txt_numero_activo);

  });

  //Limitar solo 11 caracteres ala input de busqueda de activo
  document.querySelector('#txt_numero_activo').oninput = function () {
      if (this.value.length > 11) {
          this.value = this.value.slice(0,11);
      }
  };


  //Venta de imagen de activo
  document.querySelector('#foto_Activo').addEventListener('click',Ventana_IMG_ACT);
  document.querySelector('#btn_cerrar_vent_act_img').addEventListener('click',Ventana_IMG_ACT);


  //Listener QR
  document.querySelector('#demo_qr').addEventListener('click',Ventana_QR_ACT);
  document.querySelector('#btn_cerrar_vent_act_qr').addEventListener('click',Ventana_QR_ACT);

  //Listener Barras
  document.querySelector('#demo_barras').addEventListener('click',Ventana_BARRAS_ACT);
  document.querySelector('#btn_cerrar_vent_act_barras').addEventListener('click',Ventana_BARRAS_ACT);

  //Listener microfono
  document.querySelector('#boton_mic').addEventListener('click',Ventana_microfono);
  document.querySelector('#btn_cerrar_vent_microfono').addEventListener('click',Ventana_microfono);


 if (!navigator.mediaDevices || !navigator.mediaDevices.enumerateDevices) {
  alert("enumerateDevices() not supported.");
  return;
}


/*Se averigua el ID de la camra tracera parea odgigo de barras quagga*/
navigator.mediaDevices.enumerateDevices()
.then(function(devices) {
  devices.forEach(function(device) {
    //console.log( device );

    if( (device.kind == "videoinput") && device.label.match(/back/) != null ){
      //alert("Back found!");
      window.backCamID = device.deviceId;
     // console.log(window.backCamID)
     // console.log(typeof(window.backCamID))
      //console.log(window.backCamID)
    }
  });
})
.catch(function(err) {
  //alert(err.name + ": " + err.message);
});





}

//Manipulacion de ventana de imagen de activo
function Ventana_IMG_ACT (){
  document.querySelector('#vent_act_img').classList.toggle('open');
  document.querySelector('.page-wrapper').classList.toggle('blur-it');
  //document.querySelector('#barra_header').classList.toggle('is-compact');
  if(!document.querySelector('#barra_header').classList.contains('is-compact')){
    document.querySelector('#barra_header').classList.add('is-compact');
  }
  return false;
}

//Manipulacion de ventana de imagen de activo
function Ventana_QR_ACT (){
  document.querySelector('#vent_act_qr').classList.toggle('open');
  document.querySelector('.page-wrapper').classList.toggle('blur-it');

  if(!document.querySelector('#barra_header').classList.contains('is-compact')){
    document.querySelector('#barra_header').classList.add('is-compact');
  }

  window.scanner = new Instascan.Scanner({ video: document.getElementById('qr_camara'), mirror: false, scanPeriod: 5 });
  window.scanner.addListener('scan', function (content) {
    //obtenemos el resultado y lo dividimos para obtener los parametros
    //https://esarrollo
    ruta = content.split("?");

    activo = ruta[1].split("=");
    //console.log(ruta[0]+"?"+activo[0]+"="+activo[1]);
    //location.href = ruta[0]+"?"+activo[0]+"="+activo[1];
    buscarActivo(activo[1]);

  });
  Instascan.Camera.getCameras().then(function (cameras) {
    
    window.cameras = cameras;
    //si hay 2 camaras es un celular active la segunda camara
    var cant_camaras = parseInt(window.cameras.length);
    
    if (cant_camaras > 0) {
        
        if(cant_camaras ===1){
          window.scanner.start(window.cameras[0]);
        }else if(cant_camaras > 1){
          var lista_camaras = "<h3 class='titloSeleccionCamara'>Seleccione una cámara:</h3>";
          lista_camaras += '<ul class="demo-list-item mdl-list">';
          for(var i =0; i < cant_camaras; i++){
            lista_camaras += '<li class="mdl-list__item">';
            lista_camaras += '<span class="mdl-list__item-primary-content">';
            lista_camaras += '';
            lista_camaras += '<a onclick="iniciarCamaraQR('+i+')" >';
            lista_camaras += window.cameras[i]["name"]
            lista_camaras += '</a>';
            lista_camaras += '<span>';
            lista_camaras += '<li>';
          }
          lista_camaras += '<ul>';
          document.querySelector("#qr_seleccion_camara").innerHTML = lista_camaras;
      }

    } else {
      console.error('No camaras encontradas.');
    }
  }).catch(function (e) {
    //console.error(e);
    ocultaCamara();
  });
  return false;

}


function iniciarCamaraQR(numeroCamara){
  document.querySelector("#qr_seleccion_camara").innerHTML ="";
  window.scanner.start(window.cameras[numeroCamara]);

}

function recargarPagina(){
  location.reload(); 
}
//Manipulacion de ventana de imagen de activo
function Ventana_BARRAS_ACT (){

  document.querySelector('#vent_act_barras').classList.toggle('open');
  document.querySelector('.page-wrapper').classList.toggle('blur-it');

  if(!document.querySelector('#barra_header').classList.contains('is-compact')){
    document.querySelector('#barra_header').classList.add('is-compact');
  }
  capturarBarras();
    
  return false;
}

//Manipulacion de ventana de microfono
function Ventana_microfono (){
  document.querySelector('#vent_microfono').classList.toggle('open');
  document.querySelector('.page-wrapper').classList.toggle('blur-it');

  if(!document.querySelector('#barra_header').classList.contains('is-compact')){
    document.querySelector('#barra_header').classList.add('is-compact');
  }
  //activar_css_microfono();
  css_microfono_neutro();
  return false;
}



//Funcion que busca activos
function buscarActivo(Id_Act){
  var dominio = document.getElementById('dominio').value;
  var ruta = document.getElementById('ruta').value;
  location.href=dominio+ruta+"inventario_publico/consulta_activo.php?Id_Act="+Id_Act;

}

//Funcion solo deja digitar numeros
function soloNumeros(Texto) {
    //Texto.keyCode: obtiene el codigo ASCII si es IE
    //Texto.which: //Resto de navegadores
    var tecla = (document.all) ? Texto.keyCode : Texto.which;
    //Acepta 8: backspace / 0: Tabulacion
    if (tecla==8 || tecla===0 || tecla==13) return true;
    //Patron aceptado
    var patron =/[0-9]/;
    //Obtener un caracter segun numero ASCII
    var te = String.fromCharCode(tecla);
    //Evaluamos el caracter en el patron
    return patron.test(te);
}



function css_microfono_activo(){
  $('.blue').css("animation","estado_escuchando 1.4s infinite");
  $('.red').css("animation","estado_escuchando 1.4s 0.25s infinite");
  $('.yellow').css("animation","estado_escuchando 1.4s 0.10s infinite");
  $('.green').css("animation","estado_escuchando 1.4s 0.15s infinite");
}

function css_microfono_neutro(){
  $('.blue').css("animation","estado_neutro 1.4s infinite");
  $('.red').css("animation","estado_neutro 1.4s 0.05s infinite");
  $('.yellow').css("animation","estado_neutro 1.4s 0.1s infinite");
  $('.green').css("animation","estado_neutro 1.4s 0.15s infinite");
}


function activar_css_microfono() {
  $('.blue').css("animation","sound-1 1.4s infinite");
  $('.red').css("animation","sound-2 1.4s 0.25s infinite");
  $('.yellow').css("animation","sound-1 1.4s 0.10s infinite");
  $('.green').css("animation","sound-2 1.4s 0.15s infinite");
}

function ocultaCamara(){
    document.querySelector("#div_qr").setAttribute("hidden", true);
    document.querySelector("#div_barras").setAttribute("hidden", true);
}

function ocultaMicrofono(){
    document.querySelector("#boton_mic").setAttribute("hidden", true);
}


function detectarDispositivos(){
    if (navigator.mediaDevices && navigator.mediaDevices.enumerateDevices) {
        // Firefox 38+ seems having support of enumerateDevicesx
        navigator.enumerateDevices = function(callback) {
            navigator.mediaDevices.enumerateDevices().then(callback);
        };
    }else{
        //Si no soporta navigator.mediaDevices
        ocultaCamara();
        ocultaMicrofono();
    }

    var MediaDevices = [];
    var isHTTPs = location.protocol === 'https:';
    var canEnumerate = false;

    if (typeof MediaStreamTrack !== 'undefined' && 'getSources' in MediaStreamTrack) {
        canEnumerate = true;
    } else if (navigator.mediaDevices && !!navigator.mediaDevices.enumerateDevices) {
        canEnumerate = true;
    }

    var tieneMicrofono = false;
    var tieneCamara = false;

    var isMicrophoneAlreadyCaptured = false;
    var isWebcamAlreadyCaptured = false;


        if (!canEnumerate) {
            //Si no puede enumerarlos
            ocultaCamara();
            ocultaMicrofono();
            return;
        }
    
        if (!navigator.enumerateDevices && window.MediaStreamTrack && window.MediaStreamTrack.getSources) {
            navigator.enumerateDevices = window.MediaStreamTrack.getSources.bind(window.MediaStreamTrack);
        }
    
        if (!navigator.enumerateDevices && navigator.enumerateDevices) {
            navigator.enumerateDevices = navigator.enumerateDevices.bind(navigator);
        }
    
        if (!navigator.enumerateDevices) {
            if (callback) {
                callback();
            }
            return;
        }
    
        MediaDevices = [];
        navigator.enumerateDevices(function(devices) {
            devices.forEach(function(_device) {
                var device = {};
                for (var d in _device) {
                    device[d] = _device[d];
                }
    
                if (device.kind === 'audio') {
                    device.kind = 'audioinput';
                }
    
                if (device.kind === 'video') {
                    device.kind = 'videoinput';
                }
    
                var skip;
                MediaDevices.forEach(function(d) {
                    if (d.id === device.id && d.kind === device.kind) {
                        skip = true;
                    }
                });
    
                if (skip) {
                    return;
                }
    
                if (!device.deviceId) {
                    device.deviceId = device.id;
                }
    
                if (!device.id) {
                    device.id = device.deviceId;
                }
    
                if (!device.label) {
                    device.label = 'Please invoke getUserMedia once.';
                    if (!isHTTPs) {
                        device.label = 'HTTPs is required to get label of this ' + device.kind + ' device.';
                    }
                } else {
                    if (device.kind === 'videoinput' && !isWebcamAlreadyCaptured) {
                        isWebcamAlreadyCaptured = true;
                    }
    
                    if (device.kind === 'audioinput' && !isMicrophoneAlreadyCaptured) {
                        isMicrophoneAlreadyCaptured = true;
                    }
                }
    
                if (device.kind === 'audioinput') {
                    tieneMicrofono = true;
                }
    
    
                if (device.kind === 'videoinput') {
                    tieneCamara = true;
                }
    
                // there is no 'videoouput' in the spec.
    
                MediaDevices.push(device);
            });
    
            //Comprobar si tiene camara 
            if(!tieneCamara){
                ocultaCamara();
            //Comprobar si tiene microfono
            }
            if(!tieneMicrofono){
                ocultaMicrofono();
            }
        });
}  
