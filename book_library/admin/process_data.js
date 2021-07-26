const form = document.getElementById("form");
const options = document.getElementsByClassName("opt_class");
const radio = document.getElementsByName("new_category");

for (var i = 1; i < options.length; i++) {
    options[i].setAttribute("onclick", "select()");
}

function select() {
    document.addEventListener("")
    console.log("option selected");
    radio.forEach(radio_btn => {
        radio_btn.addAttribute("disabled");
    })
}
console.log("process is loaded");