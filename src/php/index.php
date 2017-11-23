<?php

include("class_lib.php");

$theme = $_COOKIE['__theme'];
if(!isset($theme)) {
    $theme = 'light';
}