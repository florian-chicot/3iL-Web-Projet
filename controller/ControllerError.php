<?php
class ControllerError {

  public static function errorRoute() {
    //var_dump("blablou");
    //die();
    $controller = '.error';
    $view = '404';
    $pagetitle = 'Erreur 404';
    $description ='';
    require File::build_path(array("view", "Base.php"));
  }
}