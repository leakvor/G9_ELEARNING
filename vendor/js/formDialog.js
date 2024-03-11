$(document).ready(function() {
    $("#editIcon").click(function() {
      $("#editModal").modal('show');
    });
  });



  document.addEventListener('DOMContentLoaded', function() {
    const input = document.querySelector("#title");
    const submitBtn = document.querySelector("#submitBtn");
    const validationMsg = document.querySelector("#titleValidationMsg");

    input.addEventListener("input", (e) => {
      const text = input.value.trim();
      checkInput(text);
    });

    function checkInput(text) {
      const regex = /^[a-zA-Z\s]{4,20}$/; // Modify the regex pattern as needed
      const isValid = regex.test(text);

      if (isValid) {
        validationMsg.textContent = ""; // Clear any existing validation message
        submitBtn.removeAttribute("disabled");
      } else {
        validationMsg.textContent = "Please enter a valid title (at least 4 and small than 20 characters with letters and spaces only).";
        submitBtn.setAttribute("disabled", "true");
      }
    }
  });