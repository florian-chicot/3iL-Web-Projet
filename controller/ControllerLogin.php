<?php
require_once File::build_path(array("model", "ModelUser.php")); // Assurez-vous que ce fichier existe
session_start(); // Démarre la session

class ControllerLogin {

  // Afficher le formulaire de connexion
  public static function loginForm() {
    $controller = 'login';
    $view = 'Login';
    $pagetitle = 'Connexion';
    $errorMessage = null; // Pour stocker les messages d'erreur
    require File::build_path(array("view", "Base.php"));
  }

  // Vérifier les informations de connexion
  public static function check() {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérification des informations d'identification
    $user = ModelUser::readByUsername($username);
    if ($user && password_verify($password, $user->getPassword())) {
      // Stocke l'utilisateur dans la session
      $_SESSION['user'] = $user;
      header('Location: index.php?controller=Home'); // Rediriger vers la page d'accueil
      exit();
    } else {
      // Erreur de connexion
      $errorMessage = 'Nom d\'utilisateur ou mot de passe incorrect.';
      $controller = 'login';
      $view = 'Login';
      $pagetitle = 'Connexion';
      require File::build_path(array("view", "Base.php"));
    }
  }

  // Déconnexion
  public static function logout() {
    session_destroy(); // Détruire la session
    header('Location: index.php?controller=Home&action=homeRoute'); // Rediriger vers la page d'accueil
    exit();
  }
}