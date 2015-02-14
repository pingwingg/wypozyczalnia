<?php
require_once('funkcje_bazy.php');


//Funkcje pozostawione aby podpatrzyc selekty.

function pobierz_urle_uzyt($nazwa_uz) {
  // pobranie z bazy danych wszystkich URL-i danego u�ytkownika
  $lacz = lacz_bd();
  $wynik = $lacz->query(
  "
SELECT tytul from zamowienie
INNER JOIN uzytkownik ON zamowienie.zam_nazwa_uz=uzytkownik.nazwa_uz
INNER JOIN film ON zamowienie.film_id= film.filmId 
where nazwa_uz = '$nazwa_uz'"
  );
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

function pobierz_rezenzje($nazwa_uz,$nrZdjecia) {
  // pobranie z bazy danych wszystkich URL-i danego u�ytkownika
  $lacz = lacz_bd();
  $wynik = $lacz->query(
  "
SELECT  CONCAT(nazwa_uz,': ',recenzja_tresc)as a  FROM recenzja INNER JOIN uzytkownik ON recenzja.rec_nazwa_uz=uzytkownik.nazwa_uz
INNER JOIN film ON recenzja.film_id= film.filmId 
where filmId =1 and film_id=$nrZdjecia"
  );
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