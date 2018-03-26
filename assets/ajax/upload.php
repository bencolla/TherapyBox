<?php
include_once '../../resources/config.inc.php';

// Maximum file size
$maxsize = 10; //Mb
// File size control
if ($_FILES['file']['size'] > ($maxsize * 1048576)) {
    $r->error = "Max file size: $maxsize Kb";
}

// Uploading folder
$folder = PATH.'repo/';
if (!is_dir($folder)){
    mkdir($folder);
}


$path_parts = pathinfo($_FILES["file"]["name"]);
$filename = $path_parts['filename'];
$extension = $path_parts['extension'];

$crypt=substr(sha1(@microtime()), 0, 10);

$nomeFile= sanitize_file_name($filename )."_".$crypt."_".$id_link;
$nomeFileCompleto= sanitize_file_name($filename )."_".$crypt."_".$id_link.".".strtolower($extension);

move_uploaded_file($_FILES["file"]["tmp_name"], $folder.$nomeFileCompleto);


//Didn't have time to complete the function
//resize_image(‘/path/to/some/image.jpg’, 280, 280);

$campi=array("type","file");
$valori=array('image', $nomeFileCompleto);

creaDato("photos", $campi, $valori);

echo "ok";