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



  //Venta de imagen de activo
  document.querySelector('#foto_Activo').addEventListener('click',Ventana_IMG_ACT);
  document.querySelector('#btn_cerrar_vent_act_img').addEventListener('click',Ventana_IMG_ACT);


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
  location.href=dominio+ruta+"inventario_publico/consulta_activo_una.php?Id_Act="+Id_Act;

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
