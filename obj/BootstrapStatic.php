<?php

class BootstrapStatic {

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
  static function inputGeneral($type,$label,$nom,$placeholder="",$class="",$required=false,) {
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
  static function inputText($label,$nom,$placeholder="",$class="",$required=false) {
    return self::inputGeneral("text",$label,$nom,$placeholder,$class,$required);
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
  static function inputDate($label,$nom,$placeholder="",$class="",$required=false) {
    return self::inputGeneral("date",$label,$nom,$placeholder,$class,$required);
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
  static function inputColor($label,$nom,$placeholder="",$class="",$required=false) {
    return self::inputGeneral("color",$label,$nom,$placeholder,$class,$required);
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
  static function inputFile($label,$nom,$placeholder="",$class="",$required=false) {
    return self::inputGeneral("file",$label,$nom,$placeholder,$class,$required);
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
  static function inputNumber($label,$nom,$placeholder="",$class="",$required=false) {
    return self::inputGeneral("number",$label,$nom,$placeholder,$class,$required);
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
  static function inputEmail($label,$nom,$placeholder="",$class="",$required=false) {
    return self::inputGeneral("email",$label,$nom,$placeholder,$class,$required);
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
  static function inputPassword($label,$nom,$placeholder="",$class="",$required=false) {
      // Pas de reprise du mot de passe
      if (isset($_POST[$nom])) {
        $_POST[$nom]="";
      }
      return self::inputGeneral("password",$label,$nom,$placeholder,$class,$required);
  }

  /**
   * formStart : début d'un formulaire
   * @param string $action Chemin du formulaire
   * @param string $method Méthode utilisée (post)
   * @return string Code HTML
   */
  static function formStart($action,$method="post") {
    return '<form method="'.$method.'" action="'.$action.'">';
  }

  /**
   * formEnd : fin du formulaire
   * @return string Code HTML
   */
  static function formEnd() {
    return '</form>';
  }

  /**
   * formAlert : messages d'alerte
   * @param array $messages Liste de messages
   * @return string Code HTML
   */
  static function formAlert($messages) {
    $str = '';
    // Renvoi un message que si $messages n'est pas vide !
    if (!empty($messages)) {
      $str .= '<div class="alert alert-danger" role="alert">
      <h5 class="alert-heading">Attention!</h5>
      <ul>';
      foreach ($messages as $msg) {
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
  static function buttonSubmit($name,$value,$class="") {
    return '<button class="btn '.$class.'" name="'.$name.'" type="submit">'.$value.'</button>';
  }

  /**
   * buttonLink : Génération d'un bouton lien
   * @param string $name Nom du bouton
   * @param string $url URL/URI du bouton
   * @param string $class Style CSS additionnels
   * @return string Code HTML résultat
   */
  static function buttonLink($name,$url,$class="") {
      return '<a href="'.$url.'" class="btn '.$class.'" role="button">'.$name.'</a>';
  }

  /**
   * titleGeneral : Génération d'un titre au formulaire
   * @param string $title Titre du formulaire
   * @return string Code HTML résultat
   */
  static function titleGeneral($title) {
      return '<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">'.$title.'</h1>
      </div>';
  }

}
// Initialisation des messages
//$messages = [];