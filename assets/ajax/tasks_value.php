<?php

include_once "../../resources/config.inc.php";

extract($_POST);

switch ($case){

    case 'check':
        setDato('tasks',$id,'complete',$value);
        break;
    case 'input':
        setDato('tasks',$id,'description',$value);
        break;
    case 'new':
        creaDato('tasks','','');
        break;


}

echo 'done';

