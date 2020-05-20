<?php
//Se connecter à la base de donnée
 
$db_param = parse_ini_file ('db.ini'); //On prend les valeurs dans le fichier db.ini
 
try {
$cnx = new PDO($db_param['url'],$db_param['user'] ,$db_param['pass']); //On se connecte à la base
$cnx->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Pour gérer les exceptions
}
catch (PDOException $e) {
    print($e->getMessage(). "\n"); //Afficher le message d'exception
    exit;
}
?>