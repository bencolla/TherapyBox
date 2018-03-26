<?php
if(!isset($_SESSION))
{
	session_start();
}

// DATI DI CONNESSIONE AL DB
$db_host = "db_host";
$db_user = "username";
$db_password = "db_password";
$db_name = "database_test";
$dbLink=connettiDB($db_host, $db_user, $db_password, $db_name);


// COSTANTI DEFINE

define('NOME_SW', "Therapybox");
define('PATH', $_SERVER['DOCUMENT_ROOT']."/TherapyBox/" );
define('URL', "https://www.benwebdeveloper.com/");
define('URL_SITO', 'https://www.benwebdeveloper.com/TherapyBox/');
define('PREFISSO', "therapybox");

include_once 'funzioni_global.php';


function connettiDB($db_host, $db_user, $db_password, $db_name)
{
	$dbLink = mysqli_connect($db_host, $db_user, $db_password, $db_name);

	if ($dbLink == FALSE)
		die ("Connection error to DB");

	return $dbLink;
}


function diagnosi()
{
	echo "POST<br /><pre>";
	print_r($_POST);
	echo "</pre>";
	echo "GET<br /><pre>";
	print_r($_GET);
	echo "</pre>";
	echo "<br /><br />SESSIONE<br /><pre>";
	print_r($_SESSION);
	echo "</pre>";
	exit();
}

function diagnosiVettore($vettore)
{
	echo "<br /><pre>";
	print_r($vettore);
	echo "</pre>";
}
