
let loginform = document.getElementById("login");
let registerform = document.getElementById("register");
let btn = document.getElementById("btn");
let page_title = document.getElementById("page-title");
page_title.innerHTML = "Login - saman";

let formBody = document.getElementsByClassName("form-body")[0];
formBody.style.height = "430px";



function register() {
    loginform.style.left = "-400px"
    registerform.style.left = "50px"
    btn.style.left = "110px"
    formBody.style.height = "500px";
    page_title.innerHTML = "Register - saman"
}

function login() {
    loginform.style.left = "50px"
    registerform.style.left = "450px"
    btn.style.left = "0px"
    formBody.style.height = "430px";
    page_title.innerHTML = "Login - saman"
}


// Register form validation
document.getElementById("register").addEventListener("submit", function(event) {
  var userIdInput = document.getElementById("user_id");
  var userEmailInput = document.getElementById("user_email");
  var userPasswordInput = document.getElementById("user_password");
  var checkboxInput = document.getElementById("checkbox");

  var usernameError = document.getElementById("usernameError");
  var emailError = document.getElementById("emailError");
  var passwordError = document.getElementById("passwordError");

  var usernameRegex = /^[a-zA-Z0-9_\.]{6,20}$/;
  var emailRegex = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
  var passwordRegex = /^.{7,}$/; // Modified regex for minimum 7 characters

  if (!usernameRegex.test(userIdInput.value)) {
    if (userIdInput.value.length < 7) {
      usernameError.textContent = "Username should be at least 7 characters long.";
    } else {
      usernameError.textContent = "Invalid username. Please enter a valid username.";
    }
    event.preventDefault(); // Prevent form submission
  } else {
    usernameError.textContent = ""; // Clear error message
  }

  if (!emailRegex.test(userEmailInput.value)) {
    emailError.textContent = "Invalid email. Please enter a valid email address.";
    event.preventDefault(); // Prevent form submission
  } else {
    emailError.textContent = ""; // Clear error message
  }

  if (!passwordRegex.test(userPasswordInput.value)) {
    passwordError.textContent = "Password should be at least 7 characters long.";
    event.preventDefault(); // Prevent form submission
  } else {
    passwordError.textContent = ""; // Clear error message
  }

  if (!checkboxInput.checked) {
    event.preventDefault(); // Prevent form submission
    // Display error message for checkbox
    // Example: document.getElementById("checkboxError").textContent = "Please agree to the terms & conditions.";
  }
});

// Login form validation
document.getElementById("login").addEventListener("submit", function(event) {
  var loginIdInput = document.getElementById("login_id");
  var loginPasswordInput = document.getElementById("login_password");

  // Perform validation for login form fields
  // Example: if (loginIdInput.value === "") { ... }
  // Example: if (loginPasswordInput.value === "") { ... }
});
