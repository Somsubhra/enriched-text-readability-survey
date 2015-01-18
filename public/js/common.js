var t = 0;

function setT0(t0) {
    t = t0;
}

$(document).ready(function() {
    setInterval(function() {
        t++;
    }, 1000);
    $(".res-inp").click(function() {
        $.getJSON("response.php",
            {
                "res": $(this).val(),
                "t": t
            });
    });
});