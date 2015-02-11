<?php
 session_start();
 require_once('funkcje_zakladki.php');
 tworz_naglowek_html('Zmiana hasła');
 sprawdz_prawid_uzyt();
 
 wyswietl_haslo_form();

wyswietlMenuNawigacjiGlowna();
tworz_stopke_html();
?>
