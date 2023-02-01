<?php

// Récupération de la classe
require_once("obj/Mysql.php");

// Instanciation de l'objet
$SQL = new MySQL();

// Execution d'une requête
$req = $SQL->myQuery("select * from users");

print_r($req);
