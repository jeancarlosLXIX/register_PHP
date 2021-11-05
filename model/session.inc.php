<?php
#This is for prevent an outsider to insert/see data
session_start();
// var_dump($_SESSION);
// die();
if (!isset($_SESSION['name'])) {
    header("Location: ../index.html");
}