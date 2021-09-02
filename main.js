//request a book form control --start
const comment_button = document.getElementById("comment_block");
const comment_form = document.getElementById("comment_form");
const submit_form = document.getElementById("submit_form");
const cancel_form = document.getElementById("form_cancel");
const comment_form_bg = comment_form.parentNode.parentNode;
var book_title = document.getElementById("book_title");
var email = document.getElementById("user_email");

comment_button.addEventListener("click", () => {
    comment_form.scrollIntoView();
    comment_form.classList.add("form_show");
    comment_form.style = "display:grid;pointer-events:auto;";
    comment_button.style = "display:none";

    submit_form.style = "pointer-events:none";
    console.log("comment button clicked");
})

book_title.addEventListener("input", ()=>{
    if(book_title.value=="" || email.value==""){
        submit_form.style = "pointer-events:none"
    }else{
        submit_form.style = "pointer-events:auto"
    }
});
email.addEventListener("input",()=>{
    if(email.value=="" || book_title.value==""){
        submit_form.style = "pointer-events:none"
    }else{
        submit_form.style = "pointer-events:auto"
    }
});

submit_form.addEventListener("click", () => {
    if(book_title.value=="" || email.value==""){
        submit_form.style="pointer-events:none";
    }else if(email.value==""){
        submit_form.style="pointer-events:none";
    }else{
        submit_form.style = "pointer-events:auto";
        comment_form.style = "display:none";
        comment_button.style = "display:block";
        console.log("submit button clicked");
    }
    
})

cancel_form.addEventListener("click", () => {
        comment_form.classList.remove("form_show");
        comment_form.style = "display:none;pointer-events:none";
        comment_button.style = "display:block";
    })
    //request a book form control --end




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

//categories selection button controls --start
const category_books = document.querySelectorAll(".catagory_results");
const category_btns = document.querySelectorAll(".cat_btn");
const btn_containers = document.querySelectorAll(".cat_nav");
for (let i = 0; i < btn_containers.length; i++) {
    btn_containers[i].onclick = function() {
        let j = 0;
        while (j < btn_containers.length) {
            btn_containers[j++].className = "cat_nav";
        }
        btn_containers[i].className = "cat_nav active";
    }
}



//display books when category button is selected
category_btns.forEach(category => {
        category.addEventListener("click", () => { // check if category is selected
            console.log("Selected category is " + category.getAttribute("id"));
            category_books.forEach(rows => {
                if (category.getAttribute("id") == rows.getAttribute("id")) {
                    rows.style = "display:table-row";
                    console.log("Btn clicked is " + category.getAttribute("id") + "Row id is" + rows.getAttribute("id"))
                } else {
                    rows.style = "display:none";
                }
            })
        })
    })
    //categories selection button controls --end

