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
        <!--Blok lewy-->
        <article>
            <div class="lewy">
                <h2>Nasze ceny</h2>
                <table>
                    <!--Skrypt 1-->
                    <?php
                        //Łączenie z bazą danych
                        require_once 'database.php';

                        //Zapytanie do bazy
                        $query = "SELECT towary.nazwa,towary.cena FROM towary LIMIT 4";

                        $result = $connection->query($query);

                        //wyswietlenie wynikow za pomoca FOREACH
                        foreach($result as $row)
                        {
                            echo "<tr>
                                    <td>{$row['nazwa']}</td>
                                    <td>{$row['cena']}</td>
                                  </tr>";
                        }
                    ?>
                </table>
            </div>
        </article>

        <!--Blok środkowy-->
        <section>
            <div class="srodkowy">
                <h2>Koszt zakupów</h2>
                <form method="POST">
                    <label for="lista">wybierz artykuł:</label>
                    <select name="lista" id="lista">
                        <option>Zeszyt 60 kartek</option>
                        <option>Zeszyt 32 kartki</option>
                        <option>Cyrkiel</option>
                        <option>Linijka 30 cm</option>
                    </select>

                    <br>

                    <label for="ilosc">liczba sztuk</label>
                    <input type="number" name="ilosc" id="ilosc">

                    <br>
                    
                    <button type="submit" name="przycisk">OBLICZ</button>
                </form>
                <!--Skrypt 2-->
                <?php
                    if(isset($_POST['przycisk']))
                    {
                        //Pobranie danych z formularza
                        $nazwa = $_POST['lista'];
                        $liczba = $_POST['ilosc'];

                        //zapytanie do bazy danych
                        $query = "SELECT towary.cena FROM towary WHERE towary.nazwa=\"$nazwa\"";
                        
                        $result = $connection->query($query);
                        $row = $result->fetch_object();

                        //Przypisanie zmiennych
                        $cena_produktu = $row->cena;
                        $wartosc_zakupow = $cena_produktu * $liczba;

                        echo "<p>obliczona kwota: $wartosc_zakupow</p>";
                    }
                    //Zamkniecie polaczenia
                    $connection->close();
                ?>
            </div>
        </section>

        <!--Blok prawy-->
        <section>
            <div class="prawy">
                <h2>Kontakt</h2>
                <img src="zakupy.png" alt="hurtownia">
                <p><a href="mailto:hurt@poczta2.pl">email: hurt@poczta2.pl</a></p>
            </div>
        </section>
    </main>

    <!--Stopka-->
    <footer>
        <div class="stopka">
            <h4>Witrynę wykonał: HerMar321</h4>
        </div>
    </footer>
</body>
</html>