<?php
    if(isset($_POST['numer']) && isset($_POST['pierwszy']) && isset($_POST['drugi']) &&isset($_POST['trzeci']))
    {
        $numer = $_POST['numer'];
        $pierwszy = $_POST['pierwszy'];
        $drugi = $_POST['drugi'];
        $trzeci = $_POST['trzeci'];

        /*
        echo $numer."<br>";
        echo $pierwszy."<br>";
        echo $drugi."<br>";
        echo $trzeci."<br>";
        */

        $mysqli = new mysqli("localhost","root","","ee09");
        $zapytanie = "INSERT INTO `ratownicy`(`nrKaretki`, `ratownik1`, `ratownik2`, `ratownik3`) VALUES ('".$numer."','".$pierwszy."','".$drugi."','".$trzeci."')";
        $mysqli->query($zapytanie);

        echo "Do bazy danych zostało wysłane zapytanie: ".$zapytanie;

        $mysqli->close();
    }
?>