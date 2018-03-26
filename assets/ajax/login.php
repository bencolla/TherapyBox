<?php

include_once "../../resources/config.inc.php";

extract($_POST);



if (isset($username) && isset($password))
{

    $username=sanitize(htmlspecialchars(str_replace("\n","",strtolower($username)),ENT_QUOTES));
    $password=sanitize($password);

    $sql="SELECT * FROM ".PREFISSO."_users WHERE username='".$username."' AND password='".md5($password)."'";
    $res=mysqli_query($dbLink, $sql) or die ("Error l1");
    while ($riga=mysqli_fetch_array($res))
    {
        if ($riga['user_id']){
            if(!isset($_SESSION))
            {
                session_start();
            }
            $_SESSION['username']=$riga['username'];
            $_SESSION['email']=$riga['email'];
            echo "true";
        }

    }

}

