<?php

include_once "../../resources/config.inc.php";

extract($_POST);

if (isset($username) && isset($password))
{

    $username=sanitize(htmlspecialchars(str_replace("\n","",strtolower($username)),ENT_QUOTES));
    $password=sanitize($password);


    //Check if users is already registerd
    $user = getVettoreCompleto('users','username = "'.$username.'" OR email="'.$email.'"','')[0];
    if ($user['user_id']>0){

        echo "Already online";
    }
    else{
        $fields = array('username','email','password');
        $values = array($username,$email,md5($password));
        $id_user = creaDato('users',$fields,$values);
        if ($id_user){
            if(!isset($_SESSION))
            {
                session_start();
            }
            $_SESSION['username']=$username;
            $_SESSION['email']=$email;
            echo "true";
        }
    }



}

