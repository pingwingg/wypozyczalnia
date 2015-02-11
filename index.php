<?php
 require_once('funkcje_zakladki.php');
 session_start();
 @ $nazwa_uz = $_POST['nazwa_uz'];
 @ $haslo = $_POST['haslo'];
 
 if ($nazwa_uz && $haslo) {
 		loguj($nazwa_uz, $haslo);
 		// je�eli u�ytkownik znajduje si� w bazie danych rejestracja identyfikatora
 		$_SESSION['prawid_uzyt'] = $nazwa_uz;
 		
   }
 
 tworz_naglowek_html('');

 
 wyswietl_informacje_witryny(); 
 
 if (!isset($_SESSION['prawid_uzyt'])){
 wyswietl_form_log();
}
 wyswietlMenuNawigacjiGlowna();

 tworz_stopke_html();

?>
