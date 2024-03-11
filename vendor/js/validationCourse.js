document.addEventListener('DOMContentLoaded', function() {
    const titleInput = document.querySelector("#title");
    const submitBtn = document.querySelector("#submitBtn");
    const p = document.querySelector("#p");

    titleInput.addEventListener("input", () => {
        const text = titleInput.value.trim();
        checkInput(text);
    });
    function checkInput(text) {
        const regex = /^[a-zA-Z\s]{4,}$/;
        const isValid_course = regex.test(text);
        if (isValid_course) {
            p.textContent = "";
            submitBtn.removeAttribute("disabled");
        } else {
            p.textContent = "Please enter a valid title (at least 4 characters with letters and spaces only).";
            submitBtn.setAttribute("disabled", "true");
        }
    }
});