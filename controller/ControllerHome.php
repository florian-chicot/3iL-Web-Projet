<?php
class ControllerHome {

  public static function homeRoute() {
    $controller = 'home';
    $view = 'Home';
    $pagetitle = 'Accueil';
    $description ='Accueil du site web';
    require File::build_path(array("view", "Base.php"));
  }
}