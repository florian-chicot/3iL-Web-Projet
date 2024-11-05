<?php
require_once File::build_path(array("model", "ModelPresentationContent.php"));

class ControllerHome {

  public static function homeRoute() {
    $controller = 'home';
    $view = 'Home';
    $pagetitle = 'Accueil';
    $description ='Accueil du site web';
    $stylesheets = ['carousel'];
    $presentationContents = ModelPresentationContent::readAll();
    require File::build_path(array("view", "Base.php"));
  }
}