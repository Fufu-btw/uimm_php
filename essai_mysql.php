<?php

// Récupération de la classe
require_once("obj/Mysql.php");

// Instanciation de l'objet
$SQL = new MySQL();

// Execution d'une requête
$req = $SQL->myQuery("select password from users where login='scollado@evoliatis.com'");

print_r($req);