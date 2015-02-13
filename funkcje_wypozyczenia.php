<?php
require_once('funkcje_bazy.php');


//Funkcje pozostawione aby podpatrzyc selekty.

function pobierz_urle_uzyt($nazwa_uz) {
  // pobranie z bazy danych wszystkich URL-i danego u�ytkownika
  $lacz = lacz_bd();
  $wynik = $lacz->query("select URL_zak
                         from zakladka
                         where nazwa_uz = '".$nazwa_uz."'");
  if (!$wynik) {
    return false;
  }

  // tworzenie tablicy URL-i
  $tablica_url = array();
  for ($licznik = 0; $rzad = $wynik->fetch_row(); ++$licznik) {
    $tablica_url[$licznik] = $rzad[0];
  }
  return $tablica_url;
}




?>
