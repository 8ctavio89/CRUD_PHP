var new_username = document.forms["register_form"]["new_username"];
var new_lastname1 = document.forms["register_form"]["new_lastname_1"];
var new_birthdate = document.forms["register_form"]["new_birthdate"];
var new_password = document.forms["register_form"]["new_password"];

var new_username_validation_error = document.getElementById(
  "new_user_validation_error"
);

var new_lastname1_validation_error = document.getElementById(
  "new_lastname1_validation_error"
);

var new_birthdate_validation_error = document.getElementById(
  "new_birthdate_validation_error"
);

var overlay_div = document.getElementsByClassName("overlay")[0];

function newRegister() {
  if (new_username.value.length < 1) {
    new_username_validation_error.style.border = "1px solid red";
    new_username_validation_error.innerHTML = "Formato inválido.";
    new_username_validation_error.style.display = "block";

    return false;
  } else {
    new_username_validation_error.style.display = "none";
    new_username_validation_error.style.border = "1px solid #4caf50";
  }

  if (new_lastname1.value.length < 1) {
    new_lastname1_validation_error.style.border = "1px solid red";
    new_lastname1_validation_error.innerHTML = "Formato inválido.";
    new_lastname1_validation_error.style.display = "block";

    return false;
  } else {
    new_lastname1_validation_error.style.display = "none";
    new_lastname1.style.border = "1px solid #4caf50";
  }

  if (!new_birthdate.value) {
    new_birthdate_validation_error.style.border = "1px solid red";
    new_birthdate_validation_error.innerHTML = "Formato inválido";
    new_birthdate_validation_error.style.display = "block";

    console.log("NO");
    return false;
  } else {
    new_birthdate_validation_error.style.display = "none";
    new_birthdate.style.border = "1px solid #4caf50";
  }
}

var formState = false;

var insertion_form = document.getElementById("insertion_form");

function openForm() {
  if (!formState) {
    insertion_form.style.display = "block";
    insertion_form.style.transition = "0.1s";
    formState = true;
  } else {
    insertion_form.style.display = "none";
    insertion_form.style.transition = "0.1s";
    formState = false;
  }
}
