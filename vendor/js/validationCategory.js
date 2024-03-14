document.addEventListener('DOMContentLoaded', function() {
    const cateNameInput = document.querySelector("#cateName");
    const submitBtn = document.querySelector("#submitBtn");
    const p = document.querySelector("#p");

    cateNameInput.addEventListener("input", () => {
      const text = cateNameInput.value.trim();
      checkInput(text);
    });

    function checkInput(text) {
      const regex = /^[a-zA-Z\s]{4,}$/;
      const isValid_category = regex.test(text);
      if (isValid_category) {
        p.textContent = "";
        submitBtn.removeAttribute("disabled");
      } else {
        p.textContent = "Please enter a valid title (at least 4 characters with letters and spaces only).";
        submitBtn.setAttribute("disabled", "true");
      }
    }
  });