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

$(document).ready(function() {
    $(".res-inp").click(function() {
        $.getJSON("response.php",
            {
                "res": $(this).val()
            });
    });
});