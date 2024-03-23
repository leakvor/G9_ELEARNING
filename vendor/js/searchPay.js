document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.querySelector("#search1");
    const tableRows = document.querySelectorAll('tbody tr');

    searchInput.addEventListener('input', function () {
        const searchTerm = searchInput.value.trim().toLowerCase();

        tableRows.forEach(function (row) {
            const userId = row.cells[2].textContent.trim().toLowerCase();
            if (searchTerm == "") {
                row.style.display = '';
            } else
                if (userId === searchTerm) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
        });
    });
});

function filterRows() {
    var input = document.getElementById('search3').value;
    var filter = input.toUpperCase();
    var table = document.querySelector('.table-dark');
    var tr = table.getElementsByTagName('tr');
    for (var i = 0; i < tr.length; i++) {
        var td = tr[i].getElementsByTagName('td')[4];
        if (td) {
            var txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = '';
            } else {
                tr[i].style.display = 'none';
            }
        }
    }
}
document.getElementById('search3').addEventListener('keyup', filterRows);