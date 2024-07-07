<?php
    //Skrypt polaczenia z baza danych

    $host = "127.0.0.1"; //moze byc tez localhost
    $user = "root";
    $password = "";
    $database = "podroze";

    $connection = new mysqli($host,$user,$password,$database);