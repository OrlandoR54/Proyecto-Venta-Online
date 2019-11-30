var banCed = false;
var banNomb = false;
var banApe = false;
var banTelf = false;
var banDir = false;
var banFecha = false;
var banCorreo = false;
var banPassword = false;

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
          activarBtn();
          return true;
        } else {
          banCed = false;
          activarBtn();
          document.getElementById("mensajeCedula").innerHTML =
            "<br>Numero de cedula invalida";
        }
      }
    } else {
      banCed = false;
      activarBtn();
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
    activarBtn();
    return true;
  } else {
    activarBtn();
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
    document.getElementById("mensajeApellido").innerHTML = "";
    activarBtn();
    return true;
  } else {
    activarBtn();
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

  /*Validar Fecha de Nacimiento */

  function validarFecha() {
    banFecha = false;
    var elemento = document.getElementById("fecha");
    var fecha = elemento.value.split("/");
    if (elemento.value.length != 10) {
      document.getElementById("mensajeFecha").innerHTML =
        "<br>Ingrese fecha valida: 04/11/1990";
      return false;
    } else {
      document.getElementById("mensajeFecha").innerHTML = "";
    }
    try {
      if (fecha.length == 3 && fecha[2].length == 4) {
        var dia = fecha[0];
        var mes = fecha[1];
        var year = fecha[2];
        var dmax;
        if (year < 1000 || year > new Date().getFullYear()) {
          alert("error año");
          if (year > new Date().getFullYear())
            document.getElementById("mensajeFecha").innerHTML =
              "<br>El año no debe ser mayor al actual";
          return false;
        }
        if (dia.length == 2 && mes.length == 2 && year.length == 4) {
          switch (parseInt(mes)) {
            case 1:
              dmax = 31;
              break;
            case 2:
              if (year % 4 == 0) dmax = 29;
              else dmax = 28;
              break;
            case 3:
              dmax = 31;
              break;
            case 4:
              dmax = 30;
              break;
            case 5:
              dmax = 31;
              break;
            case 6:
              dmax = 30;
              break;
            case 7:
              dmax = 31;
              break;
            case 8:
              dmax = 31;
              break;
            case 9:
              dmax = 30;
              break;
            case 10:
              dmax = 31;
              break;
            case 11:
              dmax = 30;
              break;
            case 12:
              dmax = 31;
              break;
            default:
              alert("error mes");
              document.getElementById("mensajeFecha").innerHTML =
                "<br>El mes ingresado no existe";
              return false;
          }
          if (dia < 1 || dia > dmax) {
            alert("error dia");
            document.getElementById("mensajeFecha").innerHTML =
              "<br>El dia ingresado no existe";
            return false;
          }
        } else {
          alert("Error fechas");
          estado = false;
        }
      }
      if (
        (fecha.length != 3 || fecha[2].length < 4) &&
        elemento.value.length == 10
      ) {
        alert("Error fecha");
        document.getElementById("mensajeFecha").innerHTML =
          "<br>Ingrese fecha valida: 04/11/1990";
        return false;
      }
    } catch (err) {
      alert("Error fechas");
      return false;
    }
    banFecha = true;
    activarBtn();
    return true;
  }

  function checkDate(evt) {
    var charCode = evt.which ? evt.which : event.keyCode;
    if (!(charCode >= 47 && charCode <= 57)) {
      alert("Ingrese solo numeros.");
      return false;
    }
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
  /*Validar Correo*/
  function validarCorreo() {
    banCorreo = false;
    var elemento = document.getElementById("email");
    var correo = elemento.value.split("@");
    if (correo.length == 2) {
      if (correo[0].length < 3) {
        document.getElementById("mensajeEmail").innerHTML =
          "<br>Direccion no valida abc@ups.edu.ec <br> abc@est.ups.edu.ec";
        return false;
      }
      if (
        correo[1].localeCompare("est.ups.edu.ec") == "0" ||
        correo[1].localeCompare("ups.edu.ec") == "0"
      ) {
        document.getElementById("mensajeEmail").innerHTML = "";
      } else {
        document.getElementById("mensajeEmail").innerHTML =
          "<br>@ups.edu.ec <br> @est.ups.edu.ec";
        return false;
      }
    } else {
      document.getElementById("mensajeEmail").innerHTML =
        "<br>Direccion no valido abc@ups.edu.ec <br>Direccion no valido abc@est.ups.edu.ec";
      return false;
    }
    banCorreo = true;
    activarBtn();
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
    activarBtn();
    return true;
  }
  

/*Funcion para asegurarse de que todos los campos sean ingresados */

  function activarBtn() {
    if (
      banCed &&
      banNomb &&
      banApe &&
      banPassword &&
      banCorreo &&
      banFecha
    ) {
      document.getElementById("btn").disabled = false;
      document.getElementById("btn").style.color = "rgb(255, 255, 255)";
      document.getElementById("btn").style.background = "#1883ba";
      document.getElementById("btn").style.border = "2px solid #0016b0";
      return false;
    } else {
      document.getElementById("btn").disabled = true;
      document.getElementById("btn").style.color = "rgb(83, 81, 81)";
      document.getElementById("btn").style.background = " rgb(170, 165, 165)";
      document.getElementById("btn").style.border = "2px solid #ffffff";
    }
  }
  
  function limpiar() {
    location.reload();
  }




  