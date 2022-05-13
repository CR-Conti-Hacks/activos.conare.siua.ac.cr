

var final_transcript = '';
var recognizing = false;
var ignore_onend;
var start_timestamp;
var recognition;
if (!('webkitSpeechRecognition' in window)) {
  //upgrade();
} else {


  recognition = new webkitSpeechRecognition();
  recognition.continuous = false;
  recognition.interimResults = true;

  recognition.onstart = function() {
    recognizing = true;
    css_microfono_activo();
  };

  recognition.onerror = function(event) {
    if (event.error == 'no-speech') {
      ignore_onend = true;
    }
    if (event.error == 'audio-capture') {
      ignore_onend = true;
    }
    if (event.error == 'not-allowed') {
      if (event.timeStamp - start_timestamp < 100) {
      } else {
      }
      ignore_onend = true;
    }
  };

  recognition.onend = function() {
    recognizing = false;
    recognition.stop();
    if (ignore_onend) {
      return;
    }
    if (!final_transcript) {

      return;
    }

    if (final_transcript) {
      //alert(final_transcript)
      css_microfono_neutro();
      //Quitar los espacios en blanco
      final_transcript = final_transcript.replace(" ","");
      final_transcript = final_transcript.trim();
      //if(!isNaN(final_transcript)){
          buscarActivo(final_transcript);
      /*}else{
         document.querySelector("#final_span").innerHTML ="activo no válido!";
         final_transcript = '';
          recognition.stop();
          recargarPagina();
         recognition.start();

      }*/
    }
    if (window.getSelection) {
      window.getSelection().removeAllRanges();
      var range = document.createRange();
      range.selectNode(document.getElementById('final_span'));
      window.getSelection().addRange(range);
    }

  };

  recognition.onresult = function(event) {
    var interim_transcript = '';
    for (var i = event.resultIndex; i < event.results.length; ++i) {
      if (event.results[i].isFinal) {
        final_transcript += event.results[i][0].transcript;
      } else {
        interim_transcript += event.results[i][0].transcript;
      }
    }
    final_span.innerHTML = final_transcript;
    interim_span.innerHTML = interim_transcript;
    if (final_transcript) {

    }
  };
}



function activarEscucha() {
   recognizing = false;
   final_transcript = '';
   recognition.stop();
   recognition.start();
   recognizing = true;
}


function startButton(event) {
  if (recognizing) {
    recognition.stop();
    return;
  }
  final_transcript = '';
  //recognition.lang = "es-ES";
  recognition.start();
  ignore_onend = false;
  final_span.innerHTML = '';
  interim_span.innerHTML = '';
  start_timestamp = event.timeStamp;
}
