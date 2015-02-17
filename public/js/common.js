function ref(id) {
    $("#ref-modal").modal();
    $.getJSON("reference.php",
        {
            "id": id
        }, function(data) {
            if(data.sx) {
                $("#ref-content").html(data.content);
            } else {
                $("#ref-content").html("Could not fetch reference! Please try again.")
            }
        });
}

function startCountdown(timeLeft) {
    var tl = parseInt(timeLeft);

    setInterval(function() {
        if(tl <= 0) {
            document.location = "logout.php";
        }

        tl--;
        var minutes = parseInt( tl / 60 ) % 60;
        var seconds = tl % 60;
        $("#timer").html(minutes + " mins, " + seconds + " secs remaining");
    }, 1000);
}

$(document).ready(function() {

    var saved = $("#saved");
    saved.hide();

    $(".res-inp").click(function() {
        $.getJSON("response.php",
            {
                "res": $(this).val()
            }).done(function(data) {
                if(data.sx) {
                    saved.fadeIn(300);
                    saved.fadeOut(3000);
                }
            });
    });

    $(".res-text-inp").keypress(function(e) {
        var key = e.which;

        if(key == 13) {
            $.getJSON("response.php",
                {
                    "res": $(this).attr("data-id"),
                    "c": $(this).val(),
                    "t": "text"
                }).done(function(data) {
                    if(data.sx) {
                        saved.fadeIn(300);
                        saved.fadeOut(3000);
                    }
                });
        }
    });
});