<?php
require_once File::build_path(array("model", "ModelUser.php"));

class ControllerSignup {
  
  // Affiche le formulaire d'inscription
  public static function signupForm() {
    $controller = 'signup';
    $view = 'Signup';
    $pagetitle = 'Inscription';
    $errorMessage = null;
    require File::build_path(array("view", "Base.php"));
  }

  // Gère la création d'un nouvel utilisateur
  public static function register() {
    // Récupère les données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérification de la connexion à la base de données
    try {
        $pdo = Model::getPDO();
    } catch (PDOException $e) {
        die("Could not connect to the database: " . $e->getMessage());
    }
    
    // Vérifie que le nom d'utilisateur est unique
    if (ModelUser::userExists($username)) {
      $errorMessage = "Ce nom d'utilisateur est déjà pris.";
      $controller = 'signup';
      $view = 'Signup';
      $pagetitle = 'Inscription';
      require File::build_path(array("view", "Base.php"));
      return;
    }
    
    // Crée un nouvel utilisateur
    $user = new ModelUser($username, $password);
    $user->save();

    // Redirige vers la page de connexion
    header("Location: index.php?controller=Login&action=loginForm");
    exit();
  }
}
