<?php
include_once "./query.class.php";
session_start(); #it's importan to have this here
$obj = new Query();

// var_dump($_POST);
// die();

#close session
if(count($_POST) === 0){
    session_destroy();
    header("Location: ../index.html");
    
}

foreach ($_POST as $key => $value) {
        switch ($key) {
            case 'newUser' :
                $obj->insertUser();
                break ;
            case 'addPC' :
                //Working
                $obj->insertD();
                header("Location: ../view/add.php");
                exit();
                break ;

           case 'login':
                $obj->verifyUser();
                break;
         }
     }
