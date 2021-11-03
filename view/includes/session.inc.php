<?php
#This is for prevent an outsider to insert/see data
session_start();

if (!isset($_SESSION['name'])) {
    header("Location: login.html");
}