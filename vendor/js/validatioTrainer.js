document.addEventListener('DOMContentLoaded', function() {
    let usernameInput = document.querySelector("#username");
    let emailInput = document.querySelector("#email");
    let passwordInput = document.querySelector("#password");
    let submitBtn = document.querySelector("#submitBtn");
    let usernameValidationMsg = document.querySelector("#usernameValidationMsg");
    let emailValidationMsg = document.querySelector("#emailValidationMsg");
    let passwordValidationMsg = document.querySelector("#passwordValidationMsg");

    usernameInput.addEventListener("input", validateUsername);
    emailInput.addEventListener("input", validateEmail);
    passwordInput.addEventListener("input", validatePassword);

    function validateUsername() {
      let usernameText = usernameInput.value.trim();
      let usernameRegex = /^[a-zA-Z\s]{4,}$/;
      let isValid = usernameRegex.test(usernameText);
      if (isValid) {
        usernameValidationMsg.textContent = "";
      } else {
        usernameValidationMsg.textContent = "Please enter a valid username";
      }
      validateForm();
    }

    function validateEmail() {
      let emailText = emailInput.value.trim();
      let emailRegex =  "/^[a-z\.]{4,20}\@[a-z\.]{2,40}\.[a-z]{1,3}$/";
      let isValid = emailRegex.test(emailText);
      if (isValid) {
        emailValidationMsg.textContent = "";
      } else {
        emailValidationMsg.textContent = "Please enter a valid email address";
      }
      validateForm();
    }



    function validatePassword() {
      let passwordText = passwordInput.value.trim();
      let isValid = passwordText.length == 8;
      if (isValid) {
        passwordValidationMsg.textContent = "";
      } else {
        passwordValidationMsg.textContent = "Password must be at least 8 characters";
      }
      validateForm();
    }

    function validateForm() {
      let isUsernameValid = usernameValidationMsg.textContent === "";
      let isEmailValid = emailValidationMsg.textContent === "";
      let isPasswordValid = passwordValidationMsg.textContent === "";
      if (isUsernameValid && isEmailValid && isPasswordValid) {
        submitBtn.removeAttribute("disabled");
      } else {
        submitBtn.setAttribute("disabled", "true");
      }
    }
  });