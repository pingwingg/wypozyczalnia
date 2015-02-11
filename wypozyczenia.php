<?php

session_start();
// utworzenie kr�tkich nazw zmiennych
@ $nazwa_uz = $_POST['nazwa_uz'];
@ $haslo = $_POST['haslo'];
// do��czenie plik�w funkcji tej aplikacji
require_once('funkcje_zakladki.php');

tworz_naglowek_html('');

if ($nazwa_uz && $haslo) {
	loguj($nazwa_uz, $haslo);
	// je�eli u�ytkownik znajduje si� w bazie danych rejestracja identyfikatora
	$_SESSION['prawid_uzyt'] = $nazwa_uz;
		
}

 if (@ !$_SESSION['prawid_uzyt']) {
	
	?>
<div class="row marketing">
	<div class="col-lg-8">
	<p>Tylko zalogowani użytkownicy mogą przeglądać tę stronę.</p>
	</div>

	<?php
	wyswietlMenuNawigacjiGlowna();
	tworz_stopke_html();
	exit;
}


// odczytanie zak�adek u�ytkownika
wyswietlZamowienia();

// tworzenie menu opcji

wyswietlMenuNawigacjiGlowna();

wyswietl_menu_uzyt();



tworz_stopke_html();
?>
