<?php
    if(isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['adres']))
    {
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $adres = $_POST['adres'];

        $mysqli = new mysqli("localhost", "root", "", "wedkowanie");
        $zapytanie1 = "INSERT INTO `karty_wedkarskie` (`imie`, `nazwisko`, `adres`, `data_zezwolenia`, `punkty`) VALUES ( '".$imie."', '".$nazwisko."', '".$adres."', '".NULL."', '".NULL."');";

        $mysqli->query($zapytanie1);
        $mysqli->close();
        
        echo $imie."<br>";
        echo $nazwisko."<br>";
        echo $adres."<br>";
    }
?>