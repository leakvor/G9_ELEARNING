document.addEventListener('DOMContentLoaded', function() {
    const categorySelect = document.querySelector('select[name="category"]');
    categorySelect.addEventListener('change', filterCourses);

    const teacherSelect = document.querySelector('select[name="teacher"]');
    teacherSelect.addEventListener('change', filterCourses);

    function filterCourses() {
      const selectedCategory = categorySelect.value;
      const selectedTeacher = teacherSelect.value;

      tableRows.forEach(function(row) {
        const courseCategory = row.cells[3].textContent.trim();
        const courseTeacher = row.cells[2].textContent.trim();

        if ((selectedCategory === '#' || courseCategory === selectedCategory) &&
          (selectedTeacher === '#' || courseTeacher === selectedTeacher)) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    }
  });
