var banCed = false;
var banNomb = false;
var banApe = false;
var banTelf = false;
var banDir = false;
var banPassword = false;
var banCorreo = false;
var banFehca=false;


/*Validar Cedula*/
  function validarCedula() {
    banCed = false;
    var elemento = document.getElementById("cedula");
    var vect = [];
    if (elemento.value.length == 10) {
      for (var i = 0; i < elemento.value.length; i++) {
        vect[i] = parseInt(elemento.value.charAt(i));
      }
      if (vect[2] <= 6 && vect[2] >= 0) {
        var comprobar = [2, 1, 2, 1, 2, 1, 2, 1, 2];
        var suma = 0;
        for (i = 0; i < comprobar.length; i++) {
          vect[i] *= comprobar[i];
          if (vect[i] >= 10) {
            vect[i] -= 9;
          }
          suma += vect[i];
        }
        suma += vect[i];
        suma %= 10;
        if (suma == 0) {
          banCed = true;
          document.getElementById("mensajeCedula").innerHTML = "";
         // activarBtn();
          return true;
        } else {
          banCed = false;
         // activarBtn();
          document.getElementById("mensajeCedula").innerHTML =
            "<br>Numero de cedula invalida";
        }
      }
    } else {
      banCed = false;
     // activarBtn();
      document.getElementById("mensajeCedula").innerHTML =
        "<br>Numero de cedula invalida";
    }
    return false;
  }
  
/*Validar nombre*/
function validarNombre() {
  banNomb = false;
  var elemento = document.getElementById("nombre");
  if (elemento.value.length > 2) {
    banNomb = true;
    document.getElementById("mensajeNombre").innerHTML = "";
    //activarBtn();
    return true;
  } else {
    //activarBtn();
    document.getElementById("mensajeNombre").innerHTML =
      "<br>Ingrese nombre valido";
  }
  return false;
}

/*Validar Apellido*/

function validarApellido() {
  banApe = false;
  var elemento = document.getElementById("apellido");
  if (elemento.value.length > 2) {
    banApe = true;
    banFehca = true;
    document.getElementById("mensajeApellido").innerHTML = "";
    //activarBtn();
    return true;
  } else {
    //activarBtn();
    document.getElementById("mensajeApellido").innerHTML =
      "<br>Ingrese apellido valido";
  }
  return false;
}


 /*Validar numero de telefono y maximo 10 que solo se ingresen numeros*/
  function validarNumero(evt) {
    var charCode = evt.which ? evt.which : event.keyCode;
    if (!(charCode >= 48 && charCode <= 57)) {
      alert("Ingrese solo numeros.");
      return false;
    }
    return true;
  }

  /*Validar que solo se ingrese texto*/
  function validarTexto(evt) {
    evt = evt ? evt : event;
    var charCode = evt.charCode
      ? evt.charCode
      : evt.keyCode
      ? evt.keyCode
      : evt.which
      ? evt.which
      : 0;
    if (
      charCode > 32 &&
      (charCode < 65 || charCode > 90) &&
      (charCode < 97 || charCode > 122)
    ) {
      alert("Ingrese solo letras.");
      return false;
    }
    return true;
  }
 
  /*Validar Contrasenia*/
  function validarPassword() {
    banPassword = false;
    var elemento = document.getElementById("password");
    if (elemento.value.length >= 8) {
      document.getElementById("mensajePassword").innerHTML = "";
      var banCaracter = false;
      var banMayus = false;
      var banMinus = false;
      for (var i = 0; i < elemento.value.length; i++) {
        var codigo = elemento.value.charCodeAt(i);
        if ((codigo == 95 || codigo == 64 || codigo == 36) && !banCaracter)
          banCaracter = true;
        else if (codigo > 64 && codigo < 91 && !banMayus) banMayus = true;
        else if (codigo > 96 && codigo < 123 && !banMinus) banMinus = true;
      }
      if (!banCaracter)
        document.getElementById("mensajePassword").innerHTML =
          "<br>Debe contener un caracter especial @ _ $";
      if (!banMayus)
        document.getElementById("mensajePassword").innerHTML =
          "<br>Debe contener una Mayuscula";
      if (!banMinus)
        document.getElementById("mensajePassword").innerHTML =
          "<br>Debe contener una minuscula";
    } else {
      document.getElementById("mensajePassword").innerHTML =
        "<br>Contraseña debe tener minimo 8 caracteres";
      return false;
    }
    if (banCaracter && banMayus && banMinus) banPassword = true;
    //activarBtn();
    return true;
  }
  

  
  function limpiar() {
    location.reload();
  }



