<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">

    <title>Hurtownia szkolna</title>
</head>
<body>
    <!--Baner-->
    <header>
        <div class="baner">
            <h1>Hurtownia z najlepszymi cenami</h1>
        </div>
    </header>

    <main>
        <!--Lewy-->
        <section>
            <div class="lewy">
                <h2>Nasze ceny</h2>
                <table>
                    <!--Skrypt 1-->
                    <?php
                        #Otwarcie polaczenia z baza danych
                        require_once "database.php";

                        #Przypisanie zapytania SQL
                        $query = "SELECT towary.nazwa,towary.cena FROM towary LIMIT 4";

                        #Wykonanie zapytania SQL
                        $result = $connection->query($query);

                        #Pobranie ilosci wierszej potrzebnej do pętli FOR
                        $num_rows = $result->num_rows;

                        //Wyswietlenie wyników za pomocą pętli FOR
                        /*
                        for($i=0; $i<$num_rows; $i++)
                        {
                            $row = $result->fetch_object();
                            echo "<tr><td>$row->nazwa</td><td>$row->cena</td></tr>";

                        }
                        */

                        //WHILE
                        /*
                        while($row = $result->fetch_array())
                        {
                            echo "<tr><td>{$row['nazwa']}</td><td>{$row['cena']}</td></tr>";
                        }
                        */

                        //FOREACH
                        foreach($result as $row)
                        {
                            echo "<tr><td>{$row['nazwa']}</td><td>{$row['cena']}</td></tr>";
                        }
                    ?>
                </table>
            </div>
        </section>

        <!--Srodkowy-->
        <article>
            <div class="srodkowy">
                <h2>Koszt zakupów</h2>

                <form method="POST">
                    <label for="artykul">wybierz artykuł: </label>
                    <select id="artykul" name="artykul">
                        <option>Zeszyt 60 kartek</option>
                        <option>Zeszyt 32 kartki</option>
                        <option>Cyrkiel</option>
                        <option>Linijka 30 cm</option>
                    </select>
                    <br>
                    <label for="ilosc">liczba sztuk: </label>
                    <input type="number" id="ilosc" name="ilosc">
                    <br>
                    <button type="submit" name="przycisk">OBLICZ</button>
                </form>
                <!--Skrypt 2-->
                <?php
                    #Sprawdzenie czy przycisk został wciśniety
                    if(isset($_POST['przycisk']))
                    {

                        #Pobranie danych z formularza
                        $artykul = $_POST['artykul'];
                        $ilosc = $_POST['ilosc'];

                        #Zapytanie SQL
                        $query = "SELECT towary.cena FROM towary WHERE towary.nazwa=\"$artykul\"";

                        #Wykonanie zapytania SQL
                        $result = $connection->query($query);
                        $row = $result->fetch_object();
                        $cena = $row->cena;

                        $cena_towaru = $cena * $ilosc;
                        echo "<p>wartość zakupów: $cena_towaru </p>";
                    }
                    
                    #Zamkniecie połączenia z bazą danych
                    $connection->close();
                ?>
            </div>
        </article>

        <!--Prawy-->
        <section>
            <div class="prawy">
                <h2>Kontakt</h2>
                <img src="zakupy.png" alt="hurtownia">
                <p>email: <a href="mailto:hurt@poczta2.pl">hurt@poczta2.pl</a></p>
            </div>
        </section>
    </main>

    <!--Stopka-->
    <footer>
        <div class="stopka">
            <h4>Witrynę wykonał: HerMat321</h4>
        </div>
    </footer>
</body>
</html>