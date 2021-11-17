//User login validation.

var username = document.forms["login_form"]["username"];
var password = document.forms["login_form"]["password"];

var username_validation_error = document.getElementById(
  "username_validation_error"
);
var password_validation_error = document.getElementById(
  "password_validation_error"
);

var form_validation_error = document.getElementById("form_validation_error");

function validateLogInInfo() {
  if (username.value.length < 1 || username.value.length > 50) {
    username_validation_error.style.border = "1px solid red";
    username_validation_error.innerHTML = "Formato de entrada inválido.";
    username_validation_error.style.display = "block";

    return false;
  } else {
    username_validation_error.style.display = "none";
    username.style.border = "1px solid #4caf50";
  }

  if (password.value.length < 1 || username.value.length > 100) {
    password_validation_error.style.border = "1px solid red";
    username_validation_error.innerHTML =
      "Formato de contraseña incorrecto. Intenta de nuevo.";
    password_validation_error.style.display = "block";

    return false;
  } else {
    password_validation_error.style.display = "none";
    password.style.border = "1px solid #4caf50";
  }
}

function triggerDiv() {
  form_validation_error.style.display = "block";
}
