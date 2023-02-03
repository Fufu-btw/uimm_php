<?php
require_once('Mysql.php');

class Bootstrap {

  /**
   * Messages d'alerte à afficher
   * @var array $messages
   */
  private $alertes;

  /**
   * Objet MySQL pour les requêtes
   * @var object $SQL
   */
  private $SQL;  

  /**
   * Constructeur de la classe
   */
  function __construct() {
    // Initialisation des alertes
    $this->alertes = [];
    // Initialisation de l'objet MySQL
    $this->SQL = new MySQL();
  }

  /**
   * inputGeneral : Génération d'un champ au format Bootstrap
   * @param string $type Type de Champ
   * @param string $label Label du champ
   * @param string $nom Nom du champ
   * @param string $placeholder Valeur de présentation
   * @param string $class Feuille de style
   * @param bool $required Le champ est-il obligatoire ?
   * @return string Code HTML
   */
  private function inputGeneral($type,$label,$nom,$placeholder="",$class="",$required=false) {
      $str = '<div class="mb-3">';
      $str .= '<label for="'.$nom.'" class="form-label">'.$label.'</label>';
      $req = "";
      if ($required) {
          $req = "required";
      } 
      if (!isset($_POST[$nom])) {
        $_POST[$nom]="";
      }
      $str .= '<input type="'.$type.'" value="'.$_POST[$nom].'" name="'.$nom.
              '" class="form-control '.$class.'" id="'.$nom.'" placeholder="'.
              $placeholder.'" '.$req.'>';
      $str .= "</div>";
      return $str;
  }

  /**
   * inputText : Génération d'un champ texte au format Bootstrap
   * @param string $label Label du champ
   * @param string $nom Nom du champ
   * @param string $placeholder Valeur de présentation
   * @param string $class Feuille de style
   * @param bool $required Le champ est-il obligatoire ?
   * @return string Code HTML
   */
  public function inputText($label,$nom,$placeholder="",$class="",$required=false) {
    return $this->inputGeneral("text",$label,$nom,$placeholder,$class,$required);
  }

  /**
   * inputDate : Génération d'un champ date au format Bootstrap
   * @param string $label Label du champ
   * @param string $nom Nom du champ
   * @param string $placeholder Valeur de présentation
   * @param string $class Feuille de style
   * @param bool $required Le champ est-il obligatoire ?
   * @return string Code HTML
   */
  public function inputDate($label,$nom,$placeholder="",$class="",$required=false) {
    return $this->inputGeneral("date",$label,$nom,$placeholder,$class,$required);
  }

  /**
   * inputColor : Génération d'un champ couleur au format Bootstrap
   * @param string $label Label du champ
   * @param string $nom Nom du champ
   * @param string $placeholder Valeur de présentation
   * @param string $class Feuille de style
   * @param bool $required Le champ est-il obligatoire ?
   * @return string Code HTML
   */
  public function inputColor($label,$nom,$placeholder="",$class="",$required=false) {
    return $this->inputGeneral("color",$label,$nom,$placeholder,$class,$required);
  }

  /**
   * inputFile : Génération d'un champ fichier au format Bootstrap
   * @param string $label Label du champ
   * @param string $nom Nom du champ
   * @param string $placeholder Valeur de présentation
   * @param string $class Feuille de style
   * @param bool $required Le champ est-il obligatoire ?
   * @return string Code HTML
   */
  public function inputFile($label,$nom,$placeholder="",$class="",$required=false) {
    return $this->inputGeneral("file",$label,$nom,$placeholder,$class,$required);
  }


  /**
   * inputNumber : Génération d'un champ nombre au format Bootstrap
   * @param string $label Label du champ
   * @param string $nom Nom du champ
   * @param string $placeholder Valeur de présentation
   * @param string $class Feuille de style
   * @param bool $required Le champ est-il obligatoire ?
   * @return string Code HTML
   */
  public function inputNumber($label,$nom,$placeholder="",$class="",$required=false) {
    return $this->inputGeneral("number",$label,$nom,$placeholder,$class,$required);
  }

  /**
   * inputEmail : Génération d'un champ email au format Bootstrap
   * @param string $label Label du champ
   * @param string $nom Nom du champ
   * @param string $placeholder Valeur de présentation
   * @param string $class Feuille de style
   * @param bool $required Le champ est-il obligatoire ?
   * @return string Code HTML
   */
  public function inputEmail($label,$nom,$placeholder="",$class="",$required=false) {
    return $this->inputGeneral("email",$label,$nom,$placeholder,$class,$required);
  }

  /**
   * inputPassword : Génération d'un champ password au format Bootstrap
   * @param string $label Label du champ
   * @param string $nom Nom du champ
   * @param string $placeholder Valeur de présentation
   * @param string $class Feuille de style
   * @param bool $required Le champ est-il obligatoire ?
   * @return string Code HTML
   */
  public function inputPassword($label,$nom,$placeholder="",$class="",$required=false) {
      // Pas de reprise du mot de passe
      if (isset($_POST[$nom])) {
        $_POST[$nom]="";
      }
      return $this->inputGeneral("password",$label,$nom,$placeholder,$class,$required);
  }

  /**
  * inputHidden : Génération d'un champ caché
  * @param string $nom Nom du champ
  * @param string $valeur Valeur du champ
  * @return string Code HTML
  */
  public function inputHidden($nom,$valeur) {
    return '<input type="hidden" name="'.$nom.'" value="'.$valeur.'" />';
  }  

