<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl9.css">

    <title>Poznaj Europę</title>
</head>
<body>
    <!--Baner-->
    <header>
        <div class="baner">
            <h1>BIURO PODRÓŻY</h1>
        </div>
    </header>

    <main>
        <!--Blok Lewy-->
        <section>
            <div class="lewy">
                <h2>Promocje</h2>
                <table>
                    <tr>
                        <td>Warszawa</td>
                        <td>od 600 zł</td>
                    </tr>

                    <tr>
                        <td>Wenecja</td>
                        <td>od 1200 zł</td>
                    </tr>

                    <tr>
                        <td>Paryż</td>
                        <td>od 1200 zł</td>
                    </tr>
                </table>
            </div>
        </section>

        <!--Blok Środkowy-->
        <article>
            <div class="srodkowy">
                <h2>W tym roku jedziemy do...</h2>
                <!--Skrypt 1-->
                <?php
                    //żądamy pliku z danymi do bazy danych
                    require_once 'database.php';

                    //zmienna przechowująca zapytanie do bazy danych
                    $query = "SELECT zdjecia.nazwaPliku,zdjecia.podpis FROM zdjecia ORDER BY zdjecia.podpis ASC";

                    //wykonanie zapytania do bazy danych
                    $result = $connection->query($query);

                    #wyswietlenie obrazow za pomoca petli for
                    
                        //pobieramy liczbe wierszy przy petli for
                        $num_rows = $result->num_rows;

                        for($i=0; $i<$num_rows; $i++)
                        {
                            //fetchujemy W ciele PETLI
                        $row = $result->fetch_assoc();
                            echo "<img src=\"{$row['nazwaPliku']}\" alt=\"{$row['podpis']}\" title=\"{$row['podpis']}\">";
                        }

                #wyswietlenie obrazow za pomoca petli foreach

                    /* foreach($result as $row)
                        {
                            echo "<img src=\"{$row['nazwaPliku']}\" alt=\"{$row['podpis']}\" title=\"{$row['podpis']}\">";
                        }
                    */

                #wyswietlenie obrazow za pomoca petli while

                    /*while($object = $result->fetch_object())
                        {
                            echo "<img src=$object->nazwaPliku alt=$object->podpis title=$object->podpis>";
                        }
                    */
                ?>
            </div>
        </article>

        <!--Blok Prawy-->
        <section>
            <div class="prawy">
                <h2>Kontakt</h2>
                <a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
                <p>telefon: 444555666</p>
            </div>
        </section>

        <!--Blok z Danymi-->
        <article>
            <div class="dane">
                <h3>W poprzednich latach byliśmy...</h3>
                <ol>
                    <!--Skrypt 2-->
                    <?php
                        //przypisanie zapytania do zmiennej
                        $query = "SELECT wycieczki.cel,wycieczki.dataWyjazdu FROM wycieczki WHERE wycieczki.dostepna=0";

                        //wykonanie zapytania
                        $result = $connection->query($query);

                        #wykonanie skryptu petla FOR

                        //pobieramy liczbe wierszy w zapytaniu
                        $num_rows = $result->num_rows;

                        for($i=0; $i<$num_rows; $i++)
                        {
                            //fetchujemy W ciele PETLI
                            $row = $result->fetch_assoc();

                            echo "<li>Dnia {$row['dataWyjazdu']} pojechaliśmy do {$row['cel']}</li>";
                        }
                        

                        #wykonanie skryptu petla WHILE
                        /*
                        while($object = $result->fetch_object())
                        {
                            echo "<li>Dnia $object->dataWyjazdu pojechaliśmy do $object->cel</li>";
                        }
                        */

                        #wykonanie skryptu petla FOREACH
                        /*
                        foreach($result as $row)
                        {
                            echo "<li>Dnia {$row['dataWyjazdu']} pojechaliśmy do {$row['cel']}</li>";
                        }
                        */

                        //zamkniecie połączenia z baza danych
                        $connection->close();
                    ?>
                </ol>
            </div>
        </article>
    </main>

    <!--Stopka-->
    <footer>
        <div class="stopka">
            <p>Stronę wykonał: HerMat321</p>
        </div>
    </footer>

</body>
</html>