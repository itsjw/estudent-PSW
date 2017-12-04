<?php
    session_start();
    if(isset($_SESSION['user'])) {
        header('Location: index.php');
        exit();
    }
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta name="description" content="aplikacja dla studenta">
    <?php include("scripts.html"); ?>
</head>
<body>

<section class="hero is-light is-fullheight">
    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="column is-4 is-offset-4">
                <div class="box">
                    <figure class="avatar">
                        <img src="assets/images/tile.png">
                    </figure>

                    <form action="php/zaloguj.php" method="post">
                        <div class="field">
                            <div class="control">
                                <input name="login" class="input is-large" type="text" placeholder="Twój login" autofocus="">
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <input name="haslo" class="input is-large" type="password" placeholder="Twoje hasło">
                            </div>
                        </div>
                        <button class="button is-fullwidth is-info is-large">Zaloguj</button>
                        <?php if(isset($_SESSION['blad'])) echo $_SESSION['blad'] ?>
                    </form>
                    <?php
                    if(isset($_SESSION['udanarejestracja'])) {
                        echo "<span style=\"color: green\">Rejestracja przebiegła pomyślnie. Można się zalogować.</span>";
                        unset($_SESSION['udanarejestracja']);
                    }
                    ?>

                </div>
                <p class="has-text-grey">
                    ·&nbsp; <a href="edit-user.php">Zarejestruj się</a> &nbsp;·&nbsp;
                </p>
            </div>
        </div>
    </div>
</section>
</body>