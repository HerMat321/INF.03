<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poznaj Europę</title>
    <link rel="stylesheet" href="styl9.css">

</head>
<body>
    <!--Baner-->
    <header>
        <div class="baner">
            <h1>BIURO PODRÓŻY</h1>
        </div>
    </header>

    <main>
        <!--Lewy-->
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

        <!--Srodkowy-->
        <article>
            <div class="srodkowy">
                <h2>W tym roku jedziemy do...</h2>
                <!--Skrypt 1-->
                <?php
                    require_once 'database.php';

                    $query = "SELECT zdjecia.nazwaPliku,zdjecia.podpis FROM zdjecia ORDER BY zdjecia.podpis ASC";

                    $result = $connection->query($query);

                    //Wyswietlenie obrazow za pomoca petli FOREACH
                    /*
                    foreach($result as $row)
                    {
                        echo "<img src=\"{$row['nazwaPliku']}\" alt=\"{$row['podpis']}\" title=\"{$row['podpis']}\">";
                    }
                    */

                    //Wyswietlenie obrazu za pomoca petli FOR

                    /*
                    $num_rows = $result->num_rows;
                    
                    for($i=0; $i<$num_rows; $i++)
                    {
                        $row = $result->fetch_assoc();
                        echo "<img src=\"{$row['nazwaPliku']}\" alt=\"{$row['podpis']}\" title=\"{$row['podpis']}\">";
                    }
                    */

                    //Wyswietlenie obrazow za pomoca petli WHILE
                    while($object = $result->fetch_object())
                    {
                        echo "<img src=\"$object->nazwaPliku\" alt=\"$object->podpis\" title=\"$object->podpis\">";
                    }
                    
                ?>
            </div>
        </article>

        <!--Prawy-->
        <section>
            <div class="prawy">
                <h2>Kontakt</h2>
                <a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
                <p>telefon: 444555666</p>
            </div>
        </section>
    </main>

      <!--Dane-->
    <section>
        <div class="dane">
            <h3>W poprzednich latach byliśmy...</h3>
            <ol>
                <?php
                    $query = "SELECT wycieczki.cel,wycieczki.dataWyjazdu FROM wycieczki WHERE wycieczki.dostepna=0";

                    $result = $connection->query($query);

                    //FOREACH
                    /*
                    foreach($result as $row)
                    {
                        echo "<li>Dnia {$row['dataWyjazdu']} pojechaliśmy do {$row['cel']}</li>";
                    }
                    */

                    //FOR
                    /*
                    $num_rows = $result->num_rows;
                    
                    for($i=0; $i<$num_rows; $i++)
                    {
                        $object = $result->fetch_object();
                        echo "<li>Dnia $object->dataWyjazdu pojechaliśmy do $object->cel</li>";
                    }
                    */

                    //WHILE
                    while($object = $result->fetch_object())
                    {
                        echo "<li>Dnia $object->dataWyjazdu pojechaliśmy do $object->cel</li>";
                    }

                    //zamkniecie polaczenia
                    $connection->close();
                ?>
            </ol>
        </div>
    </section>

    <!--Stopka-->
    <footer>
        <div class="stopka">
            <p>Stronę wykonał: HerMat321</p>
        </div>
    </footer>


</body>
</html>