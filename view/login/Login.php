<?php
$formTitle = "Connexion";
$formAction = "index.php?controller=Login&action=check";
$buttonText = "Se connecter";
$linkText = "Vous n'avez pas de compte ?";
$linkUrl = "index.php?controller=Signup&action=signupForm";
$linkAnchorText = "Inscrivez-vous";
require_once File::build_path(array("view", ".include", "TemplateLoginSignup.php"));