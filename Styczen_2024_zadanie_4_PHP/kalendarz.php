<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl6.css">

    <title>Zadania na lipiec</title>
</head>
<body>
    
    <header>
        <!--Baner 1-->
        <section>
            <div class="baner1">
                <img src="logo1.png" alt="lipiec">
            </div>
        </section>

        <!--Baner 2-->
        <section>
            <div class="baner2">
                <h1>TERMINARZ</h1>
                <p>najbliższe zadania: 
                    <!--Skrypt 1-->
                    <?php
                        require_once "database.php";

                        //przypisanie zapytania do zmiennej
                        $query = 'SELECT DISTINCT zadania.wpis FROM zadania WHERE zadania.dataZadania BETWEEN "2020-07-01" AND "2020-07-07" AND zadania.wpis != ""';

                        //wykonanie zapytania
                        $result = $connection->query($query);

                        //pobranie liczby wierszy
                        $num_rows = $result->num_rows;

                        //wykonanie petla FOR
                        for($i=0; $i<$num_rows; $i++)
                        {
                            $row = $result->fetch_assoc();
                            echo "{$row['wpis']}; ";
                        }

                        //wykonanie petla FOREACH
                        /*
                        foreach($result as $row)
                        {
                            echo "{$row['wpis']}; ";
                        }
                        */

                        //wykonanie petla WHILE
                        /*
                        while($object = $result->fetch_object())
                        {
                            echo "$object->wpis; ";
                        }
                        */

                    ?>

                </p>
            </div>
        </section>
    </header>

    <main>
        <!--Główny-->
        <article>
            <div class="glowny">
                <!--Skrypt 2-->
                <?php
                    //przypisanie zapytania do zmiennej
                    $query = 'SELECT zadania.dataZadania , zadania.wpis FROM zadania WHERE zadania.dataZadania LIKE "%%%%-07-%%"';
                    
                    //wykonanie zapytania
                    $result = $connection->query($query);

                    //pobranie liczby wierszy
                    $num_rows = $result->num_rows;

                    //wykonanie petla FOR
                    for($i=0; $i<$num_rows; $i++)
                    {
                        $row = $result->fetch_assoc();
                        echo "<div class=\"kalendarz\">
                                    <h6>{$row['dataZadania']}</h6>
                                    <p>{$row['wpis']}</p>
                                </div>";
                    }

                    //wykonanie petla WHILE
                    /*
                    while($object = $result->fetch_object())
                    {
                        echo "<div class=\"kalendarz\">
                                    <h6>$object->dataZadania</h6>
                                    <p>$object->wpis</p>
                                </div>";
                    }
                    */

                    //wykonanie petla FOREACH
                    /*
                    foreach($result as $row)
                    {
                        echo "<div class=\"kalendarz\">
                                    <h6>{$row['dataZadania']}</h6>
                                    <p>{$row['wpis']}</p>
                                </div>";
                    }
                    */

                    //zamkniecie polaczenia z baza danych
                    $connection->close();
                ?>
            </div>
        </article>
    </main>

    <footer>
        <!--Stopka-->
        <div class="stopka">
            <a href="sierpien.html">Terminarz na sierpień</a>
            <p>Stronę wykonał: HerMat321</p>
        </div>
    </footer>
</body>
</html>