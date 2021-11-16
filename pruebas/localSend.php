<?php
session_start();
require_once "./localQuery.php";

$obj = new Query();

#close session
if(count($_POST) === 0){
    session_destroy();
    header("Location: index.html");
    
}

foreach ($_POST as $key => $value) {
        switch ($key) {
            case 'newUser' :
                $obj->insertUser();
                break ;
            case 'addPC' :
                //Working
                
                $obj->insertD();
                header("Location: addP.php");
                break ;

           case 'login':
                $obj->verifyUser();
                break;
         }
     }
