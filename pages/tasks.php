<!DOCTYPE html>
<html lang="en">
<head>
    <title>Therapybox - Tasks</title>

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
                <div class="">

                    <!-- BEGIN BLOG POST HEADER -->
                    <div class="row style-primary">
                        <div class="col-sm-12">
                            <div class="card-body">
                                <h2>Tasks</h2>
                            </div>
                        </div><!--end .col -->
                    </div><!--end .row -->
                    <!-- END BLOG POST HEADER -->

                    <div class="row">

                        <!-- BEGIN BLOG POST TEXT -->
                        <div class="col-md-6 col-md-offset-3" style="margin-top: 20px; margin-bottom: 20px;">
                            <?php $tasks = getVettoreCompleto('tasks','1', 'task_id');
                            foreach($tasks as $task){


                                echo '<div class="input-group">
													<div class="input-group-addon">
														<div class="checkbox checkbox-inline checkbox-styled">
															<label>';
                                                            if ($task['complete']=='TRUE'){
                                                                echo '<input class="update_check" rel="'.$task['task_id'].'"  checked type="checkbox">';
                                                            }
                                                            else{
                                                                echo '<input class="update_check" rel="'.$task['task_id'].'"  type="checkbox">';
                                                            }
                                echo '						<span></span>
															</label>
														</div>
													</div>
													<div class="input-group-content">
														<input class="form-control update_input" value="'.$task['description'].'" rel="'.$task['task_id'].'" type="text">							
													</div>
												</div>';
                            }
                            ?>
                            <br>
                            <a href="" id="add_row">
                            <img style="max-width: 30px" src="../assets/images/plus_button_small.png">
                            </a>
                        </div><!--end .col -->
                        <!-- END BLOG POST TEXT -->

                    </div><!--end .row -->
                </div><!--end .card -->
            </div><!--end .col -->
        </div><!--end .row -->
    </div>
</section>


<?php include_once '../footer.php'?>
<script src="../assets/js/tasks.js"></script>
<!-- CUSTOM JS -->
</body>
</html>
