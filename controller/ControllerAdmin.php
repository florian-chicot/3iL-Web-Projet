<?php
require_once File::build_path(array("model", "ModelUser.php"));

class ControllerAdmin {
  public static function adminRoute() {
    if (isset($_SESSION['user']) && $_SESSION['user']->isAdmin()) {
      $controller = 'admin';
      $view = 'Admin';
      $pagetitle = 'Administration';
      $description ='';
      require File::build_path(array("view", "Base.php"));
    } else {
        header('Location: index.php?controller=Home');
        exit();
    }
  }
}