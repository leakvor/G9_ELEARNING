document.addEventListener('DOMContentLoaded', function() {
    const lesson_titleInput = document.querySelector("#lesson_title");
    const submitBtn = document.querySelector("#submitBtn");
    const p = document.querySelector("#p");

    lesson_titleInput.addEventListener("input", () => {
        const text = lesson_titleInput.value.trim();
        checkInput(text);
    });
    function checkInput(text) {
        const regex = /^[a-zA-Z\s]{4,}$/;
        const isValid_lesson = regex.test(text);
        if (isValid_lesson) {
            p.textContent = "";
            submitBtn.removeAttribute("disabled");
        } else {
            p.textContent = "Please enter a valid title (at least 4 characters with letters and spaces only).";
            submitBtn.setAttribute("disabled", "true");
        }
    }
});