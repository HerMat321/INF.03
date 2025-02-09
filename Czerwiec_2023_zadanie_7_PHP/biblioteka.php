<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!--Baner-->
    <header>
        <div class="baner">
            <h1>Biblioteka w Książkowicach Małych</h1>
        </div>
    </header>

    
    <main>
        <!--Lewy-->
        <article>
            <div class="lewy">
                <h4>Dodaj czytelnika</h4>

                <form method="POST">
                    <label for="imie">imię</label>
                    <input type="text" id="imie" name="imie">
                    <br>
                    <label for="nazwisko">nazwisko</label>
                    <input type="text" id="nazwisko" name="nazwisko">
                    <br>
                    <label for="symbol">symbol</label>
                    <input type="number" id="symbol" name="symbol">
                    <br>
                    <button name="przycisk" type="submit">AKCEPTUJ</button>
                </form>

                <!--Skrypt 1-->
                <?php
                    #Otwarcie polaczenia z baza danych
                    require_once "database.php";

                    if(isset($_POST['przycisk']))
                    {   
                        #Dane pobrane z formularza
                        $imie = $_POST['imie'];
                        $nazwisko = $_POST['nazwisko'];
                        $symbol = $_POST['symbol'];

                        #Zapytanie SQL
                        $query = "INSERT INTO czytelnicy (id,imie,nazwisko,kod) VALUES (NULL,\"$imie\",\"$nazwisko\",$symbol)";

                        #Wykonanie zapytania
                        $connection->query($query);

                        #Komunikat o dodaniu czytelnika
                        echo "Dodano czytelnika $imie $nazwisko";
                    }
                ?>
            </div>
        </article>

        <!--Srodkowy-->
        <nav>
            <div class="srodkowy">
                <img src="biblioteka.png" alt="biblioteka">
                <h6>ul. Czytelników&nbsp;15; Ksiązkowice Małe</h6>
                <p><a href="mailto:biuro@bib.pl">Czy masz jakieś uwagi?</a></p>
            </div>
        </nav>

        <!--Prawy-->
        <section>
            <div class="prawy">
                <h4>Nasi czytelnicy:</h4>
                <ol>
                    <!--Skrypt 2-->
                    <?php
                        #Zapytanie SQL
                        $query = "SELECT czytelnicy.imie,czytelnicy.nazwisko FROM czytelnicy ORDER BY czytelnicy.nazwisko ASC";

                        #Wynik zapytania
                        $result = $connection->query($query);

                        #Wyswietlenie listy za pomoca petli FOREACH
                        foreach($result as $row)
                        {
                            echo "<li>{$row['imie']} {$row['nazwisko']}</li>";
                        }

                        $connection->close();
                    ?>
                </ol>
            </div>
        </section>
    </main>

    <!--Stopka-->
    <footer>
        <div class="stopka">
            <p>Projekt witryny: HerMat321</p>
        </div>
    </footer>
</body>
</html>