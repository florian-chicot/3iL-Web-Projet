<?php

require_once File::build_path(array("model", "ModelMatchs.php"));

class ControllerMatch {

  public static function matchRoute() {
    //var_dump("blablou");
    //die();
    $id = $_GET["id"];
    $match = ModelMatchs::read($id);
    $controller = 'match';
    $view = 'Match';
    $pagetitle = 'Match';
    $description ='';
    require File::build_path(array("view", "Base.php"));
  }
}

// ?controller=Matches&action=matchRoute
