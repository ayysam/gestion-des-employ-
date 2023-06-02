<?php

class DB{
   

    // les fonctions statiques sont accessibles
    // sans avoir besoin d'une instanciation de
    // la classe
static public function connect(){
      $host='localhost';
      $db='employes';
      $login='root';
      $mdp='';

    try{
        $db=new PDO("mysql:host=$host;dbname=$db",$login,$mdp);
        $db->exec("set names utf8");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        return $db;
    }
    catch (PDOException $e){
        echo"erreur".$e->getMessage();
    }
}
}
?>