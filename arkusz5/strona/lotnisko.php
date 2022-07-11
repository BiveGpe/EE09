<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Port Lotniczy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header>
        <div id="b_lewy">
            <img src="zad5.png" alt="logo lotnisko">
        </div>

        <div id="b_srodkowy">
            <h1>Przyloty</h1>
        </div>

        <div id="b_prawy">
            <h3>przydatne linki</h3>
            <a href="EE_09_2021_01_05.txt">Pobierz...</a>
        </div>
    </header>

    <main>
        <div id="glowny">
            <table>
                <thead>
                    <tr>
                        <th>czas</th> <th>kierunek</th> <th>numer rejsu</th> <th>status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $mysqli = new mysqli("localhost", "root", "", "egzamin");
                        $zapytanie = "SELECT `czas`,`kierunek`,`nr_rejsu`,`status_lotu` FROM `przyloty` ORDER BY `czas` ASC;";
                        $wynik = $mysqli->query($zapytanie);

                        while($row = $wynik->fetch_array())
                        {
                            echo "
                                <tr>
                                    <td>".$row['czas']."</td> <td>".$row['kierunek']."</td> <td>".$row['nr_rejsu']."</td> <td>".$row['status_lotu']."</td>
                                </tr>
                            ";
                        }

                        $mysqli->close();
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    
    <footer>
        <div id="s_lewy">
            <?php
                if(isset($_COOKIE['ciastko']))
                {
                    if(isset($_COOKIE['ciastko2']))
                    {
                        echo "<p>Witaj ponownie</p>";
                    }
                    else
                    {
                        echo "<p>Dzień dobry! Strona lotniska używa ciasteczek</p>";
                        setcookie("ciastko2","0",time()+60*60*2);
                    }
                }
                else
                {
                    setcookie("ciastko","0",time()+60*60*2);
                }
            ?>
        </div>

        <div id="s_prawy">
            <a>Autor: 00000000</a>
        </div>
    </footer>
</body>
</html>