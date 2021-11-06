<?php

spl_autoload_register('myAutoloader');

function myAutoloader($className){

    $fullPath = "../model/$className.class.php";

    if(!file_exists($fullPath)) {
        echo "Workingn't";
        return false;
    }
    
    require($fullPath);
}

