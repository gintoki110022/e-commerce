var password = document.getElementById("password");
var email = document.getElementById("email");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
var loginForm = document.getElementById('loginForm');
var message = document.getElementById('message');
// var input = document.getElementById('input');
// var elabel = document.getElementById('elabel');
// var plabel = document.getElementById('plabel');
// var nlabel = document.getElementById('nlabel');
// var clabel = document.getElementById('clabel');
// var validate = document.getElementById('validate');
// var regDiv = document.getElementById('reg-div');
// var regLabel = document.getElementById('reg-label');

var myModal = document.getElementById('myModal');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == myModal) {
        window.location.href = "http://localhost/assignment_web/home.html";
    }
}

// When the user clicks on the password field, show the message box
password.onfocus = function() {
    message.style.display = "block";
    loginForm.style.borderBottomLeftRadius = "0px";
    loginForm.style.borderBottomRightRadius = "0px";
}

// When the user clicks outside of the password field, hide the message box
password.onblur = function() {
    message.style.display = "none";
    loginForm.style.borderBottomLeftRadius = "20px";
    loginForm.style.borderBottomRightRadius = "20px";
}

// When the user starts to type something inside the password field
password.onkeyup = function() {
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if (password.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
    } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
    }

    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if (password.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
    } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
    }

    // Validate numbers
    var numbers = /[0-9]/g;
    if (password.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
    } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
    }

    // Validate length
    if (password.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
    } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
    }
}