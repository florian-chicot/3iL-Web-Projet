<?php
require_once File::build_path(array("controller", "ControllerAdmin.php"));
require_once File::build_path(array("controller", "ControllerAdminCompetition.php"));
require_once File::build_path(array("controller", "ControllerContact.php"));
require_once File::build_path(array("controller", "ControllerError.php"));
require_once File::build_path(array("controller", "ControllerHome.php"));
require_once File::build_path(array("controller", "ControllerLogin.php"));
require_once File::build_path(array("controller", "ControllerListOfMatches.php"));
require_once File::build_path(array("controller", "ControllerMatch.php"));
require_once File::build_path(array("controller", "ControllerSignup.php"));

if (!isset($_GET['action'])) {
  ControllerHome::homeRoute();
} else {
    $action = $_GET['action'];
  if (!isset($_GET['controller'])) {
    $controller = 'accueil';
  } else {
    $controller = $_GET['controller'];
  }

  $controller_class = 'Controller' . ucfirst($controller);

  if (class_exists($controller_class)) {
    if (in_array($action,  get_class_methods($controller_class))) {
      $controller_class::$action();
    } else {
        ControllerError::errorRoute();
    } 
  } else {
    ControllerError::errorRoute();
  }

  if ($controller === 'login') {
    if ($action === 'check') {
      ControllerLogin::check();
    } else {
      ControllerLogin::loginForm();
    }
  }
}