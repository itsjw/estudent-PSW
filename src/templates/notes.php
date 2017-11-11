<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Notatki</title>
    <meta name="keywords" content="nowy wpis">
    <meta name="description" content="aplikacja dla studenta, nowy wpis">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../assets/images/icon.png">
    <link rel="shortcut icon" type="image/png" href="../assets/images/favicon.ico"/>

    <link rel="stylesheet" href="../styles/menu.css"/>
    <link rel="stylesheet" href="../styles/notes.css"/>

    <script type="text/javascript" src="../scripts/collections.js"></script>
    <script type="text/javascript" src="../scripts/notes.js"></script>
    <script type="text/javascript" src="../scripts/style.js"></script>
</head>
<body class="bright">


<?php

    if (isset($_GET['die'])) {
        die();
    }

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
                array_push($notes,  new ExtendedNote($title, $newContent));
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
        } else if(strlen($content) < 20){
            $contentErr = "zawartosc musi zawierac conajmniej 20 znakow";
            return false;
        }
        return true;
    }
?>

<nav class="menu">
    <ul>
        <li>
            Podstrony
            <ul>
                <li><a name="strona_glowna" href="../templates/home.html">Strona Główna</a></li>
                <li><a href="../templates/about.html">O Nas</a></li>
                <li>Podstrony ->
                    <ul>
                        <li><a href="../templates/home.html">Strona Główna</a></li>
                        <li><a href="../templates/about.html">O Nas</a></li>
                        <li><a href="../templates/register.html">Zarejestruj</a></li>
                        <li><a href="../templates/css_test.html">CSS</a></li>
                    </ul>
                </li>
                <li><a href="../templates/css_test.html">CSS</a></li>
                <li><a href="../templates/notes.php">notatki</a></li>
            </ul>
        </li>
        <li>Costam1</li>
        <li>Costam2
            <ul>
                <li><a href="../templates/about.html">O Nas</a></li>
                <li><a href="../templates/about.html">O Nas</a></li>
                <li>Podstrony ->
                    <ul>
                        <li><a href="../templates/home.html">Strona Główna</a></li>
                        <li><a href="../templates/about.html">O Nas</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>Costam3</li>
    </ul>
</nav>

    <div class="counter"><p id="counter"></p></div>
    <div id="lucky-number"></div>
    <div id="collections"></div>

    <button onclick="changeStyle()">ZMIEN STYLE</button>
    <select id="fonts" onchange="changeFont(this)">
        <option value="Arial">Arial</option>
        <option value="Times New Roman">New Times Roman</option>
    </select>

    <h2>Dodaj notatkę:</h2>

    <form action="" method="POST" class="noteForm">
        <div>
            <label for="title">Tytuł:</label> <br/>
            <input id="title" type="text" name="title" value="<?php echo $title;?>" autofocus>
        </div>* <span class="error"><?php echo $titleErr;?></span>

        <div>
            <label for="content">Zawartosc:</label> <br/>
            <textarea id="content" name="content" cols="70" rows="10"><?php echo $content;?></textarea>
        </div>* <span class="error"><?php echo $contentErr;?></span>

        <br/>
        <button id="submit-form">Dodaj</button>
    </form>

    <h2>Notatki: </h2>
    <div id="notes-list">

<?php
    define("MOJA_STALA", "wartosc nie do zmiany");

    display(json_decode($_COOKIE['notes']));

    function display($notes) {
        $liczba = 1234.1234;
        $liczba = (int) $liczba;
        foreach($notes as &$note) {
            echo "
                <div>
                    <span>Title: $note->title</span>
                    <span id='date'>$note->date</span>
                    <span>Content: $note->content</span>
                    <span>liczba: $liczba</span>
                </div>
            ";
        }
    }

    class Note {
        var $title;
        var $content;
        var $date;

        public function __construct($title, $content) {
            $this->title = $title;
            $this->date = date("j, n, Y");
            $this->content = $content;
        }
    }

    class ExtendedNote extends Note {
        var $extendedVariable;
    }

?>
    </div>
    <h2>Tablica indeksowana numerycznie</h2>
<?php
    $array = array("foo", "bar", "hello", "world");
    var_dump($array);
?>
    <h2>Tablica indeksowana asocjacyjnie</h2>
<?php
    $array = array("zero" => "foo", "jeden" => "bar", "dwa" => "hello");
    var_dump($array);
?>

    <h2>IP ADDRESS <?php echo $_SERVER['REMOTE_ADDR']?></h2>

    <h2>Stala: <?php echo MOJA_STALA ?></h2>

    <h2>Znaki specjalne: <?php echo "&lt; &gt; &amp; &quot;" ?></h2>

    <a href='notes.php?die=true'>DIE</a>
</body>
</html>
