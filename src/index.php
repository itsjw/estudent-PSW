<!doctype html>
<html class="no-js" lang="">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>eStudent</title>
        <meta name="description" content="aplikacja dla studenta">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="assets/images/icon.png">
        <link rel="shortcut icon" type="image/png" href="assets/images/favicon.ico"/>
        <link rel="stylesheet" href="styles/menu.css"/>

        <script src="scripts/main.js"></script>
    </head>

    <body>

        <nav class="menu">
            <ul>
                <li>
                    Podstrony
                    <ul>
                        <li><a href="templates/home.html">Strona Główna</a></li>
                        <li><a href="templates/about.html">O Nas</a></li>
                        <li>Podstrony ->
                            <ul>
                                <li><a href="templates/home.html">Strona Główna</a></li>
                                <li><a href="templates/about.html">O Nas</a></li>
                                <li><a href="templates/register.html">Zarejestruj</a></li>
                                <li><a href="templates/css_test.html">CSS</a></li>
                            </ul>
                        </li>
                        <li><a href="templates/css_test.html">CSS</a></li>
                        <li><a href="templates/notes.php">notatki</a></li>
                    </ul>
                </li>
                <li>Costam1</li>
                <li>Costam2
                    <ul>
                        <li><a href="templates/about.html">O Nas</a></li>
                        <li><a href="templates/about.html">O Nas</a></li>
                        <li>Podstrony ->
                            <ul>
                                <li><a href="templates/home.html">Strona Główna</a></li>
                                <li><a href="templates/about.html">O Nas</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>Costam3</li>
            </ul>
        </nav>

        <article>
            <header>
                <h2>Nagłowek artykułu</h2>
            </header>
            <section class="opinia">
                <h2>Lorem</h2>
                <p><i>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</i></p>
            </section>
            <section class="opinie_uzytkownikow">
                <h2>Lorem</h2>
                <article class="opinia_uzytkownika">
                    <h2>Lorem</h2>
                    <p>Curabitur quis bibendum odio. </p>
                    <footer>
                        <p>
                            Wysłane
                            <time datetime="2015-05-16 19:00">May 16</time>
                            przez Ania.
                        </p>
                    </footer>
                </article>
                <article class="opinia_uzytkownika">
                    <h2>Lorem</h2>
                    <p>Maecenas sit amet dolor id quam ornare interdum.</p>
                    <footer>
                        <p>
                            Wysłane
                            <time datetime="2015-05-17 19:00">May 17</time>
                            przez Tomek.
                        </p>
                    </footer>
                </article>
            </section>
            <footer>
                <p>
                    Wysłane
                    <time datetime="2015-05-15 19:00">May 15</time>
                    przez Administrator.
                </p>
            </footer>

            <aside>
                tresct poboczna, nie mająca związku z artykułem
            </aside>
        </article>

        <div>
            Ile procent do ukonczenia
            <meter min="0" max="100" value="50"></meter>
        </div>
        <div>
            Do zapamietania: <mark>Lorem ipsum dolor sit amet</mark>
        </div>
        <div>
            <details>
                <summary>SPOILER!</summary>
                <p>Lorem ipsum dolor sit amet</p>
            </details>
        </div>

        <?php
        if ($_POST) {
            echo '<pre>';
            echo htmlspecialchars(print_r($_POST, true));
            echo '</pre>';
        }

        $var = new Directory();
        $Var = 'Joe';
        echo "$var, $Var";

        ?>

        <form action="" method="post">
            Nazwisko: <input type="text" name="personal[nazwisko]"><br />
            Email: <input type="text" name="personal[email]"><br />
            Piwo: <br />
            <select multiple name="piwo[]">
                <option value="zywiec">Żywiec</option>
                <option value="tyskie">Tyskie</option>
                <option value="lech">Lech</option>
            </select><br />
            <input type="submit" value="Wyślij mnie!" />
        </form>

    </body>
</html>

