<?php

session_start();

if(!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

include("class_lib.php");

$actualUser = unserialize($_SESSION['user']);

if(!isset($_COOKIE['__theme'])) {
    $theme = 'light';
} else {
    $theme = $_COOKIE['__theme'];
}