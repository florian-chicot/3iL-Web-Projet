<?php
require_once File::build_path(array("controller", "ControllerError.php"));
require_once File::build_path(array("controller", "ControllerHome.php"));
require_once File::build_path(array("controller", "ControllerListOfMatches.php"));
require_once File::build_path(array("controller", "ControllerMatch.php"));

if (!isset($_GET['action'])) {
  $controller = 'home';
  $view = 'Home';
  $pagetitle = 'Accueil';
  $description ='Accueil du site web';
  require File::build_path(array("view", "Base.php"));   
} else {
    $action = $_GET['action'];
  if (!isset($_GET['controller'])) {
    $controller = 'accueil';
  } else {
    $controller = $_GET['controller'];
  }

  $controller_class = 'Controller' . ucfirst($controller);

  if (class_exists($controller_class)) {
    $allMethodsController = get_class_methods($controller_class);
    if (in_array($action, $allMethodsController)) {
      $controller_class::$action();
    } else {
        ControllerError::errorRoute();
    } 
  } else {
    ControllerError::errorRoute();
  }
}