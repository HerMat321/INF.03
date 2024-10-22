<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">

    <title>Sklep dla uczniów</title>
</head>
<body>
    <!--Baner-->
    <header>
        <div class="baner">
            <h1>Dzisiejsze promocje naszego sklepu</h1>
        </div>
    </header>

    <main>
        <!--Lewy-->
        <section>
            <div class="lewy">
                <h2>Taniej o 30%</h2>
                <ol>
                    <!--Skrypt 1-->
                    <?php
                        require_once 'database.php';

                        $query = "SELECT towary.nazwa FROM towary WHERE towary.promocja=1";

                        $result = $connection->query($query);

                        //FOREACH
                        /*
                        foreach($result as $row)
                        {
                            echo "<li>{$row['nazwa']}</li>";
                        }
                        */

                        //FOR
                        /*
                        $num_rows = $result->num_rows;
                        for($i=0; $i<$num_rows; $i++)
                        {
                            $row = $result->fetch_object();
                            echo "<li>$row->nazwa</li>";
                        }
                        */

                        //WHILE
                        while($row = $result->fetch_assoc())
                        {
                            echo "<li>{$row['nazwa']}</li>";
                        }
                    ?>
                </ol>
            </div>
        </section>

          <!--Srodkowy-->
          <section>
            <div class="srodkowy">
                <h2>Sprawdź cenę</h2>

                <form method="POST">
                    <select name="towar">
                        <option>Gumka do mazania</option>
                        <option>Cienkopis</option>
                        <option>Pisaki 60 szt.</option>
                        <option>Markery 4 szt.</option>
                    </select>

                    <button type="submit" name="przycisk">SPRAWDŹ</button>
                </form>

                <section>
                    <div class="wynik">
                        <!--Skrypt 2-->
                        <?php
                        if (isset($_POST['towar']))
                        {
                            $towar = $_POST['towar'];
                        
                            $query = "SELECT towary.cena FROM towary WHERE towary.nazwa=\"{$towar}\"";
                        }
                            

                            $result = $connection->query($query);

                            if(isset($_POST['przycisk']))
                            {
                                //FOREACH
                                /*
                                foreach($result as $row)
                                {
                                    $cena_promocyjna = $row['cena'] * 0.3;
                                    echo "cena regularna: {$row['cena']}";
                                    echo "<br>";
                                    echo "cena w promocji 30%: {$cena_promocyjna}";
                                }
                                */

                                   //FOR
                                    /*
                                    $num_rows = $result->num_rows;
                                    for($i=0; $i<$num_rows; $i++)
                                    {
                                        $row = $result->fetch_assoc();
                                        $cena_promocyjna = $row['cena'] * 0.3;
                                        echo "cena regularna: {$row['cena']}";
                                        echo "<br>";
                                        echo "cena w promocji 30%: {$cena_promocyjna}";
                                    }
                                    */

                                    //WHILE
                                    while($row = $result->fetch_object())
                                    {
                                        $cena_promocyjna = $row->cena * 0.3;
                                        echo "cena regularna: $row->cena";
                                        echo "<br>";
                                        echo "cena w promocji 30%: {$cena_promocyjna}";
                                    }
                                    

                            }
                            //Zamkniecie polaczenia
                            $connection->close()
                        ?>
                    </div>
                </section>
            </div>
        </section>

          <!--Prawy-->
          <section>
            <div class="prawy">
                <h2>Kontakt</h2>
                <p>e-mail: <a href="mailto:bok@sklep.pl">bok@sklep.pl</a></p>
                <img src="promocja.png" alt="promocja">
            </div>
        </section>
    </main>

    <footer>
        <div class="stopka">
            <h4>Autor strony: HerMat321</h4>
        </div>
    </footer>
</body>
</html>