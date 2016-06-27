/*This function does the specified time and date for the application*/
$(document).ready(function() {
  var interval = setInterval(function(){
    var momentNow = moment().zone(300); //makes the time zone EST
    $('#date').html(momentNow.format("dddd, MMMM Do YYYY")); //Sets the date
    $('#time').html(momentNow.format('hh:mm:ss A')); //Sets the time
  }, 100); //Incrememts the seconds
});

/*Sign out functionality after inactivity reach X minutes*/
$(document).ready(function () {
    //Increment the idle time counter every second.
    var idleInterval = setInterval(timerIncrement, 60000); // 1 minute, 60000 milliseconds

    //Zero the idle timer on mouse movement.
    $(this).mousemove(function (e) {
        idleTime = 0;
    });
    //zero the idle timer on keypressed
    $(this).keypress(function (e) {
        idleTime = 0;
    });
});
//increments timer and checks if the time of idleness has been exceeded
function timerIncrement() {
    idleTime = idleTime + 1;
    if (idleTime > 4) { //greater than 5 minutes, the page will reset right now
        window.location = "../index.html"
    }
}

//$(document).ready(function(){
//    $("#my-input").typeahead({
//        source: ['Amsterdam', 'Washington', 'Sydney', 'Beijing', 'Cairo']
//        , minLength: 1
//    });
//});

function myFunction() {
    document.getElementById("buy").remove();
}
//for button, add onclick="myFunction()", id="buy"
/*        <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="https://github.com/twitter/typeahead.js"></script>*/

