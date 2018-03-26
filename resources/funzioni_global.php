<?php

//Create a new line
function creaDato($tabella, $campi, $valori, $no_escape="FALSE")
{
    global $dbLink;
    $tabella=mysqli_real_escape_string($dbLink, $tabella);


    $stringaCampi="";
    $stringaValori="";
    foreach ($campi as $campo)
    {
        $stringaCampi.="`".mysqli_real_escape_string($dbLink, $campo)."`, ";
    }


    foreach ($valori as $valore)
    {
        if ($no_escape=="TRUE") {
            $stringaValori.="\"".$valore."\", ";
        }
        else {
            $stringaValori.="\"".mysqli_real_escape_string($dbLink, $valore)."\", ";
        }
    }

    $res=mysqli_query($dbLink, "SHOW COLUMNS FROM ".PREFISSO."_".$tabella." WHERE Extra='auto_increment'")
    or die("Errore query g10 ".$tabella." ".mysqli_error($dbLink));
    $campi=array();
    while ($riga=mysqli_fetch_array($res))
    {
        $id_univoco=$riga["Field"];
    }
    $sql="INSERT INTO ".PREFISSO."_".$tabella." ( ".$id_univoco.", ".$stringaCampi." `creation_date`) VALUES ('', ".$stringaValori."  \"".now()."\")";
    mysqli_query($dbLink, $sql)
    or die("Errore query g11 ".$sql." ".mysqli_error($dbLink));
    return mysqli_insert_id($dbLink);

}

//Set fields and values with given ID
function setDato($tabella, $id, $campo, $valore)
{
    global $dbLink;

    $tabella=mysqli_real_escape_string($dbLink, $tabella);
    $id=mysqli_real_escape_string($dbLink, $id);
    $campo=mysqli_real_escape_string($dbLink, $campo);
    $valore=mysqli_real_escape_string($dbLink, $valore);

    $res=mysqli_query($dbLink, "SHOW COLUMNS FROM ".PREFISSO."_".$tabella." WHERE Extra='auto_increment'")
    or die("Errore query g12");
    $campi=array();
    while ($riga=mysqli_fetch_array($res))
    {
        $id_univoco=$riga["Field"];
    }
    $res = mysqli_query($dbLink, "UPDATE ".PREFISSO."_".$tabella." SET `".$campo."`=\"".$valore."\" WHERE ".$id_univoco."='".$id."'") or die("Errore query g13");
}

//Get DB array with where condition
function getVettoreCompleto($tabella, $clausola="1", $sort="")
{
	global $dbLink;
	$dati=array();
	$res=mysqli_query($dbLink, "SHOW COLUMNS FROM ".PREFISSO."_".$tabella)
	or die("Errore query g22 ".$tabella);
	$campi=array();
	while ($riga=mysqli_fetch_array($res))
	{
		$campi[]=$riga["Field"];
	}
	$i=0;
	if ($sort!="")
	{
		$sort=" ORDER BY ".$sort;
	}

	$sql = "SELECT * FROM  ".PREFISSO."_".$tabella." WHERE ".$clausola . $sort;
	$res=mysqli_query($dbLink, $sql)
	or die("Errore query g23 ".mysqli_error($dbLink)."\n--\n query: ".$sql);
	while ($riga=mysqli_fetch_array($res))
	{
		foreach($campi as $campo)
		{
			$dati[$i][$campo]=trim($riga[$campo]);
		}
		$i++;
	}

	return $dati;
}


function sanitize($data)
{
    global $dbLink;
    // remove whitespaces (not a must though)
    $data = trim($data);

    // apply stripslashes if magic_quotes_gpc is enabled
    if(get_magic_quotes_gpc())
    {
        $data = stripslashes($data);
    }

    // a mySQL connection is required before using this function
    $data = mysqli_real_escape_string($dbLink, $data);

    return $data;
}

function sanitize_file_name( $filename ) {
    $name= preg_replace("[^\w\s\d\.\-_~,;:\[\]\(\]]", '', $filename);
    $name=str_replace(" ", "_", $name);
    return $name;
}


function now(){
    return date('Y-m-d H:i:s');
}


function resize_image($file, $w, $h, $crop=FALSE) {
    list($width, $height) = getimagesize($file);
    $r = $width / $height;
    if ($crop) {
        if ($width > $height) {
            $width = ceil($width-($width*abs($r-$w/$h)));
        } else {
            $height = ceil($height-($height*abs($r-$w/$h)));
        }
        $newwidth = $w;
        $newheight = $h;
    } else {
        if ($w/$h > $r) {
            $newwidth = $h*$r;
            $newheight = $h;
        } else {
            $newheight = $w/$r;
            $newwidth = $w;
        }
    }
    $src = imagecreatefromjpeg($file);
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    return $dst;
}
