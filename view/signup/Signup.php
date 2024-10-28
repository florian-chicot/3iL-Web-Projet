<?php
$formTitle = "Inscription";
$formAction = "index.php?controller=Signup&action=register";
$buttonText = "S'inscrire";
$linkText = "Vous avez déjà un compte ?";
$linkUrl = "index.php?controller=Login&action=loginForm";
$linkAnchorText = "Connectez-vous";
require_once File::build_path(array("view", ".include", "TemplateLoginSignup.php"));