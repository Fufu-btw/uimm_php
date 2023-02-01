<?php

class Essai {

    /**
     * Variable publique
     * @var string $publique
     */
    public $publique;
    /**
     * Variable privée
     * @var int $prive
     */
    private $prive;

    /**
     * Constructeur de la classe
     */
    function __construct()
    {
        $this->prive = 0;
        $this->publique = "Valeur initiale";
    }

    /**
     * Récupération de la variable privée
     * @return string Contenu de la variable prive
     */
    public function getPrive() {
        return $this->prive;
    }

    /**
     * Mise en place d'une valeur dans privé
     * @param int $valeur Valeur à déposer dans prive
     */
    public function setPrive($valeur) {
        $this->prive = $valeur;
    }
}