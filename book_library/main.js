//request a book form control --start
const comment_button = document.getElementById("comment_block");
const comment_form = document.getElementById("comment_form");
const submit_form = document.getElementById("submit_form");
const cancel_form = document.getElementById("form_cancel");
const comment_form_bg = comment_form.parentNode.parentNode;

comment_button.addEventListener("click", () => {
    comment_form.scrollIntoView();
    comment_form.classList.add("form_show");
    comment_form.style = "display:grid;";
    comment_button.style = "display:none";
    console.log("comment button clicked");
})

submit_form.addEventListener("click", () => {
    comment_form.style = "display:none";
    comment_button.style = "display:block";
    console.log("submit button clicked");
})

cancel_form.addEventListener("click", () => {
        comment_form.classList.add("form_show");
        comment_form.style = "display:none";
        comment_button.style = "display:block";
    })
    //request a book form control --end


//categories selection button controls --start
const category_books = document.querySelectorAll(".catagory_results");
const category_btns = document.querySelectorAll(".category_btn");


//display books when category button is selected
category_btns.forEach(category => {
        function toggle_btn_color() {
            if (category.classList == "selected") {
                category.classList.remove("selected");
            } else {
                category.classList.add("selected");
            }
        }
        category.addEventListener("click", () => { // check if category is selected
            toggle_btn_color();
            console.log("Selected category is " + category.getAttribute("id"));

            category_books.forEach(rows => {
                if (category.getAttribute("id") == rows.getAttribute("id")) {
                    rows.style = "display:table-row";
                } else {
                    rows.style = "display:none";
                }
            })
        })
    })
    //categories selection button controls --end



const links = document.querySelectorAll(".nav_category");

links.forEach(link => {
    link.addEventListener("click", () => {
        var category = link.getAttribute("class");
        switch (category) {
            case category = links[0].getAttribute("class"):
                document.getElementById("informatics").scrollIntoView();
                console.log(category);
                break;

            case category = links[1].getAttribute("class"):
                document.getElementById("networking").scrollIntoView();
                console.log(category);
                break;

            case category = links[2].getAttribute("class"):
                document.getElementById("programming").scrollIntoView();
                console.log(category);
                break;

            case category = links[3].getAttribute("class"):
                document.getElementById("security").scrollIntoView();
                console.log(category);
                break;

            case category = links[4].getAttribute("class"):
                document.getElementById("others").scrollIntoView();
                console.log(category);
                break;
        }
    })

})