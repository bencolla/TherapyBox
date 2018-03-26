<!DOCTYPE html>
<html lang="en">
<head>
    <title>Therapybox - News</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="News internal page">
    <!-- END META -->

    <?php
    include_once '../header.php';
    include_once "../resources/config.inc.php";
    ?>


</head>

<body class="main-background text-white">

<section>
    <div class="section-body contain-lg">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-tiles style-default-light">

                    <!-- BEGIN BLOG POST HEADER -->
                    <div class="row style-primary">
                        <div class="col-sm-12">
                            <div class="card-body style-default-dark">
                                <h2>News</h2>
                            </div>
                        </div><!--end .col -->
                    </div><!--end .row -->
                    <!-- END BLOG POST HEADER -->

                    <div class="row">

                        <!-- BEGIN BLOG POST TEXT -->
                        <div class="col-md-12">
                            <article class="style-default-bright">
                                <div>
                                    <img class="img-responsive" src="<?php echo $_SESSION['news']->media_url ?>" alt="" />
                                </div>
                                <div class="card-body">
                                    <p class="lead"><?php echo $_SESSION['news']->title ?></p>
                                    <p><?php echo $_SESSION['news']->description ?></p>
                                    <br/>
                                </div><!--end .card-body -->
                            </article>
                        </div><!--end .col -->
                        <!-- END BLOG POST TEXT -->

                    </div><!--end .row -->
                </div><!--end .card -->
            </div><!--end .col -->
        </div><!--end .row -->
    </div>
</section>


<?php include_once '../footer.php'?>
<!-- CUSTOM JS -->
</body>
</html>
