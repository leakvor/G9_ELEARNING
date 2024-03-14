document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('#search');
    console.log(searchInput.value);
    const tableRows = document.querySelectorAll('tbody tr');
    console.log(tableRows);

    searchInput.addEventListener('input', function() {
      const searchTerm = searchInput.value.trim().toLowerCase();
      console.log(searchTerm);
      tableRows.forEach(function(row) {
        const name = row.cells[1].textContent.trim().toLowerCase();

        if (name.includes(searchTerm)) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    });
  });


  function functionDelete() {
    if (confirm("Are you sure you want to delete?")) {

      return true; // Proceed with deletion
    } else {
      return false; // Cancel deletion
    }
  }


  (function() {
    'use strict';
    $usernameError = "";
    $emailError = "";
    $passwordError = "";
    let regex_email = /^[a-z]{4,10}\.[a-z]{1,10}\@[a-z]{2,18}\.[a-z]{1,3}$/;
    let $regex_password = "/^[a-zA-Z\d\!\@\#\$\%]{5,8}$/";

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    let forms = document.querySelectorAll('.needs-validation');

    // Loop  prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function(form) {
        form.addEventListener('submit', function(event) {
          // Validate email
          let emailInput = form.querySelector('input[name="email"]');
          let email = emailInput.value.trim();
          if (!regex_email.test(email)) {
            alert("Invalid email format. Please enter a valid email address.");
            emailInput.focus();
            event.preventDefault();
            event.stopPropagation();
            return false;
          }

          // Validate password strength
          let passwordInput = form.querySelector('input[name="password"]');
          let password = passwordInput.value.trim();
          if (password.length = "/^[a-zA-Z\d\!\@\#\$\%]{5,8}$/".test(password)) {
            alert("Password must be at least 8 characters long and include at least one lowercase letter, one uppercase letter, one digit, and one special character.");
            passwordInput.focus();
            event.preventDefault();
            event.stopPropagation();
            return false;
          }

          // form is valid allow form submission
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
  })();