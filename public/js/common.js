function ref(id) {
    $("#ref-modal").modal();
}

$(document).ready(function() {
    $(".res-inp").click(function() {
        $.getJSON("response.php",
            {
                "res": $(this).val()
            });
    });
});