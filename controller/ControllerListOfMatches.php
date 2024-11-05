<?php
require_once File::build_path(array("model", "ModelMatch.php"));

class ControllerListOfMatches {

  public static function readAll() {
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $limit = 8; // Nombre de matchs par page
    $offset = ($page - 1) * $limit;
    $matches = ModelMatch::readAllPaginated($limit, $offset);
    $totalMatches = ModelMatch::countMatches();
    $totalPages = ceil($totalMatches / $limit);

    $controller = "listOfMatches";
    $view = "ListOfMatches";
    $pagetitle = "Liste des matchs";
    $description ='';
    $stylesheets = ['pagination'];
    require File::build_path(array("view", "Base.php"));
}
}