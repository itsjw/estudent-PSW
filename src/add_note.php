<?php include("php/index.php"); ?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta name="description" content="aplikacja dla studenta">
    <link rel="stylesheet" href="styles/add-note.css"/>
    <?php include("scripts.html"); ?>
</head>
<body>

<?php

$title = $content = "";
$titleErr = $contentErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST) {
        $notes = json_decode($_COOKIE['notes']);
        if (is_null($notes)) {
            $notes = [];
        }
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST['content']);

        if(validateData($title, $content)) {
            $newContent = preg_replace('/xxx/', 'yyy', $content);
            if(strcmp($title, 'bad title')) {
                $title = "good title";
            }
            array_push($notes, new Note($title, $newContent));
            setcookie("notes", json_encode($notes));
        }
    }
}

function validateData($title, $content) {
    global $titleErr, $contentErr;

    if(empty($title)) {
        $titleErr = "pole wymagane!";
        return false;
    }

    if(empty($content)) {
        $contentErr = "pole wymagane!";
        return false;
    }
    return true;
}
?>

<?php include('menu.php'); ?>

<section <?php echo "class='section hero is-$theme'"; ?> >
    <div class="hero-body">
        <div class="container">

            <h1 class="title">Dodaj nową notatkę:</h1>

            <form action="notes_list.php" method="POST" class="noteForm">

                <div class="control">
                    <input class="input" type="text" placeholder="Tytuł" autofocus>
                </div>
                <?php echo $titleErr;?>

                <div class="field-body">
                    <textarea class="textarea" placeholder="Zawartość"></textarea>
                </div>
                <?php echo $contentErr;?>

                <a class="button pull-right is-primary">Dodaj</a>
            </form>

        </div>
    </div>
</section>

<?php include('footer.html'); ?>

</body>
</html>

