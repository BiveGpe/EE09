<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Prognoza Pogody Wrocław</title>
        <link rel="stylesheet" href="styl2.css">
    </head>
    <body>
        <header>
            <div class="banner" id="b_lewy">
                <img src="logo.png" alt="meteo">
            </div>

            <div class="banner" id="b_srodkowy">
                <h1>Prognoza dla Wrocławia</h1>
            </div>

            <div class="banner" id="b_prawy">
                <p>maj, 2019 r.</p>
            </div>
        </header>

        <main>
            <div id="glowny">
                <table>
                    <thead>
                        <tr>
                            <th>DATA</th> <th>TEMPERATURA W NOCY</th> <th>TEMPERATURA W DZIEN</th> <th>OPADY [mm/h]</th> <th>CIŚNIENIE [hPa]</th>
                        </tr>
                    </thead>

                    <?php
                        $mysqli = new mysqli("localhost", "root", "", "prognoza");
                        $zapytanie = "SELECT * FROM `pogoda` WHERE `miasta_id` = '1' ORDER BY `data_prognozy` ASC;";
                        $wynik = $mysqli->query($zapytanie);
                        while($row = $wynik->fetch_array())
                        {
                            echo 
                            "<tbody>
                            <tr>
                                <td>".$row['data_prognozy']."</td> <td>".$row['temperatura_noc']."</td> <td>".$row['temperatura_dzien']."</td> <td>".$row['opady']."</td> <td>".$row['cisnienie']."</td>
                            </tr>
                        </tbody>
                            ";
                        }
                        $mysqli->close();
                    ?>
                </table>
            </div>
        </main>

        <section>
            <div id="g_lewy">
                <img src="obraz.jpg" alt="Polska, Wrocław">
            </div>

            <div id="g_prawy">
                <a href="EE09 - 17.01A02.txt">Pobierz kwerendy</a>
            </div>
        </section>

        <footer>
            <div id="stopka">
                <a>Strone wykonał: 00000000</a>
            </div>
        </footer>
    </body>
</html>