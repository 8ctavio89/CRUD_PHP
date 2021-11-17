//User login validation.

var username = document.forms["login_form"]["username"];
var p = document.forms["login_form"]["password"];

var u_validation_error = document.getElementById("u_validation_error");
var p_validation_error = document.getElementById("p_validation_error");

var form_validation_error = document.getElementById("form_validation_error");

function validateLogInInfo() {
  if (username.value.length < 1 || username.value.length > 50) {
    u_validation_error.style.border = "1px solid red";
    u_validation_error.innerHTML = "Formato de entrada inválido.";
    u_validation_error.style.display = "block";

    return false;
  } else {
    u_validation_error.style.display = "none";
    username.style.border = "1px solid #4caf50";
  }

  if (password.value.length < 1 || username.value.length > 100) {
    p_validation_error.style.border = "1px solid red";
    u_validation_error.innerHTML =
      "Formato de contraseña incorrecto. Intenta de nuevo.";
    p_validation_error.style.display = "block";

    return false;
  } else {
    p_validation_error.style.display = "none";
    p.style.border = "1px solid #4caf50";
  }
}

function triggerDiv() {
  form_validation_error.style.display = "block";
}
