$(document).ready(function() {
    $('#registerform').submit(function(e) {
        e.preventDefault();
        if ($('#password').val() == $('#confirm_password').val()){

            $.ajax({
                type: "POST",
                url: 'assets/ajax/register.php',
                data: $('#registerform').serialize(),
                success: function(data)
                {
                    if (data === 'true') {
                        window.location = 'dashboard.php';
                    }
                    else if(data === 'Already online') {
                        $("#register-error").removeClass("hide").html("You already have an account");
                    }
                    else{
                        $("#register-error").removeClass("hide").html("Connection error");
                    }
                }
            });

        }
        else{
            $("#register-error").removeClass("hide").html("Password not matches!");
        }

    });
});
