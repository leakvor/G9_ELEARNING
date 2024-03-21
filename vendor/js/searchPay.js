document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector("#search1");
    const tableRows = document.querySelectorAll('tbody tr');

    searchInput.addEventListener('input', function() {
        const searchTerm = searchInput.value.trim().toLowerCase();

        tableRows.forEach(function(row) {
            const userId = row.cells[2].textContent.trim().toLowerCase();
            if(searchTerm==""){
                row.style.display = '';
            } else// Assuming the user_id is in the second cell
            if (userId === searchTerm) { // Check if userId matches searchTerm
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});

const searchInput2 = document.querySelector("#search2");
searchInput2.addEventListener('input', function() {
    const searchTerm = searchInput2.value.trim().toLowerCase();

    tableRows.forEach(function(row) {
        const dateText = row.cells[4].textContent.trim(); // Assuming the date is in the fifth cell
        const rowMonth = new Date(dateText).getMonth() + 1; // Extract month (1-12) from the date
        const searchMonth = searchTerm.slice(-2); // Extract month (if formatted as YYYY-MM)

        if (rowMonth.toString() === searchMonth) { // Check if rowMonth matches searchMonth
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});

