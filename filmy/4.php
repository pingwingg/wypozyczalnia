<?php
require_once('../funkcje_zakladki.php');
session_start();


tworz_naglowek_html('');
wyswietl_informacje_filmu('Władca Pierścieni: Powrót króla', 4, 'Elijah Wood, Sean Astin, Dominic Monaghan', 8);
wyswietlMenuNawigacjiFilmy();


tworz_stopke_html();

?>