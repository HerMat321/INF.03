<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep dla uczniów</title>

    <!--Połączony arkusz stylów-->
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <!--Baner-->
    <header>
        <div class="baner">
            <h1>Dzisiejsze promocje naszego sklepu</h1>
        </div>
    </header>

    <!--3 bloki główne-->
    <main>
        <!--Lewy-->
        <article>
            <div class="lewy">
                <h2>Taniej o 30%</h2>
                <ol>
                    <!--Skrypt 1-->
                    <?php
                        #Otwarcie polaczenia z baza danych
                        require_once "database.php";

                        #Zapytanie SQL
                        $query = "SELECT towary.nazwa FROM towary WHERE towary.promocja=1";

                        #Wykonanie zapytania
                        $result = $connection->query($query);

                        #Wyswietlenie wynikow petlą WHILE
                        /*
                        while($row = $result->fetch_assoc())
                        {
                            echo "<li>{$row['nazwa']}</li>";
                        }
                        */

                        #Wyswietlenie wynikow petlą FOREACH
                        /*
                        foreach($result as $row)
                        {
                            echo "<li>{$row['nazwa']}</li>";
                        }
                        */

                        #Wyswietlenie wynikow petlą FOR

                        //Pobieramy liczbę wierszy z tabeli bazy danych
                        $num_rows = $result->num_rows;

                        for($i=0; $i<$num_rows; $i++)
                        {
                            //Przy petli for fetchujemy w ciele pętli
                            $row = $result->fetch_object();
                            echo "<li>$row->nazwa</li>";
                        }
                    ?>
                </ol>
            </div>
        </article>

        <!--Srodkowy-->
        <section>
            <div class="srodkowy">
                <h2>Sprawdź cenę</h2>
                <form method="POST">
                    <select name="przedmiot">
                        <option>Gumka do mazania</option>
                        <option>Cienkopis</option>
                        <option>Pisaki 60
                            szt.</option>
                        <option>Markery 4 szt.</option>
                    </select>

                    <button type="submit" name="przycisk">SPRAWDŹ</button>
                    <!--Skrypt 2-->
                    <?php
                        //Sprawdzamy czy przedmiot został wybrany
                        if(isset($_POST['przedmiot']))
                        {
                            //Jezeli zostal wybrany przypisujemy wynik do zmiennej
                            $towar = $_POST['przedmiot'];

                            //Zapytanie SQL
                            $query = "SELECT towary.cena FROM towary WHERE towary.nazwa=\"$towar\"";

                            //Wykonanie zapytania SQL
                            $result = $connection->query($query);

                            //Przypisanie do zmiennej ceny przedmiotu
                            $row = $result->fetch_object();
                            $cena = $row->cena;
                            $cena_rabat = $cena - ($cena*0.30);
                        }
                        

                    ?>
                </form>

                <!--Wynik działania skryptu 2-->
                <div class="wynik">
                    <?php
                        //Jezeli uzytkownik wcisnal przycisk
                        if(isset($_POST['przycisk']))
                        {
                            //Wyswietlenie ceny z rabatem
                            echo "cena regularna: $cena";
                            echo "<br>";
                            echo "cena w promocji 30%: $cena_rabat";
                        }
                        #Zamkniecie polaczenia z baza danych
                        $connection->close();
                    ?>
                </div>
            </div>
        </section>

         <!--Prawy-->
         <section>
            <div class="prawy">
                <h2>Kontakt</h2>
                <p>e-mail: <a href="mailto:box@sklep.pl">bok@sklep.pl</a></p>
                <img src="promocja.png" alt="promocja">
            </div>
        </section>
    </main>

    <!--Stopka-->
    <footer>
        <div class="stopka">
            <h4>Autor strony: HerMat321</h4>
        </div>
    </footer>
</body>
</html>