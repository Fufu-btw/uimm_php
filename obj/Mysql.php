<?php

class MySQL {

    private $link;

    function __construct($file='db.ini') {
        // Connexion à la base
        $con = parse_ini_file($file);
        $this->link = new PDO('mysql:host='.$con['host'].';dbname='.$con['db'],$con['login'],$con['password']);
    }
    
    /**
     * Execution d'une requête
     * @param string req Requête MySQL
     * @param bool result Retour ou non des valeurs
     */
    function myQuery($req,$result=true) {
        $sth = $this->link->prepare($req);
        $sth->execute();
        $datas = $sth->fetchAll(PDO::FETCH_ASSOC);
        if ($result) return $datas;
            else return []; 
    }
}