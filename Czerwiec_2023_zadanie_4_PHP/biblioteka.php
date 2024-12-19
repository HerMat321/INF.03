<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka publiczna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!--Baner-->
    <header>
        <div class="baner">
            <h1>Biblioteka w Ksiązkowicach Wielkich</h1>
        </div>
    </header>

    <!--3 główne bloki-->
    <main>
        <!--Lewy-->
        <article>
            <div class="lewy">
                <h3>Polecamy dzieła autorów</h3>
                <ol>
                    <!--Skrypt 1-->
                    <?php
                        #Otwarcie polaczenia z baza danych
                        require_once "database.php";

                        #Zapytanie SQL
                        $query = "SELECT autorzy.imie,autorzy.nazwisko FROM autorzy ORDER BY autorzy.nazwisko ASC";

                        #Wykonanie zapytania
                        $result = $connection->query($query);
                        
                        #Pobranie ilosci wierszy z tabeli (potrzebne do petli FOR)
                        $num_rows = $result->num_rows;

                        #Wyswietlenie listy za pomoca petli FOR
                        /*
                        for($i=0; $i<$num_rows; $i++)
                        {
                            $row = $result->fetch_object();
                            echo "<li>$row->imie $row->nazwisko</li>";
                        }
                        */

                        #Petla WHILE
                        /*
                        while($row = $result->fetch_assoc())
                        {
                            echo "<li>{$row['imie']} {$row['nazwisko']}</li>";
                        }
                        */

                        #Petla FOREACH
                        foreach($result as $row)
                        {
                            echo "<li>{$row['imie']} {$row['nazwisko']}</li>";
                        }
                    ?>
                </ol>
            </div>
        </article>

        <!--Srodkowy-->
        <section>
            <div class="srodkowy">
                <h3>ul.Czytelnicza 25,Książkowice&nbsp;Wielkie</h3>
                <p><a href="mailto:sekretariat@biblioteka.pl">Napisz do nas</a></p>
                <img src="biblioteka.png" alt="książki">
            </div>
        </section>

        <!--Prawy-->
        <section>
            <!--Górny-->
            <div class="prawyG">
                <h3>Dodaj czytelnika</h3>
                <form method="POST">
                    <label for="imie">Imie:</label>
                    <input type="text" id="imie" name="imie">
                    <br>
                    <label for="nazwisko">Nazwisko:</label>
                    <input type="text" id="nazwisko" name="nazwisko">
                    <br>
                    <label for="symbol">Symbol:</label>
                    <input type="number" id="symbol" name="symbol">
                    <br>
                    <button type="submit" name="przycisk">DODAJ</button>
                </form>
            </div>

            <!--Dolny-->
            <div class="prawyD">
                <!--Skrypt 2-->
                <?php
                    #Pobranie danych z formularza
                    if(isset($_POST['przycisk']))
                    {
                        $imie = $_POST['imie'];
                        $nazwisko = $_POST['nazwisko'];
                        $symbol = $_POST['symbol'];
                        
                        #Zapytanie SQL
                        $query = "INSERT INTO czytelnicy (`id`, `imie`, `nazwisko`, `kod`) VALUES (NULL,'$imie','$nazwisko','$symbol')";

                        #Wykonanie zapytania
                        if($result = $connection->query($query))
                        {
                            echo "Czytelnik \"$imie\" \"$nazwisko\" został(a) dodany do bazy dancyh";
                        }

                    }

                    #Zamkniecie polaczenia z baza danych
                    $connection->close();
                ?>
            </div>
        </section>
    </main>

    <!--Stopka-->
    <footer>
        <div class="stopka">
            <p>Projekt strony: HerMat321</p>
        </div>
    </footer>
</body>
</html>