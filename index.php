<?php

require_once ('config/config.php');
require_once ('libs/Autoload.php');

// set the value of the $_GET var
$r = isset($_GET['r']) ? $_GET['r'] : 'home/index';

$url = Utils::separateURL($r);

$controller = Utils::checkController($url[0]);
if (!$controller){
    echo "Sorry controller not found";
    die();
}

 if(!Utils::doAction($controller,$url[1])){
     echo "Sorry method not found";
     die;
}


