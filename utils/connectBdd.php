<?php

namespace frameData\utils;


class BddConnect{

   public function connexion(){
      return new \PDO('mysql:host=localhost;dbname=framedata', 'root','',[\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
   }
}

?>
