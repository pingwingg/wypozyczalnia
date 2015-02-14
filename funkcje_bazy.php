<?php

function lacz_bd() {
   $wynik = new mysqli('sbazy', 's175917', 'Rzavbvjb', 's175917');
   if (!$wynik) {
      throw new Exception('Po³¹czenie z serwerem bazy danych nie powiod³o siê');
   } else {
      return $wynik;
   }
}

?>
