<?php include("php/index.php"); ?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta name="description" content="aplikacja dla studenta">
<?php include("scripts.html"); ?>
</head>
<body>

<?php include('php/settings-script.php'); ?>
<?php include('menu.html'); ?>

<section <?php echo "class='section hero is-$theme'"; ?> >
    <div class="hero-body">
        <div class="container">

            <h1 class="title">
                Personalizacja motywu:
            </h1>

            <form method="post">
                <div class="field">
                    <div class="control">
                        <div class="select">
                            <select name="theme">
                                <option <?php if ($theme == "light" ) echo 'selected' ; ?> value="light">jasny</option>
                                <option <?php if ($theme == "dark" ) echo 'selected' ; ?> value="dark">ciemny</option>
                                <option <?php if ($theme == "primary" ) echo 'selected' ; ?> value="primary">domyslny</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button class="button">zmień</button>
            </form>

        </div>
    </div>
</section>

<?php include('footer.html'); ?>

</body>
</html>

