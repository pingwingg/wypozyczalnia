<?php
require_once('../funkcje_zakladki.php');
session_start();


tworz_naglowek_html('');
wyswietl_informacje_filmu('Ojciec chrzestny II:', 1, 'Al Pacino, Robert Duvall, Diane Keaton', 5);
wyswietlMenuNawigacjiFilmy();


tworz_stopke_html();

?>