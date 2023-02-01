<?php

require_once('obj/Essai.php');

$monEssai = new Essai();
echo "Variable publique : ".$monEssai->publique;
$monEssai->publique = "Modification";
echo "Variable publique : ".$monEssai->publique;
echo "Variable privée : ".$monEssai->getPrive();
$monEssai->setPrive(4);
echo "Variable privée : ".$monEssai->getPrive();
