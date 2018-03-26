$(document).ready(function() {

    $(".update_check").on('change', function () {
        var value = '';
        if( $(this).val() == 'on'){
             value = 'TRUE';
        }
        else {
             value = 'FALSE';
        }

        $.post("../assets/ajax/tasks_value.php", { value: value, id: $(this).attr('rel'), case:'check'})
            .done(function(data) {
                if (data == "done") {
                    location.reload();
                }
                else {
                    alert('connection error');
                }
            });
    });

    $(".update_input").on('change', function () {

        $.post("../assets/ajax/tasks_value.php", { value: $(this).val(), id: $(this).attr('rel'), case:'input'})
            .done(function(data) {
                if (data == "done") {
                    location.reload();
                }
                else {
                    alert('connection error');
                }
            });

    });

    $("#add_row").on('click', function () {

        $.post("../assets/ajax/tasks_value.php", { value: $(this).val(), id: $(this).attr('rel'), case:'new'})
            .done(function(data) {
                if (data == "done") {
                    location.reload();
                }
                else {
                    alert('connection error');
                }
            });

    });


});

