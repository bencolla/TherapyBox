$(document).ready(function() {

    $("#team").on('change', function () {

        $.post("../assets/ajax/defeated_teams.php", { team: $(this).val() })
            .done(function(data) {
                if (data == "No results found") {
                    $('#result').html("No results found");
                }
                else {
                    var result = JSON.parse(data);
                    $('#result').html('');
                    $.each(result, function (i, item) {
                        $('#result').append(item+'<br>');
                    });
                }
            });
    });
});

