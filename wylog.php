<?php

session_start();
// do��czenie plik�w funkcji tej aplikacji
require_once('funkcje_zakladki.php');
$stary_uzyt = $_SESSION['prawid_uzyt'];

// przechowanie do sprawdzenia, czy logowanie wyst�pi�o
unset($_SESSION['prawid_uzyt']);
$wynik_niszcz = session_destroy();

// pocz�tek wy�wietlania html
tworz_naglowek_html('');
?>
<div class="row marketing">
	<div class="col-lg-8">
<?php 
if (!empty($stary_uzyt)) {
  if ($wynik_niszcz) {
    // je�eli u�ytkownik zalogowany i nie wylogowany
    echo 'Wylogowano pomyślnie.<br />';
  } else {
   // u�ytkownik zalogowany i wylogowanie niemo�liwe
    echo 'Wylogowanie niemożliwe.<br />';
  }
} else {
  // je�eli brak zalogowania, lecz w jaki� spos�b uzyskany dost�p do strony
  echo 'Użytkownik niezalogowany.<br />';

}
?>
	</div>
	
 
	<div class="col-lg-4">
	
			<p><button class="btn btn-sm btn-primary" type="button"
			style="width:170px" onclick="location='index.php'">Strona główna</button></p>
<?php 			
			if (isset($_SESSION['prawid_uzyt'])) {
		      echo "<p><button class=\"btn btn-sm btn-primary\" type=\"button\"
			style=\"width:150px\" onclick=\"location='zamowienia.php'\">Zamówienia</button></p>";
		  } else echo "<p><button class=\"btn btn-sm btn-primary\" type=\"button\"
			style=\"width:150px\" onclick=\"location='index.php'\">Zaloguj</button></p>";
?>		  
		  <p><button class="btn btn-sm btn-success" type="button"
		  		style="width:150px" onclick="location='gatunek.php'">Komedia</button></p>
		  <p><button class="btn btn-sm btn-success" type="button"
		  		style="width:150px" onclick="location='gatunek.php'">Dramat</button></p>
		  <p><button class="btn btn-sm btn-success" type="button"
		  		style="width:150px" onclick="location='gatunek.php'">Fabularny</button></p>
		  <p><button class="btn btn-sm btn-success" type="button"
		  		style="width:150px" onclick="location='gatunek.php'">Przygodwy</button></p>
		  <p><button class="btn btn-sm btn-success" type="button"
		  		style="width:150px" onclick="location='gatunek.php'">Romans</button></p>
			
<?php 


tworz_stopke_html();

?>
