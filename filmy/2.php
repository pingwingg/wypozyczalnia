<?php
require_once('../funkcje_zakladki.php');
session_start();


tworz_naglowek_html('');
wyswietl_informacje_filmu('Skazani na Shawshank', 2, 'Tim Robbins, Morgan Freeman, Bob Gunton', 7);
wyswietlMenuNawigacjiFilmy();


tworz_stopke_html();

?>