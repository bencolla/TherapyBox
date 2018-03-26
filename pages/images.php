<!DOCTYPE html>
<html lang="en">

<head>
    <title>Therapybox - Images</title>

    <?php
    include_once '../header.php';
    include_once "../resources/config.inc.php";
    ?>
    <link type="text/css" rel="stylesheet" href="../assets/libs/dropzone/dropzone.css" />
</head>

<body class="main-background text-white">

<!-- BEGIN LOGIN SECTION -->
<section>
        <div class="row">
            <br>
            <div class="col-md-3 upload-image">
                <form action="../assets/ajax/upload.php" class="dropzone dz-clickable" id="my-awesome-dropzone">
                    <div class="dz-message text-center">
                        <img src="../assets/images/plus_button.png">
                    </div>
                </form>
            </div>

            <?php
            $photos = getVettoreCompleto('photos','1','');
            foreach ($photos as $photo){
                echo  '<div class="col-md-3"><img src="../repo/'.$photo["file"].'" class="thumbnail"></div>';
            }
            ?>
        </div>
</section>


<?php include_once '../footer.php'?>
<!-- CUSTOM JS -->
<script src="../assets/libs/dropzone/dropzone.min.js"></script>


</body>
</html>