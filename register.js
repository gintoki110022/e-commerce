var password = document.getElementById("psw");
var confirmPassword = document.getElementById("confirm_password");
var confirmMessage = document.getElementById("confirmMessage");
var match = document.getElementById("match");
var loginForm = document.getElementById('loginForm');

// When the user clicks on the password field, show the message box
confirmPassword.onfocus = function () {
  confirmMessage.style.display = "block";
  loginForm.style.borderBottomLeftRadius = "0px";
  loginForm.style.borderBottomRightRadius = "0px";
}

// When the user clicks outside of the password field, hide the message box
confirmPassword.onblur = function () {
  confirmMessage.style.display = "none";
  loginForm.style.borderBottomLeftRadius = "20px";
  loginForm.style.borderBottomRightRadius = "20px";
}

// When the user starts to type something inside the password field
function checkPassword(){
  if (password.value == confirmPassword.value) {
    match.classList.remove("invalid");
    match.classList.add("valid");
  } else {
    match.classList.remove("valid");
    match.classList.add("invalid");
  }
}

confirmPassword.onkeyup = checkPassword;

password.onchange = checkPassword;
