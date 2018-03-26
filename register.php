<!DOCTYPE html>
<html lang="en">


<head>
    <title>Therapybox - Register</title>

    <?php include_once 'header.php'?>
    <link type="text/css" rel="stylesheet" href="assets/libs/dropzone/dropzone.css" />
</head>

<body class="main-background text-white">

<!-- BEGIN LOGIN SECTION -->
<section>
    <form id="registerform" class="form" role="form">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-primary text-white text-center l-s-3">Hackathon</h1>
            </div>

            <div class="card contain-sm style-transparent">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group floating-label">
                                <input class="form-control" name="username" required id="username" type="text">
                                <label for="username">Username</label>
                            </div>
                            <div class="form-group floating-label">
                                <input class="form-control" name="password" required id="password" type="password">
                                <label for="password">Password</label>
                            </div>
                        </div><!--end .col -->
                        <div class="col-sm-5 col-sm-offset-1">
                            <div class="form-group floating-label">
                                <input class="form-control" name="email" id="email" required type="email">
                                <label for="email">Email</label>
                            </div>
                            <div class="form-group floating-label">
                                <input class="form-control" name="confirm_password" required id="confirm_password" type="password">
                                <label for="confirm_password">Confirm password</label>
                            </div>
                        </div><!--end .col -->
                    </div><!--end .row -->
                    <div id="register-error" class="alert alert-callout alert-danger hide" role="alert">
                </div><!--end .card-body -->
            </div>


            <div class="col-md-12 text-center">
                <button class="btn btn-yellow btn-raised btn-long" type="submit">Register</button>
            </div>

        </div>
    </form>

</section>

<div class="card-body no-padding upload-background col-md-4 col-md-offset-4">
    <form action="assets/ajax/upload.php" class="dropzone dz-clickable" id="my-awesome-dropzone">
        <div class="dz-message text-center">
            <h3>Add picture</h3>
        </div>
    </form>
</div>
<!-- END LOGIN SECTION -->


<?php include_once 'footer.php'?>
<!-- CUSTOM JS -->
<script src="assets/js/register.js"></script>
<script src="assets/libs/dropzone/dropzone.min.js"></script>


</body>
</html>