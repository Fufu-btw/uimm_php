<?php
// Importer ma librairie
require_once('obj/Bootstrap.php');
require_once('obj/Mysql.php');

// Démarrage de la session
session_start();

// je suis déjà connecté, je sors 
if (isset($_SESSION["login"])) {
  header('Location: index.php');
}

// Instanciation de l'objet
$Form = new Bootstrap();

// Le premier passage ?
if (isset($_POST["login"])) {
  // Récupération depuis la base
  $SQL = new MySQL();
  $req = $SQL->myQuery('select password from users where login="'.$_POST["login"].'"');
  // Comparaison du SHA1 de la base avec le SHA1 du mot de passe
  if (!empty($req) && sha1($_POST["password"])==$req[0]["password"]) {
    // Mise en place de la session
    $_SESSION["login"]=$_POST["login"];
    header('Location: index.php');
  } else {
    $Form->addAlert("login ou mot de passe incorrect");
  }
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
    <!-- Modification du style Twitter BootstrapStatic -->
    <link href="css/dashboard.css" rel="stylesheet">
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
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="login.php">
              <span data-feather="log-in" class="align-text-bottom"></span>
              Connexion
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Fin Menu de gauche -->


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <?php echo $Form->titleGeneral("Connexion"); ?>
      <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
          <?php echo $Form->formStart('login.php'); ?>
            <?php echo $Form->formAlert(); ?>
            <?php echo $Form->inputEmail('Login','login','name@example.com','',true); ?>
            <?php echo $Form->inputPassword('Password','password','Password','',true); ?>
            <div class="mb-3">
            <?php echo $Form->buttonSubmit('connexion',"Connexion","btn-sm btn-primary"); ?>
            <?php echo $Form->buttonLink('inscription','inscription.php','btn-sm btn-dark'); ?>
            </div>
          <?php echo $Form->formEnd(); ?>
        </div>
        <div class="col-3"></div>
      </div>
    </main>    
  </div>
</div>

    <!-- Appel des javascripts utilisés -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="js/dashboard.js"></script> 
  </body>
</html>
