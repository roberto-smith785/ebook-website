let day = new Date().getDay();

if (day == 0) {
    day = "Sunday";
} else if (day == 1) {
    day = "Monday";
} else if (day == 2) {
    day = "Tuesday";
} else if (day == 3) {
    day = "Wednesday";
}
if (day == 4) {
    day = "Thursday";
} else if (day == 5) {
    day = "Friday";
} else if (day == 6) {
    day = "Saturday";
}
c

console.log("Today is : " + day);