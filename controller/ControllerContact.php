<?php
require_once File::build_path(array("model", "ModelContact.php"));
require_once File::build_path(array("model", "ModelContactInfo.php"));

class ControllerContact {

  public static function contactForm() {
    $controller = 'contact';
    $view = 'Contact';
    $pagetitle = 'Contactez-nous';
    $stylesheets = ['form'];
    $contactInfos = ModelContactInfo::readAll();
    require File::build_path(array("view", "Base.php"));
  }
  
  public static function send() {
    $username = isset($_SESSION['user']) ? $_SESSION['user']->getUsername() : 'Anonyme';
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $contact = new ModelContact($username, $subject, $message);
    $contact->save();

    // Redirige vers la page de connexion
    header("Location: index.php?controller=Home&action=homeRoute");
    exit();
  }
}