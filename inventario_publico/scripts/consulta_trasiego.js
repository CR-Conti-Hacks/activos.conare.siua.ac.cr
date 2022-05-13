window.addEventListener("load",init);

function init(){

  $(".loading").hide();
 
  //Listener submit form busqueda
  document.getElementById('form_busqueda_numero').addEventListener('submit', function(evt){
      evt.preventDefault();
      var txt_numero_activo = document.getElementById('txt_numero_activo').value;
      buscarTraseigo(txt_numero_activo);

  });

  //Limitar solo 11 caracteres ala input de busqueda de activo
  document.querySelector('#txt_numero_activo').oninput = function () {
      if (this.value.length > 11) {
          this.value = this.value.slice(0,11);
      }
  };


}

function recargarPagina(){
  location.reload(); 
}

//Funcion que busca activos
function buscarTraseigo(Id_TRA){
  var dominio = document.getElementById('dominio').value;
  var ruta = document.getElementById('ruta').value;
  location.href=dominio+ruta+"inventario_publico/consulta_trasiego.php?Id_TRA="+Id_TRA;

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




