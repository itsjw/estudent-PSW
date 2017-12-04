<?php

session_start();

include("php/class_lib.php");

if(isset($_SESSION['user'])) {
    $actualUser = unserialize($_SESSION['user']);
    $_SESSION['fr_imie'] = $actualUser->imie;
    $_SESSION['fr_email'] = $actualUser->email;
    $_SESSION['fr_haslo1'] = $actualUser->haslo;
    $_SESSION['fr_haslo2'] = $actualUser->haslo;
}

if (isset($_POST['email'])) {
    $wszystko_OK=true;

    $imie = $_POST['imie'];

    if ((strlen($imie)<3) || (strlen($imie)>20)) {
        $wszystko_OK=false;
        $_SESSION['e_imie']="Imie musi posiadać od 3 do 20 znaków!";
    }

    if (ctype_alnum($imie)==false) {
        $wszystko_OK=false;
        $_SESSION['e_imie']="Imie może składać się tylko z liter i cyfr (bez polskich znaków)";
    }

    // Sprawdź poprawność adresu email
    $email = $_POST['email'];
    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

    if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email)) {
        $wszystko_OK=false;
        $_SESSION['e_email']="Podaj poprawny adres e-mail!";
    }

    $haslo1 = '';
    $haslo2 = '';

    //Sprawdź poprawność hasła
    if(isset($_POST['haslo1'])) {
        $haslo1 = $_POST['haslo1'];
    }
    if(isset($_POST['haslo2'])) {
        $haslo2 = $_POST['haslo2'];
    }

    if ( (strlen($haslo1)<8) || (strlen($haslo1)>20)) {
        $wszystko_OK=false;
        $_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
    }

    if ($haslo1!=$haslo2) {
        $wszystko_OK=false;
        $_SESSION['e_haslo']="Podane hasła nie są identyczne!";
    }

    //Zapamiętaj wprowadzone dane
    $_SESSION['fr_imie'] = $imie;
    $_SESSION['fr_email'] = $email;
    $_SESSION['fr_haslo1'] = $haslo1;
    $_SESSION['fr_haslo2'] = $haslo2;

    require_once "php/connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    try {
        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
        if ($polaczenie->connect_errno!=0) {
            throw new Exception(mysqli_connect_errno());
        }
        else {
            if(!isset($actualUser)) {
                //Czy email już istnieje?
                $rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");

                if (!$rezultat) throw new Exception($polaczenie->error);

                $ile_takich_maili = $rezultat->num_rows;
                if ($ile_takich_maili > 0) {
                    $wszystko_OK = false;
                    $_SESSION['e_email'] = "Istnieje już konto przypisane do tego adresu e-mail!";
                }
            }

            if ($wszystko_OK==true) {
                if(!isset($actualUser)) {
                    if ($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$imie', '$haslo1', '$email')")) {
                        $_SESSION['udanarejestracja']=true;
                        header('Location: login.php');
                    } else {
                        throw new Exception($polaczenie->error);
                    }
                } else {
                    $id = $actualUser->id;
                    if ($polaczenie->query("UPDATE uzytkownicy SET imie = '$imie', haslo = '$haslo1', email = '$email' WHERE id = $id")) {
                        $_SESSION['user'] = serialize(new User(
                            $id,
                            $imie,
                            $email,
                            $haslo1
                        ));
                        header("Refresh:0");
                        $_SESSION['udanaedycja']=true;
                    } else {
                        throw new Exception($polaczenie->error);
                    }
                }
            }

            $polaczenie->close();
        }

    } catch(Exception $e) {
        echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
        echo '<br />Informacja developerska: '.$e;
    }
}

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <?php include("scripts.html"); ?>
    <style>
        .error {
            color:red;
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

<?php
if(isset($actualUser)) {
    include('menu.php');
}
?>

<section class="hero is-light is-fullheight">
    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="column is-4 is-offset-4">
                <div class="box">

<form method="post">
    <div class="field">
        <div class="control">
            Imie:
            <input class="input is-large" type="text" autofocus value="<?php
            if (isset($_SESSION['fr_imie'])) {
                echo $_SESSION['fr_imie'];
                unset($_SESSION['fr_imie']);
            }
            ?>" name="imie" />
        </div>
    </div>

    <?php
    if (isset($_SESSION['e_imie'])) {
        echo '<div class="error">'.$_SESSION['e_imie'].'</div>';
        unset($_SESSION['e_imie']);
    }
    ?>

    <div class="field">
        <div class="control">
            E-mail
            <input class="input is-large" type="text" value="<?php
            if (isset($_SESSION['fr_email'])) {
                echo $_SESSION['fr_email'];
                unset($_SESSION['fr_email']);
            }
            ?>" name="email" />
        </div>
    </div>

    <?php
    if (isset($_SESSION['e_email'])) {
        echo '<div class="error">'.$_SESSION['e_email'].'</div>';
        unset($_SESSION['e_email']);
    }
    ?>

    <div class="field">
        <div class="control">
            Hasło
            <input class="input is-large" type="password" value="<?php
            if (isset($_SESSION['fr_haslo1'])) {
                echo $_SESSION['fr_haslo1'];
                unset($_SESSION['fr_haslo1']);
            }
            ?>" name="haslo1" />
        </div>
    </div>

    <?php
    if (isset($_SESSION['e_haslo'])) {
        echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
        unset($_SESSION['e_haslo']);
    }
    ?>

    <div class="field">
        <div class="control">
            Powtórz hasło
            <input class="input is-large" type="password" value="<?php
            if (isset($_SESSION['fr_haslo2'])) {
                echo $_SESSION['fr_haslo2'];
                unset($_SESSION['fr_haslo2']);
            }
            ?>" name="haslo2" />
        </div>
    </div>

    <input class="button is-fullwidth is-info is-large" type="submit" value="<?php
    if (!isset($_SESSION['user'])) {
        echo "Zarejestruj się";
    } else {
        echo "Edytuj dane";
    }
    ?>" />

    <?php
    if(isset($_SESSION['udanaedycja'])) {
        echo "<span style=\"color: green\">Edycja danych przebiegła pomyślnie</span>";
        unset($_SESSION['udanaedycja']);
    }
    ?>

</form>
                </div>
                <?php
                if(!isset($_SESSION['user'])) {
                    echo    "<p class=\"has-text-grey\">
                                ·&nbsp; <a href=\"login.php\">Powrót do logowania</a> &nbsp;·&nbsp;
                            </p>";
                }
                ?>
            </div>
        </div>
    </div>
</section>

</body>
</html>