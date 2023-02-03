<?php

//Récupération de la session et accès si connecté
session_start();
if (!isset($_SESSION["login"])) {
    header ('Location: login.php');
}


// Récupération des objets
require_once('../obj/Bootstrap.php');
require_once('../obj/Mysql.php');


// Chargement des profiles
$SQL = new MySQL();
$req = $SQL->myQuery("select * from menus");
// Préparation de l'objet pour le rendu
$Form = new Bootstrap();

if (isset($_POST['user'])) {
  $Form->addUser($_POST['user'],$_POST['password'],$_POST['role']);
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Samuel COLLADO">
    <title>Dashboard Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Modification du style Twitter Bootstrap -->
    <link href="../css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<!-- Entête Navbar -->
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Company name</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="dropdown text-end position-relative">
    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
    </a>
    <ul class="dropdown-menu position-absolute text-small">
      <li><a class="dropdown-item" href="#">New project...</a></li>
      <li><a class="dropdown-item" href="#">Settings</a></li>
      <li><a class="dropdown-item" href="#">Profile</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="#">Sign out</a></li>
    </ul>
  </div>
</header> 


<div class="container-fluid">
  <div class="row">
    <!-- Menu de gauche -->
    <?php echo $Form->leftGeneral(8); ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Liste des Menus</h1>
      </div>

      
        <!-- to insert a user -->
      <form action="" method="post">
        <div class="row">
          <div class="d-flex">
            <div class="col-sm-2 m-3">
              <input class="form-control" type="text" placeholder="Username / Email" name="user">
            </div>
            <div class="col-sm-2 m-3">
              <input class="form-control" type="text" placeholder="Password" name="password">
            </div>
            <div class="col-sm-2 m-3">
              <select class="form-select" aria-label="Default select example" name="role">
                <option selected>Selectionner le rôle</option>
                <option value="1">Administrateur</option>
                <option value="2">Utilisateur</option>
              </select>
            </div>
          </div> 
        </div>
        <div class="col-sm-2 m-3">
          <button class="btn btn-dark btn-sm" type="submit">Ajouter</button>
        </div>
      </form>
        
        
      
      
    </main>    
  </div>
</div>

    <!-- Appel des javascripts utilisés -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="../js/dashboard.js"></script> 
  </body>
</html>
