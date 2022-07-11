<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Twój wskaźnik BMI</title>
		<link rel="stylesheet" href="styl4.css">
		
	</head>
	<body>
		<header>
			<div id="baner">
				<h2>Oblicz wskaźnik BMI</h2>
			</div>
		
			<div id="logo">
				<img src="wzor.png" alt="liczymy BMI">
			</div>
		</header>

		<section>
			<div id="lewy">
				<img src="rys1.png" alt="zrzuć kalorie!">
			</div>
		
			<div id="prawy">
				<h1>Podaj dane</h1>
			
				<form action="waga.php" method="post">
					<label for="waga">Waga: </label><input type="number" name="waga"><br>
					<label for="wzrost">Wzrost [cm]: </label><input type="number" name="wzrost"><br>
					<input type="submit" value="Licz BMI i zapisz wynik" name="guzik">
				</form>

				<?php
					if(isset($_POST['waga']) && isset($_POST['wzrost']) && isset($_POST['guzik']))
					{
						$waga = $_POST['waga'];
						$wzrost = $_POST['wzrost'];

						$wynik = ($waga/($wzrost*$wzrost))*10000;

						echo "Twoja Waga: ".$waga." Twój wzrost: ".$wzrost."<br>"."BMI wynosi: ".$wynik;

						if($wynik < 19)
						{
							$zmienna = 1;
						}
						elseif($wynik >= 19 && $wynik < 26)
						{
							$zmienna = 2;
						}
						elseif($wynik >= 26 && $wynik < 31)
						{
							$zmienna = 3;
						}
						else
						{
							$zmienna = 4;
						}
						$mysqli = new mysqli("localhost", "root", "", "egzamin");
						$zapytanie1 = "INSERT INTO `wynik` (`bmi_id`,`data_pomiaru`,`wynik`) VALUES('".$zmienna."', '".date("Y-m-d")."', '".$wynik."');";
						$wynik1 = $mysqli->query($zapytanie1);
						$mysqli->close();
					}
				?>
			</div>
		
		</section>

		<main>
			<div id="główny">
				<table>
					<thead>
						<tr>
							<th>lp</th> <th>interpretacja</th> <th>zaczyna sie od...</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$mysqli = new mysqli("localhost", "root", "", "egzamin");
							$zapytanie2 = "SELECT `id`,`informacja`,`wart_min` FROM `bmi` WHERE 1;";
							$wynik2 = $mysqli->query($zapytanie2);
							while($row = $wynik2->fetch_array())
							{
								echo "<tr>
									<td>".$row['id']."</td>
									<td>".$row['informacja']."</td>
									<td>".$row['wart_min']."</td>
								</tr>";
							}
							$mysqli->close();
						?>
					</tbody>
				</table>
			</div>
		</main>

		<footer>
			<div id="stopka">
				<a>Autor: 00000000</a>
				<a href="kw2.jpg">Wynik działania kwerendy 2</a>
			</div>
		</footer>
		
	</body>
</html>