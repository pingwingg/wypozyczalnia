<?php
function tworz_naglowek_html($tytul) {
	// wyświetlenie nagłówka HTML
	?>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />


<title><?php echo $tytul;?></title>


<!-- CSS - definicja -->
<link rel="stylesheet" type="text/css" href="css.css" />


<!-- Bootstrap core CSS -->
<link href="./css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="sticky-footer.css" rel="stylesheet">

</head>

<body>
	<div class="container">
		<div class="header">
			<div class="jumbotron">
				<h2>
					<b>Wypożyczalnia filmów</b>
				</h2>

				<!--wciecie w menu-->
				<div class="collapse navbar-collapse"
					id="bs-example-navbar-collapse-1">
					<blockquote>
						<h3>Nowości w ofercie:</h3>
						<p class="lead">
							<img src="http://1.fwcdn.pl/po/10/89/1089/7196615.5.jpg"
								alt="Plakat" border="0" align="left" valign="bottom" height="85"
								width="60" /> <img
								src="http://1.fwcdn.pl/po/33/90/583390/7441162.5.jpg"
								alt="Plakat" border="0" align="left" valign="bottom" height="85"
								width="60" /> <img
								src="http://1.fwcdn.pl/po/10/19/1019/7386645.5.jpg" alt="Plakat"
								border="0" align="left" valign="bottom" height="85" width="60" />
						</p>
					</blockquote>
				</div>
			</div>
		</div>
		<hr />
<?php
	if ($tytul) {
		tworz_tytul_html ( $tytul );
	}
}

// wyświetlenie stopki HTML
function tworz_stopke_html() {
	?>
  </div>
	</div>
	</div>
	<footer class="footer">
		<div class="container" style="background: Gainsboro">
			<p class="muted credit">Wypożyczalnia XYZ</p>
		</div>
	</footer>
	<!-- sktypty odpowiadaja za tworzenie tabeli -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script
		src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
<?php
}

	// wyświetlenie tytułu
function tworz_tytul_html($tytul) {
	?>
<h2><?php echo $tytul;?></h2>
<?php
}
function tworz_HTML_URL($url, $nazwa) {
	// wyświetlenie URL-a jako łącza i nowa linia
	?>
<br />
<a href="<?php echo $url;?>"><?php echo $nazwa;?></a>
<br />
<?php
}

function wyswietl_informacje_witryny() {
	// wyświetlenie informacji marketingowych
	?>
<div class="row marketing">
	<div class="col-lg-8">
		<div>
			<a href="filmy/1.php"><img src="filmy/1.jpg" alt="Plakat"
				border="0" align="left" valign="bottom" height="85" width="60" />
			<h4>
				Ojciec chrzestny II</a>
			</h4>
			<p>Obsada: Al Pacino, Robert Duvall, Diane Keaton</p>
		</div>
		<br> <br>

		<div>
			<a href="filmy/2.php"><img src="filmy/2.jpg" alt="Plakat"
				border="0" align="left" valign="bottom" height="85" width="60" />
			<h4>
				Skazani na Shawshank</a>
			</h4>
			<p>Obsada: Tim Robbins, Morgan Freeman, Bob Gunton</p>
		</div>

		<br> <br>

		<div>
			<a href="filmy/3.php"><img src="filmy/3.jpg" alt="Plakat"
				border="0" align="left" valign="bottom" height="85" width="60" />
			<h4>
				Dwunastu gniewnych ludzi</a>
			</h4>
			<p>Obsada: Martin Balsam, John Fiedler,  Lee J. Cobb</p>
		</div>
		
		<br> <br>
		
		<div>
		<a href="filmy/4.php">	<img src="filmy/4.jpg" alt="Plakat"
				border="0" align="left" valign="bottom" height="85" width="60" />
			<h4>
				Władca Pierścieni: Powrót króla</a>
			</h4>
			<p>Obsada: 'Elijah Wood, Sean Astin, Dominic Monaghan'</p>
		</div>
	</div>  
  <?php
}

// wyswietlenie zamowien
function wyswietlZamowienia() {
	?>
<div class="row marketing">
		<div class="col-lg-8">
			<div>
			<?php 
				if ($tablica_url = pobierz_zamowienia($_SESSION['prawid_uzyt'])) {
				  wyswietl_zamowienia($tablica_url);
				}
			?>
			</div>
		</div>  
  <?php
}

function wyswietl_zamowienia($tablica_url) {
	?>
	<br />
	<table width="300" cellpadding="2" cellspacing="0">
	  <?php
		$kolor = "#cccccc";
		echo "<tr bgcolor=\"" . $kolor . "\"><td><strong>Aktualnie Wypożyczone :</strong></td>";	
		if ((is_array ( $tablica_url )) && (count ( $tablica_url ) > 0)) {
			foreach ( $tablica_url as $url ) {
				if ($kolor == "#cccccc") {
					$kolor = "#ffffff";
				} else {
					$kolor = "#cccccc";
				}
				// należy pamiętać o wywołaniu htmlspecialchars() przy wyświetlaniu danych użytkownika
				echo "<tr bgcolor=\"" . $kolor . "\"><td><a href=\"" . $url . "\">" . htmlspecialchars ( $url ) . "</a></td></tr>";
			}
		} else {
			echo "<tr><td>Brak zapisanych zakładek</td></tr>";
		}
		?>
	 </table>
<?php
}

