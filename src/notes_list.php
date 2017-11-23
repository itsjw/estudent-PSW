<?php include("php/index.php"); ?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta name="description" content="aplikacja dla studenta">
    <?php include("scripts.html"); ?>
</head>
<body>

<?php
include('menu.php');
?>

<section <?php echo "class='section hero is-$theme'"; ?> >
    <div class="hero-body">
    <div class="container">

    <h1 class="title">
        Lista notatek:
    </h1>

<?php
if (empty($_COOKIE['notes'])) {
    echo "brak notatek";
}

if (isset($_COOKIE['notes'])) {
    display(json_decode($_COOKIE['notes']));
}

function display($notes)
{
    foreach ($notes as &$note) {
        echo "
        
        <div class=\"box\">
            <article class=\"media\">
                <div class=\"media-left\">
                    <figure class=\"image is-64x64\">
                        <img src=\"https://bulma.io/images/placeholders/128x128.png\" alt=\"Image\">
                    </figure>
                </div>
                <div class=\"media-content\">
                    <div class=\"content\">
                        <p>
                            <strong>John Smith</strong>
                            <small>@johnsmith</small>
                            <small>$note->title</small>
                            <br>
                            $note->content
                        </p>
                    </div>
                    <nav class=\"level is-mobile\">
                        <div class=\"level-left\">
                            <a class=\"level-item\">
                                <span class=\"icon is-small\"><i class=\"fa fa-reply\"></i></span>
                            </a>
                            <a class=\"level-item\">
                                <span class=\"icon is-small\"><i class=\"fa fa-retweet\"></i></span>
                            </a>
                            <a class=\"level-item\">
                                <span class=\"icon is-small\"><i class=\"fa fa-heart\"></i></span>
                            </a>
                        </div>
                    </nav>
                </div>
            </article>
        </div>
";
    }
}

?>
    </div>
</section>

<?php
include('footer.html');
?>

</body>
</html>

