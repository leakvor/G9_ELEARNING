document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector("#search");
    const tableRows = document.querySelectorAll('tbody tr');
    console.log(tableRows);

    searchInput.addEventListener('input', function() {
      const searchTerm = searchInput.value.trim().toLowerCase();

      tableRows.forEach(function(row) {
        const title = row.cells[1].textContent.trim().toLowerCase();
        if (title.includes(searchTerm)) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    });
  });

// let trHis = document.querySelectorAll('tbody tr');
// search.addEventListener('keyup', (e) => {
//     let searchCha = e.target.value;
//     for (trs of trHis) {
//         let wordTr = trs.children[1].textContent;
//         if (wordTr.indexOf(searchCha) !== -1) {
//             trs.style.display = 'table-row';
//         } else {
//             trs.style.display = 'none'
//         }

//     }
// })