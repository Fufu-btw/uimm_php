<?php
// Récupération de la session
session_start();
// Destruction de la session
session_destroy();
// Retour au login
header('Location: login.php');