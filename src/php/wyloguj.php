<?php

session_start();

require "class_lib.php";

session_unset();

header('Location: ../login.php');