// wyświetlenie informacji o filmie
function wyswietl_informacje_filmu($tytul, $nrZdjecia, $obsada, $cena) {
	?>
<div class="row marketing">
			<div class="col-lg-8">
				<h2><?php echo $tytul;?></h2>
				<div>
					<img src="<?php echo $nrZdjecia ?>.jpg" alt="Plakat" border="0"
						align="left" valign="bottom" height="200" width="150" />
						<?php $_SESSION['idFilm']=$nrZdjecia; ?> 
					<p><h3>Obsada:</h3></p>
					<p><?php echo $obsada ?></p>
					<br>
					<p><h3>Koszt wypożyczenia <?php echo $cena ?> złotych.</h3></p>
					<br>
				<!-- Kod odposiada za nowe wyporzyczenie -->	
					<form method="post" action="../nowe_wyporzyczenie.php">
						<button class="btn btn-sm btn-primary" type="submit">Wypożycz</button>
					</form>
					
					<br> <br> 
				</div>
				<div>
				<!-- Kod odposiada za tworzenie recenzji oraz ich wyswietlanie -->
					<?php 
					if ($tablica_recenzji = pobierz_rezenzje($_SESSION['prawid_uzyt'],$nrZdjecia)) {
					  wyswietl_rezenzje($tablica_recenzji);
					}
					?>

					<form method="post" action="../nowa_recenzja.php">
						<div class="form-group">
						<br/>
							<label>Nowa recenzja:</label>
							<textarea name="tresc" class="form-control" rows="3"></textarea>
						</div>
						<button type="submit" name="submit" class="btn btn-default">Wyślij</button>
					</form>
				</div>
			</div>  
  <?php
}

// wyswietlenie recenzji
function wyswietl_rezenzje($tablica_recenzji) {
	?>
  <br/>
	<table width="600" cellpadding="2" cellspacing="0">
		<?php
		$kolor = "#cccccc";
		echo "<tr bgcolor=\"" . $kolor . "\"><td><strong>Recenzje:</strong></td>";	
		if ((is_array ( $tablica_recenzji )) && (count ( $tablica_recenzji ) > 0)) {
			foreach ( $tablica_recenzji as $recenzja ) {
				if ($kolor == "#cccccc") {
					$kolor = "#ffffff";
				} else {
					$kolor = "#cccccc";
				}
				echo "<tr bgcolor=\"" . $kolor . "\"><td><text>$recenzja<text></td></tr>";
			}
		} else {
			echo "<tr><td>Brak zapisanych zakładek</td></tr>";
		}
		?>
	</table>
			
<?php
}

function wyswietlMenuNawigacjiFilmy() {
	?>
 
	<div class="col-lg-4">

				<p>
					<button class="btn btn-sm btn-primary" type="button"
						style="width: 170px" onclick="location='../index.php'">Strona
						główna</button>
				</p>
<?php 			
			if (isset($_SESSION['prawid_uzyt'])) {
		      echo "<p><button class=\"btn btn-sm btn-primary\" type=\"button\"
			style=\"width:150px\" onclick=\"location='../wypozyczenia.php'\">Wypożyczenia</button></p>";
		  } else echo "<p><button class=\"btn btn-sm btn-primary\" type=\"button\"
			style=\"width:150px\" onclick=\"location='../index.php'\">Zaloguj</button></p>";
?>		  
		  <p>
					<button class="btn btn-sm btn-success" type="button"
						style="width: 150px" onclick="location='../gatunek.php'">Komedia</button>
				</p>
				<p>
					<button class="btn btn-sm btn-success" type="button"
						style="width: 150px" onclick="location='../gatunek.php'">Dramat</button>
				</p>
				<p>
					<button class="btn btn-sm btn-success" type="button"
						style="width: 150px" onclick="location='../gatunek.php'">Fabularny</button>
				</p>
				<p>
					<button class="btn btn-sm btn-success" type="button"
						style="width: 150px" onclick="location='../gatunek.php'">Przygodwy</button>
				</p>
				<p>
					<button class="btn btn-sm btn-success" type="button"
						style="width: 150px" onclick="location='../gatunek.php'">Romans</button>
				</p>
			
<?php 
if (isset($_SESSION['prawid_uzyt'])) {
	echo "<p><button class=\"btn btn-sm btn-primary\" type=\"button\"
			style=\"width:150px\" onclick=\"location='../wylog.php'\">wyloguj</button></p>";
}
?>
	</div>

<?php
}

