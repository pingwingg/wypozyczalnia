<?php

require_once('funkcje_bazy.php');

function rejestruj($nazwa_uz, $email, $haslo) {
// zarejestrowanie nowej osoby w bazie danych
// zwraca true lub komunikat o b��dzie

 // po��czenie z baz� danych
  $lacz = lacz_bd();

  // sprawdzenie, czy nazwa u�ytkownika nie powtarza si�
  $wynik = $lacz->query("select * from uzytkownik where nazwa_uz='".$nazwa_uz."'");
  if (!$wynik) {
     throw new Exception('Wykonanie zapytania nie powiod�o si�.');
  }

  if (@ $lacz->num_rows>0) {
     throw new Exception('Nazwa u�ytkownika zaj�ta � prosz� wr�ci� i wybra� inn�.');
  }

  // je�eli wszystko w porz�dku, umieszczenie w bazie danych
  $wynik = $lacz->query("insert into uzytkownik values
                       ('".$nazwa_uz."', sha1('".$haslo."'), '".$email."')");
  if (!$wynik) {
    throw new Exception('Rejestracja w bazie danych niemo�liwa � prosz� spr�bowa� p�niej.');
  }

  return true;
}

function nowaRecenzja($tresc, $filmId, $uzytkownik) {
// zarejestrowanie nowej osoby w bazie danych
// zwraca true lub komunikat o b��dzie

 // po��czenie z baz� danych
  $lacz = lacz_bd();

  // je�eli wszystko w porz�dku, umieszczenie w bazie danych  (DEFAULT,'".$tresc."', '".$uzytkownik.", '".$filmId."')");
  $wynik = $lacz->query("insert into recenzja values
                       (DEFAULT,'".$tresc."', '".$uzytkownik."', 1)");
  if (!$wynik) {
    throw new Exception('Rejestracja w bazie danych niemo�liwa � prosz� spr�bowa� p�niej.');
  }

  return true;
}

function loguj($nazwa_uz, $haslo) {
// sprawdzenie nazwy u�ytkownika i has�a w bazie danych
// je�eli si� zgadza, zwraca true
// je�eli nie, wyrzuca wyj�tek

  // po��czenie z baz� danych
  $lacz = lacz_bd();

  // sprawdzenie unikatowo�ci nazwy u�ytkownika
  $wynik = $lacz->query("select * from uzytkownik
                         where nazwa_uz='".$nazwa_uz."'
                         and haslo = sha1('".$haslo."')");
  if (!$wynik) {
     throw new Exception('Logowanie nie powiod�o si�.');
  }

  if ($wynik->num_rows>0) {
     return true;
  } else {
     throw new Exception('Logowanie nie powiod�o si�.');
  }
}

function sprawdz_prawid_uzyt() {
// sprawdzenie czy u�ytkownik jest zalogowany i powiadomienie go je�eli nie
  if (isset($_SESSION['prawid_uzyt'])) {
      echo "Zalogowano jako <b>".$_SESSION['prawid_uzyt'].".</b></br><br />";
  }
}



?>