<?php
include_once __DIR__."/includes/autoloder.inc.php";
session_start(); #it's importan to have this here
$obj = new Query();


foreach ($_POST as $key => $value) {
        switch ($key) {
            case 'newUser' :
                $obj->insertUser();
                break ;
            case 'addPC' :
                //Working
                $obj->insertD();
                header("Location: index.php");
                exit();
                break ;

           case 'login':
                $obj->verifyUser();
                break;
         }
     }
