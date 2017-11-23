<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST) {
        $theme = htmlspecialchars($_POST['theme']);
        setcookie("__theme", $theme, time() + 24 * 60 * 60);
    }
}

