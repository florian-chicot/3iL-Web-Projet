<?php
require_once File::build_path(array("model", "ModelMatch.php"));

class ControllerListOfMatches {

  public static function descriptionRoute() {
    $matchs = ModelMatch::readAll();
    $controller = 'listOfMatches';
    $view = 'ListOfMatches';
    $pagetitle = 'Liste des matchs';
    $description ='';
    require File::build_path(array("view", "Base.php"));
  }
}