function wyswietlMenuNawigacjiGlowna() {
	?>
 
	<div class="col-lg-4">
<?php 
sprawdz_prawid_uzyt();
?>
				<p>
					<button class="btn btn-sm btn-primary" type="button"
						style="width: 170px" onclick="location='index.php'">Strona główna</button>
				</p>
<?php 			
			if (isset($_SESSION['prawid_uzyt'])) {
		      echo "<p><button class=\"btn btn-sm btn-primary\" type=\"button\"
			style=\"width:150px\" onclick=\"location='wypozyczenia.php'\">Wypożyczenia</button></p>";
		  } else echo "<p><button class=\"btn btn-sm btn-primary\" type=\"button\"
			style=\"width:150px\" onclick=\"location='index.php'\">Zaloguj</button></p>";
?>		  
		  <p>
					<button class="btn btn-sm btn-success" type="button"
						style="width: 150px" onclick="location='gatunek.php'">Komedia</button>
				</p>
				<p>
					<button class="btn btn-sm btn-success" type="button"
						style="width: 150px" onclick="location='gatunek.php'">Dramat</button>
				</p>
				<p>
					<button class="btn btn-sm btn-success" type="button"
						style="width: 150px" onclick="location='gatunek.php'">Fabularny</button>
				</p>
				<p>
					<button class="btn btn-sm btn-success" type="button"
						style="width: 150px" onclick="location='gatunek.php'">Przygodwy</button>
				</p>
				<p>
					<button class="btn btn-sm btn-success" type="button"
						style="width: 150px" onclick="location='gatunek.php'">Romans</button>
				</p>
			
<?php 
if (isset($_SESSION['prawid_uzyt'])) {
	echo "<p><button class=\"btn btn-sm btn-primary\" type=\"button\"
			style=\"width:150px\" onclick=\"location='wylog.php'\">wyloguj</button></p>";
}
?>
	</div>

<?php
}

function wyswietl_form_log() {
	?>
 
	<div class="col-lg-4">
				<h4>Wypożyczaj filmy online!</h4>


				<p>
					<a href="formularz_rejestracji.php">Zarejestruj się</a>
				</p>
				<form method="post" action="index.php">
					<table bgcolor="#cccccc">
						<tr>
							<td colspan="2"><b>Logowanie:</b></td>
						
						
						<tr>
							<td>Nazwa użytkownika:</td>
							<td><input type="text" name="nazwa_uz" /></td>
						</tr>
						<tr>
							<td>Hasło:</td>
							<td><input type="password" name="haslo" /></td>
						</tr>
						<tr>
							<td colspan="2" align=center><input type="submit"
								value="Logowanie" /></td>
						</tr>
						<tr>
							<td colspan="2"><a href="zapomnij_formularz.php">Zapomniałeś
									hasła?</a></td>
						</tr>
					</table>
				</form>
			</div>

<?php
}

function wyswietl_form_rej() {
	?>
 <form method="post" action="nowa_rejestracja.php">
				<table bgcolor="#cccccc">
					<tr>
						<td>Adres poczty elektronicznej:</td>
						<td><input type="text" name="email" size="30" maxlength="100"></td>
					</tr>
					<tr>
						<td>Preferowana nazwa użytkownika <br />(maksymalnie 16 znaków):
						</td>
						<td valign="top"><input type="text" name="nazwa_uz" size="16"
							maxlength="16" /></td>
					</tr>
					<tr>
						<td>Hasło <br />(pomiędzy 6 i 16 znaków):
						</td>
						<td valign="top"><input type="password" name="haslo" size="16"
							maxlength="16" /></td>
					</tr>
					<tr>
						<td>Potwierdź hasło:</td>
						<td><input type="password" name="haslo2" size="16" maxlength="16" /></td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input type="submit"
							value="Rejestracja"></td>
					</tr>
				</table>
			</form>
<?php
}

// wyświetlenie formularza zmiany hasła
function wyswietl_haslo_form() {
	?>
<div class="row marketing">
				<div class="col-lg-8">
					<br />
					<form action="zmiana_hasla.php" method="post">
						<table width="250" cellpadding="2" cellspacing="0"
							bgcolor="#cccccc">
							<tr>
								<td>Poprzednie hasło:</td>
								<td><input type="password" name="stare_haslo" size="16"
									maxlength="16" /></td>
							</tr>
							<tr>
								<td>Nowe hasło:</td>
								<td><input type="password" name="nowe_haslo" size="16"
									maxlength="16" /></td>
							</tr>
							<tr>
								<td>Powtorzenie nowego hasła:</td>
								<td><input type="password" name="nowe_haslo2" size="16"
									maxlength="16" /></td>
							</tr>
							<tr>
								<td colspan="2" align="center"><input type="submit"
									value="Zmiana hasła" /></td>
							</tr>
						</table>
						<br />
					</form>
				</div>
<?php
}
;
?>