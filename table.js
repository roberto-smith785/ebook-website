/**
 * 
 * @param {HTMLTableElement} table table to sort
 * @param {number} column the index of the column to sort
 * @param {boolean} asc determines if sorting is ascending
 */
function sortTable(table, column, asc = true) {
    const direction = asc ? 1 : -1;
    const table_body = table.tBodies[0];
    const rows = Array.from(table_body.querySelectorAll("tr"));

    //sort each row
    const sorted_rows = rows.sort((a, b) => {
        const columnA_text = a.querySelector(`td:nth-child(${column+1})`).textContent.trim();
        const columnB_text = b.querySelector(`td:nth-child(${column+1})`).textContent.trim();

        return columnA_text > columnB_text ? (1 * direction) : (-1 * direction);
    });
    //remove all existing rows from table
    while (table_body.firstChild) {
        table_body.removeChild(table_body.firstChild);
    }

    //re-add the newly sorted sorted_rows
    table_body.append(...sorted_rows);
}
const table = document.getElementById("book_homepage");
const sort_by = document.querySelectorAll(".radio_sort");
const order_by = document.querySelectorAll(".radio_order");

var order;

order_by.forEach(val => {
    val.addEventListener("click", () => {
        if (val.getAttribute("class") == "radio_order ASC") {
            order = true;
        } else if (val.getAttribute("class") == "radio_order DESC") {
            order = false;
        }

        var column;
        var arr
        for (var i = 0; i < sort_by.length; i++) {
            if (sort_by[i].checked == true) {
                arr = [...sort_by];
                column = arr.indexOf(arr[i]);
            }
        }

        sortTable(table, column, order);
    })
})

sort_by.forEach(id => {
    id.addEventListener("click", () => {
        var order;
        for (var i = 0; i < order_by.length; i++) {
            if (order_by[i].checked == true) {
                order = order_by[i];
            }
        }
        switch (id.getAttribute("id")) {
            case "author_sort":
                sortTable(table, 0, order)
                break;
            case "title_sort":
                sortTable(table, 1, order)
                break;
            case "year_sort":
                sortTable(table, 2, order)
                break;
            case "edition_sort":
                sortTable(table, 3, order)
                break;
            case "size_sort":
                sortTable(table, 4, order)
                break;
        }
    })
})
window.addEventListener("loadstart", () => {
    var column;

    var order;
    for (var i = 0; i < order_by.length; i++) {
        if (order_by[i].checked == true) {
            order = order_by[i];
        }
    }

    for (var i = 0; i < sort_by.length; i++) {
        if (sort_by[i].checked == true) {
            var arr = [...sort_by];
            column = arr.indexOf(arr[i]);
        }
    }


    sortTable(table, column, order);
})

//search bar
const search = document.getElementById("search_book");
const titles = document.getElementsByClassName("title");

search.addEventListener("input", () => {
    var counter = titles.length;

    for (var i = 0; i < titles.length; i++) {
        if (titles[i].outerText == search.value) {
            titles[i].parentElement.style = "display:table-row";
        } else {
            titles[i].parentElement.style = "display:none";
        }

    }
})