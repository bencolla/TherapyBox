<?php

include_once "resources/config.inc.php";
if (isset($_SESSION['username'])){
//NEWS
$xml = simplexml_load_file('http://feeds.bbci.co.uk/news/rss.xml');
$namespaces = $xml->getNamespaces(true); // get namespaces

$items = array();
foreach ($xml->channel->item as $entry) {

    $tmp = new stdClass();
    $tmp->title = trim((string) $entry->title);
    $tmp->link  = trim((string) $entry->link);
    $tmp->description  = trim((string) $entry->description);
    $tmp->media_url = trim((string)
    $entry->children($namespaces['media'])->thumbnail->attributes()->url);

    $items[] = $tmp;

    //Only need 1 element
    break;
}
$_SESSION['news'] = $items[0];
//END NEWS


//CLOTHES

$url = "https://therapy-box.co.uk/hackathon/clothing-api.php?username=swapnil&rawdata=json";
$JSON = file_get_contents($url);
$data = json_decode($JSON,TRUE);

foreach ($data['payload'] as $obj) {
    switch ($obj['clothe']){
        case 'hoodie':
            $hoodie++;
            break;
        case 'sweater':
            $sweater++;
            break;
        case 'jacket':
            $jacket++;
            break;
        case 'jumper':
            $jumper++;
            break;
        case 'blazer':
            $blazer++;
            break;
        case 'raincoat':
            $raincoat++;
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Therapybox - Dashboard</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <?php include_once 'header.php'?>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

</head>

<body class="main-background text-white">

<!-- BEGIN DASHBOARD SECTION -->
<section>
        <div class="row">

            <div class="col-lg-12 margin-bottom-xxl">
                <h1 class="text-primary text-white text-center l-s-3">Good Day <?php echo $_SESSION['username']?></h1>
            </div>

            <div class="card contain-md style-transparent" >
                <div class="card-body">
                    <div class="col-md-4">
                        <div class="card card-bordered style-primary">
                            <div class="card-head">
                                <header>Weather</header>
                            </div><!--end .card-head -->
                            <div class="card-body style-default-bright">
                                <div id="weather-icon">

                                </div>
                                <div style="float: right" id="temperature">

                                </div>
                                <p class="text-center" id="location"></p>
                            </div><!--end .card-body -->
                        </div><!--end .card -->
                    </div>
                    <a href="pages/news.php">
                        <div class="col-md-4">
                            <div class="card card-bordered style-primary">
                                <div class="card-head">
                                    <header>News</header>
                                </div><!--end .card-head -->
                                <div class="card-body style-default-bright">
                                    <h4><?php echo $_SESSION['news']->title ?></h4>
                                    <p><?php echo $_SESSION['news']->description ?></p>
                                </div><!--end .card-body -->
                            </div><!--end .card -->
                        </div>
                    </a>
                    <a href="pages/sports.php">
                        <div class="col-md-4">
                            <div class="card card-bordered style-primary">
                                <div class="card-head">
                                    <header>Sport</header>
                                </div><!--end .card-head -->
                                <div class="card-body style-default-bright">
                                    <h4>Sport headline</h4>
                                    <p>A team did very well at something. They scored 3 goals</p>
                                </div><!--end .card-body -->
                            </div><!--end .card -->
                        </div>
                    </a>
                    <div class="clearfix"></div>
                    <a href="pages/images.php">
                        <div class="col-md-4">
                            <div class="card card-bordered style-primary">
                                <div class="card-head">
                                    <header>Photos</header>
                                </div><!--end .card-head -->
                                <div class="card-body style-default-bright">
                                    <?php
                                    $images = getVettoreCompleto("photos","1","photo_id DESC LIMIT 0,4");
                                    foreach ($images as $image){

                                        echo  '<div class="col-md-6"><img src="assets/images/square.jpg" class="thumbnail"></div>';
                                    }
                                    ?>
                                </div><!--end .card-body -->
                            </div><!--end .card -->
                        </div>
                    </a>
                    <div class="col-md-4">
                        <a href="pages/tasks.php">
                            <div class="card card-bordered style-primary">
                                <div class="card-head">
                                    <header>Tasks</header>
                                </div><!--end .card-head -->
                                <div class="card-body style-default-bright">


                                   <?php $tasks = getVettoreCompleto('tasks','1', 'task_id DESC LIMIT 0,3');
                                   foreach($tasks as $task){

                                      echo'<div class="checkbox checkbox-styled">
                                            <label>';

                                       if ($task['complete']=='TRUE'){
                                           echo '<input disabled checked type="checkbox">';
                                       }
                                       else{
                                           echo '<input disabled type="checkbox">';
                                       }

                                        echo'<span>'.$task["description"].'</span>
                                            </label>
                                        </div>';

                                   }
                                   ?>
                                </div><!--end .card-body -->
                            </div><!--end .card -->
                        </a>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-bordered style-primary">
                            <div class="card-head">
                                <header>Clothes</header>
                            </div><!--end .card-head -->
                            <div class="card-body style-default-bright">
                                <input type="hidden" id="hoodie" value="<?php echo $hoodie ?>">
                                <input type="hidden" id="sweater" value="<?php echo $sweater ?>">
                                <input type="hidden" id="jacket" value="<?php echo $jacket ?>">
                                <input type="hidden" id="jumper" value="<?php echo $jumper ?>">
                                <input type="hidden" id="blazer" value="<?php echo $blazer ?>">
                                <input type="hidden" id="raincoat" value="<?php echo $raincoat ?>">
                                <div id="morris-donut-graph" class="height-6" colors="#9C27B0,#2196F3,#0aa89e,#FF9800,#f5f5f5,#2196f3"></div>
                            </div><!--end .card-body -->
                        </div><!--end .card -->
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- END DASHBOARD SECTION -->



<?php include_once 'footer.php'?>
<!-- CUSTOM JS -->
<script src="assets/js/weather.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="assets/js/morris.init.js"></script>


</body>
</html>

<?php }
else {
    header('location:index.php');
}