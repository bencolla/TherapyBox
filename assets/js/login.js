$(document).ready(function() {
    $('#loginform').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'assets/ajax/login.php',
            data: $(this).serialize(),
            success: function(data)
            {
                if (data === 'true') {
                    window.location = 'dashboard.php';
                }
                else {
                    $("#login-error").removeClass("hide").html("Invalid credentials, try again");
                }
            }
        });
    });
});
