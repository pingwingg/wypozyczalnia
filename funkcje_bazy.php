<?php

function lacz_bd() {
   $wynik = new mysqli('sbazy', 's175917', 'Rzavbvjb', 's175917');
   if (!$wynik) {
      throw new Exception('Po��czenie z serwerem bazy danych nie powiod�o si�');
   } else {
      return $wynik;
   }
}

?>
