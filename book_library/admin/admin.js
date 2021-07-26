const nav_btn = document.querySelectorAll(".nav_btn");
const content_sections = document.querySelectorAll(".content-div");
const content_banner = document.getElementById("heading");
const nav_list = document.querySelectorAll(".nav");
for (let i = 0; i < nav_list.length; i++) {
    nav_list[i].onclick = function() {
        let j = 0;
        while (j < nav_list.length) {
            nav_list[j++].className = "nav";
        }
        nav_list[i].className = "nav active";
    }
}
nav_btn.forEach(nav => {
    nav.addEventListener("click", () => {

        if (nav.getAttribute("id") == "home") {
            content_banner.innerText = "Welcome to Admin page";
            console.log("button clicked " + nav.getAttribute("id"));
            content_sections[0].style = "display:block";
            content_sections[1].style = "display:none";
            content_sections[2].style = "display:none";
            content_sections[3].style = "display:none";
        } else if (nav.getAttribute("id") == "view-request") {
            content_banner.innerText = "Request made by visitors";
            console.log("button clicked " + nav.getAttribute("id"));
            content_sections[1].style = "display:block";
            content_sections[2].style = "display:none";
            content_sections[0].style = "display:none";
            content_sections[3].style = "display:none";
        } else if (nav.getAttribute("id") == "add-books") {
            content_banner.innerText = "Add new books to website";
            console.log("button clicked " + nav.getAttribute("id"));
            content_sections[2].style = "display:block";
            content_sections[0].style = "display:none";
            content_sections[1].style = "display:none";
            content_sections[3].style = "display:none";
        } else if (nav.getAttribute("id") == "add-proverb") {
            content_banner.innerText = "Add new proverb to website";
            console.log("button clicked " + nav.getAttribute("id"));
            content_sections[3].style = "display:block";
            content_sections[0].style = "display:none";
            content_sections[2].style = "display:none";
            content_sections[1].style = "display:none";
        } else if (nav.getAttribute("id") == "user-view") {
            location.href = "../index.php";
        }
    })
})