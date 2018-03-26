<?php

include_once "../../resources/config.inc.php";

extract($_POST);

$data = file_get_contents("http://www.football-data.co.uk/mmz4281/1718/I1.csv");
$rows = explode("\n",$data);
$matches = array();
foreach($rows as $row) {
    $matches[] = str_getcsv($row);
}

$defeated_teams = array();

foreach ($matches as $match){
    if ($match['2'] == $team){
        if($match['6'] == 'H'){

            if(!in_array($match['3'], $defeated_teams)){
                $defeated_teams[]=$match['3'];
            }

        }
    }

    if ($match['3'] == $team){
        if($match['6'] == 'A'){

            if(!in_array($match['2'], $defeated_teams)){
                $defeated_teams[]=$match['2'];
            }

        }
    }

}


if (is_array($defeated_teams)){
    echo json_encode($defeated_teams);
}
else{
    echo 'No results found';
}



