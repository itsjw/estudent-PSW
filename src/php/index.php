<?php

session_start();

if(!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

include("class_lib.php");

$actualUser = unserialize($_SESSION['user']);

$theme = $_COOKIE['__theme'];
if(!isset($theme)) {
    $theme = 'light';
}