<?php

require_once 'Model.php';

class ModelMatch extends Model {

  private int $id;
  private string $sport;
  private $date_match;
  private int $domicile_equipe;
  private int $domicile_score;
  private int $visiteur_equipe; 
  private int $visiteur_score;
  private int $stade; 
  private int $affluence;
  private int $competition; 
  function __construct($id = NULL, $sport = NULL, $date_match = NULL, $domicile_equipe = NULL, $domicile_score = NULL, $visiteur_equipe = NULL, $visiteur_score = NULL, $stade = NULL, $affluence = NULL, $competition = NULL) {
    if (!is_null($id)&&!is_null($sport)&&!is_null($date_match)&&!is_null($domicile_equipe)&&!is_null($domicile_score)&&!is_null($visiteur_equipe)&&!is_null($visiteur_score)&&!is_null($stade)&&!is_null($affluence)&&!is_null($competition)) {
      $this->id=$id;
      $this->sport=$sport;
      $this->date_match=$date_match;
      $this->domicile_equipe=$domicile_equipe;
      $this->domicile_score=$domicile_score;
      $this->visiteur_equipe=$visiteur_equipe;
      $this->visiteur_score=$visiteur_score;
      $this->stade=$stade;
      $this->affluence=$affluence;
      $this->competition=$competition;
    }
  }

  public function getId(): int {
    return $this->id;
  }

  public function setId(int $id): void {
    $this->id = $id;
  }

  public function getSport(): string {
    return $this->sport;
  }

  public function setSport(string $sport): void {
    $this->sport = $sport;
  }

  public function getDateMatch() {
    return $this->date_match;
  }

  public function setDateMatch($date_match): void {
    $this->date_match = $date_match;
  }

  public function getDomicileEquipe(): int {
    return $this->domicile_equipe;
  }

  public function setDomicileEquipe(int $domicile_equipe): void {
    $this->domicile_equipe = $domicile_equipe;
  }

  public function getDomicileScore(): int {
    return $this->domicile_score;
  }

  public function setDomicileScore(int $domicile_score): void {
    $this->domicile_score = $domicile_score;
  }

  public function getVisiteurEquipe(): int {
    return $this->visiteur_equipe;
  }

  public function setVisiteurEquipe(int $visiteur_equipe): void {
    $this->visiteur_equipe = $visiteur_equipe;
  }

  public function getVisiteurScore(): int {
    return $this->visiteur_score;
  }

  public function setVisiteurScore(int $visiteur_score): void {
    $this->visiteur_score = $visiteur_score;
  }

  public function getStade(): int {
    return $this->stade;
  }

  public function setStade(int $stade): void {
    $this->stade = $stade;
  }

  public function getAffluence(): int {
    return $this->affluence;
  }

  public function setAffluence(int $affluence): void {
    $this->affluence = $affluence;
  }

  public function getCompetition(): int {
    return $this->competition;
  }

  public function setCompetition(int $competition): void {
    $this->competition = $competition;
  }

  public static function readAll() {
    $sql = "
      SELECT 
        matchs.id,
        matchs.date_match,
        matchs.sport,
        matchs.domicile_score,
        matchs.visiteur_score,
        matchs.affluence,
        e1.nom_court AS equipe_domicile,
        e1.logo AS logo_domicile,
        e2.nom_court AS equipe_visiteur,
        e2.logo AS logo_visiteur,
        competitions.nom AS competition
      FROM matchs
      JOIN equipes e1 ON matchs.domicile_equipe = e1.id
      JOIN equipes e2 ON matchs.visiteur_equipe = e2.id
      JOIN competitions ON matchs.competition = competitions.id
      ORDER BY matchs.date_match DESC
    ";
    $stmt = Model::getPDO()->prepare($sql); 
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function read($id) {
    $sql = "SELECT * FROM matchs WHERE matchs.id = :id";

    $values = array(
      "id" => $id
    );

    $stmt = Model::getPDO()->prepare($sql);
    $stmt->execute($values);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "ModelMatch");
    return  $stmt->fetch();
  }
}

// $sql = "
//   SELECT 
//     matchs.id,
//     matchs.date_match,
//     matchs.sport,
//     matchs.domicile_score,
//     matchs.visiteur_score,
//     matchs.affluence,
//     e1.nom AS equipe_domicile,
//     e1.trigramme AS equipe_domicile_tri,
//     e1.ville AS ville_domicile,
//     e1.logo AS logo_domicile,
//     e2.nom AS equipe_visiteur,
//     e2.trigramme AS equipe_visiteur_tri,
//     e2.ville AS ville_visiteur,
//     e2.logo AS logo_visiteur,
//     stades.nom AS stade_nom,
//     stades.ville AS stade_ville,
//     stades.pays AS stade_pays,
//     competitions.nom AS competition
//   FROM matchs
//   JOIN equipes e1 ON matchs.domicile_equipe = e1.id
//   JOIN equipes e2 ON matchs.visiteur_equipe = e2.id
//   JOIN stades ON matchs.stade = stades.id
//   JOIN competitions ON matchs.competition = competitions.id
//   WHERE matchs.id = :id
// ";