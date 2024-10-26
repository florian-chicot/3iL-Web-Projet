<?php

require_once File::build_path(array("model", "ModelCompetition.php"));
require_once File::build_path(array("model", "ModelMatch.php"));
require_once File::build_path(array("model", "ModelSport.php"));
require_once File::build_path(array("model", "ModelStadium.php"));
require_once File::build_path(array("model", "ModelTeam.php"));

class ControllerMatch {

  public static function matchRoute() {
    $id = $_GET["id"];
    $match = ModelMatch::read($id);
    $competition = ModelCompetition::read($match->getCompetition());
    $sport = ModelSport::read($match->getSport());
    $stade = ModelStadium::read($match->getStade());
    $equipeDomicile = ModelTeam::read($match->getDomicileEquipe());
    $equipeVisiteur = ModelTeam::read($match->getVisiteurEquipe());

    $controller = 'match';
    $view = 'Match';
    $pagetitle = 'Match';
    $description ='';
    require File::build_path(array("view", "Base.php"));
  }
}

// ?controller=Matches&action=matchRoute
