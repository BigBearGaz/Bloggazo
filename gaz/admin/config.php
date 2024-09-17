<?php 
function db_connect(){
$dbhost='localhost';
$dbname='blog';
$dbuser='root';
$dbpswd='';

try{
    $db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpswd,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
return $db;
}catch(PDOException $e){
die("Une erreur est survenue lors de la connexion a la base de données");
}
}

?>