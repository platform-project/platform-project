function calendar(year, month){
    var output = "";    
    // months[i] = name of month i
    var months = new Array (
        "",                               // leave empty so that months[1] = "January"
        "January", "February", "March",
        "April", "May", "June",
        "July", "August", "September",
        "October", "November", "December"
    );

    // days[i] = number of days in month i
    var days = new Array ( 0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 );

    // check for leap year
    if (month == 2 && isLeapYear(year)) days[month] = 29;

    // print calendar header
    output += ("   " + months[month] + " " + year) + "\n\n";
    output += (" S  M Tu  W Th  F  S") + "\n";

    // starting day
    var d = day(month, 1, year);

    // print the calendar
    for (var i = 0; i < d; i++)
        output += ("   ");
    for (var i = 1; i <= days[month]; i++) {
        if (i <= 9){
            output += " " + i + " ";
        } else {
            output += i + " ";
        }
        
        if ((Math.ceil(i + d) % 7 == 0) || (i == days[month])) {
            output += "\n";
        }
    }
    output = output.trim();
    return output;
}

function day(month, day, year) {
    var d = new Date(year, month-1);
    return d.getDay();
}

function isLeapYear(year) {
    if  ((year % 4 == 0) && (year % 100 != 0)) return true;
    if  (year % 400 == 0) return true;
    return false;
}

$(function(){
    time = new Date();
    y = time.getFullYear();
    m = time.getMonth();
    $('#calendar').html(calendar(y, m+1));
})