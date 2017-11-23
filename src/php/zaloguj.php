<?php

session_start();

require "class_lib.php";

$loginy_i_hasla = array(
    new User('janek', 'haslo123'),
    new User('tomek', 'tajnehaslo'),
    new User('grzegorz', 'mojehaslo')
);

$login = $_POST['login'];
$haslo = $_POST['haslo'];

$user = new User($login, $haslo);

if(in_array($user, $loginy_i_hasla)) {

    $_SESSION['user'] = serialize($user);
    unset($_SESSION['blad']);

    header('Location: ../index.php');
} else {
    $_SESSION['blad'] = '<span style="color: red">Nieprawidłowy login lub hasło</span>';
    header('Location: ../login.php');
}

