<?php
require_once('../funkcje_zakladki.php');
session_start();


tworz_naglowek_html('');
wyswietl_informacje_filmu('Dwunastu gniewnych ludzi', 3, 'Martin Balsam, John Fiedler,  Lee J. Cobb', 3);
wyswietlMenuNawigacjiFilmy();


tworz_stopke_html();

?>