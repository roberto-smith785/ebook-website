$(document).ready(function() {
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


    $("#home").click(function() {
        $(".home").slideDown();
        $(".add-books").slideUp();
        $(".view-request").slideUp();
        $(".add-proverbs").slideUp();
    })

    $("#view-request").click(function() {
        $(".view-request").slideDown();
        $(".home").slideUp();
        $(".add-books").slideUp();
        $(".add-proverbs").slideUp();
    })

    $("#add-books").click(function() {
        $(".add-books").slideDown();
        $(".home").slideUp();
        $(".view-request").slideUp();
        $(".add-proverbs").slideUp();
    })

    $("#add-proverb").click(function() {
        $(".add-proverbs").slideDown();
        $(".home").slideUp();
        $(".add-books").slideUp();
        $(".view-request").slideUp();
    })

    $("#user-view").click(function() {
        location.href = "../index.php";
    })







})


let day = new Date().get