  /**
   * formStart : début d'un formulaire
   * @param string $action Chemin du formulaire
   * @param string $method Méthode utilisée (post)
   * @return string Code HTML
   */
  public function formStart($action,$method="post") {
    return '<form method="'.$method.'" action="'.$action.'">';
  }

  /**
   * formEnd : fin du formulaire
   * @return string Code HTML
   */
  public function formEnd() {
    return '</form>';
  }

  /**
   * Ajout de message alerte
   * @param string $msg Message d'alerte
   */
  public function addAlert($msg) {
    $this->alertes[]=$msg;
  }

  /**
   * formAlert : messages d'alerte
   * @return string Code HTML
   */
  public function formAlert() {
    $str = '';
    // Renvoi un message que si $messages n'est pas vide !
    if (!empty($this->alertes)) {
      $str .= '<div class="alert alert-danger" role="alert">
      <h5 class="alert-heading">Attention!</h5>
      <ul>';
      foreach ($this->alertes as $msg) {
        $str .= '<li>'.$msg.'</li>';
      }
      $str .= '</ul></div>';
    }
    return $str;   
  }
  /**
   * buttonSubmit : Génération d'un bouton Submit
   * @param string $name Nom du bouton
   * @param string $value Valeur du bouton affichée
   * @param string $class Style CSS additionnels
   * @return string Code HTML résultat
   */
  public function buttonSubmit($name,$value,$class="") {
    return '<button class="btn '.$class.'" name="'.$name.'" type="submit">'.$value.'</button>';
  }

  /**
   * buttonLink : Génération d'un bouton lien
   * @param string $name Nom du bouton
   * @param string $url URL/URI du bouton
   * @param string $class Style CSS additionnels
   * @return string Code HTML résultat
   */
  public function buttonLink($name,$url,$class="") {
      return '<a href="'.$url.'" class="btn '.$class.'" role="button">'.$name.'</a>';
  }

  /**
   * titleGeneral : Génération d'un titre au formulaire
   * @param string $title Titre du formulaire
   * @return string Code HTML résultat
   */
  public function titleGeneral($title) {
      return '<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">'.$title.'</h1>
      </div>';
  }

  /**
   * Génération d'une table depuis un buffer MySQL
   * @param array $req Résultat de la requête MySQL
   * @param string $class Styles CSS additionnels
   * @return string Code HTML résultat
   */
  public function tableGeneral($req,$class="") {
    $str = '<table class="table '.$class.'"><thead><tr>';

    // Récupération des entêtes
    foreach ($req[0] as $key => $inutile) {
      $str .= '<th scope="col">'.$key.'</th>';
    }
    $str .= '<th scope="col"></th>';
    $str .= '</thead><tbody>';

    // Récupération du contenu
    foreach ($req as $lig) {
      $str .= '<tr>';
      $position = 0;
      foreach ($lig as $cel) {
        $str .= '<td>'.utf8_encode($cel).'</td>';      
      }
      $str .= '<form action="" method=""><button class="btn btn-red btn-sm" type="submit" value="'.$buttonvalue.'">delete</button></form>';
      $str .= '</tr>';
    }
    $str .= '</tbody></table>';
    
    // Renvoi du résultat
    return $str;
  }

  /**
   * Génération du menu de gauche
   * @param int $active id de la page active
   */
  public function leftGeneral($active) {

    // Vérification si on est connecté
    $logged=0;
    if (isset($_SESSION["login"])) {
      $logged=1;
    }

    // récupération des urls
    $req = $this->SQL->myQuery("select * from menus where logged=$logged order by sort");

    // Génération
    $str = '<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">';
    foreach ($req as $lig) {
      // Ligne active ?
      $actif='';
      if ($lig['id']==$active) {
        $actif = "active";
      }
      // Génération du code de la ligne à partir de la base
      $str .= '<li class="nav-item">
            <a class="nav-link '.$actif.'" aria-current="page" href="'.$lig["url"].'">
              <span data-feather="'.$lig["icon"].'" class="align-text-bottom"></span>
              '.utf8_encode($lig["name"]).'
            </a>
          </li>';
    }
    $str .= '</ul></div></nav>';

    return $str;
  }
  /**
   * @param string $user nom de l'utilisateur
   * @param string $password mot de passe
   * @param string $role role du profile
   */
  public function addUser($user,$password,$role){
    $hash = sha1($password);
    $id = 2;
    $date = date("Y-m-d H:i:s");
    if($role = "Administrateur"){
      $id = 1;
    }else{
      $id = 2;
    }
    //echo "insert into `users` (`id`, `login`, `password`, `profile_id`, `created_at`, `updated_at`) values (NULL, ".$user.", ".$hash.", ".$id.", ".$date.", ".$date.");";
    $req = $this->SQL->myQuery("insert into `users` (`id`, `login`, `password`, `profile_id`, `created_at`, `updated_at`) values (NULL, '$user', '$hash', '$id', '$date', '$date');");

  }
  /**
   * @param string $user nom de l'utilisateur
   */
  public function removeUser($user){
    //echo "insert into `users` (`id`, `login`, `password`, `profile_id`, `created_at`, `updated_at`) values (NULL, ".$user.", ".$hash.", ".$id.", ".$date.", ".$date.");";
    $req = $this->SQL->myQuery("delete from `users` where `users`.`login` = '$user';");
  }
}
