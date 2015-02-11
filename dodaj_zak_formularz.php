<?php

session_start();

// do��czenie plik�w funkcji tej aplikacji
require_once('funkcje_zakladki.php');

// pocz�tek wy�wietlania HTML
tworz_naglowek_html('Dodawanie zakładek');

sprawdz_prawid_uzyt();
wyswietl_dodaj_zak_form();

wyswietl_menu_uzyt();
tworz_stopke_html();

?>

