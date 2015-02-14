<?php

  // utworzenie kr�tkich nazw zmiennych
  $email=$_POST['email'];
  $nazwa_uz=$_POST['nazwa_uz'];
  $haslo=$_POST['haslo'];
  $haslo2=$_POST['haslo2'];
// do��czenie plik�w funkcji tej aplikacji
   require_once('funkcje_zakladki.php');
  // rozpocz�cie sesji, kt�ra mo�e okaza� si� konieczna p�niej
  // rozpocz�cie w tym miejscu, musi ona zosta� przekazana przed nag��wkami
   session_start();
     tworz_naglowek_html('');

     ?>
     <div class="row marketing">
     	<div class="col-lg-8">
     <?php 

   try {
     // sprawdzenia wype�nienia formularzy
     if (!wypelniony($_POST)) {
        throw new Exception('Formularz wypełniony nieprawidłowo. proszę wrócić i spróbować ponownie.');
     }

     // nieprawid�owy adres poczty elektronicznej
     if (!prawidlowy_email($email)) {
        throw new Exception('Nieprawidłowy adres poczty elektronicznej. proszę wrócić i spróbować ponownie.');
     }

     // r�ne has�a
     if ($haslo != $haslo2) {
        throw new Exception('Niepasujące do siebie hasła. proszę wrócić i spróbować ponownie.');
     }

     // sprawdzenie d�ugo�ci nazwy u�ytkownika
     if (strlen($nazwa_uz) > 16) {
        throw new Exception('Nazwa uzytkownika nie może mieć więcej niż 16 znaków. proszę wrócić i spróbować ponownie.');
     }

     // sprawdzenie d�ugo�ci has�a
     // nazw� u�ytkownika mo�na skr�ci�, lecz zbyt d�ugiego
     // has�a skr�ci� nie mo�na
     if ((strlen($haslo) < 6) || (strlen($haslo) > 16)) {
        throw new Exception('Hasło musi mieć co najmniej 6 i maksymalnie 16 znaków. proszę wrócić i spróbować ponownie.');
     }

     // pr�ba zarejestrowania
     rejestruj($nazwa_uz, $email, $haslo);
     // rejestracja zmiennej sesji
     $_SESSION['prawid_uzyt'] = $nazwa_uz;

     // stworzenie ��cza do strony cz�onkowskiej
     echo 'Rejestracja zakończyła się sukcesem. ';
     
	
     ?>
          </div>
     <?php 
   
     wyswietlMenuNawigacjiGlowna();
     
     
    
      
     // koniec strony
     tworz_stopke_html();
   }
   catch (Exception $e) {
     echo $e->getMessage();
     ?>
     </div>
     <?php 
     wyswietlMenuNawigacjiGlowna();
     tworz_stopke_html();
     exit;
   }
?>