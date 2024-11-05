<?php
require_once 'Model.php';

class ModelTeam extends Model {
  private int $id;
  private string $trigramme;
  private string $nom;
  private string $nom_court;
  private string $ville;
  private string $sport;
  private string $logo;

  function __construct($id = NULL, $trigramme = NULL, $nom = NULL, $nom_court = NULL, $ville = NULL, $sport = NULL, $logo = NULL) {
    if (!is_null($id) && !is_null($nom_court) && !is_null($logo)) {
      $this->id = $id;
      $this->trigramme = $trigramme;
      $this->nom = $nom;
      $this->nom_court = $nom_court;
      $this->ville = $ville;
      $this->sport = $sport;
      $this->logo = $logo;
    }
  }

  private function getClassName(): string {
    return 'ModelTeam';
  }

  // Getters
  public function getId(): int {
    return $this->id;
  }

  public function getTrigramme(): string {
    return $this->trigramme;
  }

  public function getNom(): string {
    return $this->nom;
  }

  public function getNomCourt(): string {
    return $this->nom_court;
  }

  public function getVille(): string {
    return $this->ville;
  }

  public function getSport(): string {
    return $this->sport;
  }

  public function getLogo(): string {
    return $this->logo;
  }

  // Setters
  public function setId(int $id): void {
    $this->id = $id;
  }

  public function setTrigramme(string $trigramme): void {
    $this->trigramme = $trigramme;
  }

  public function setNom(string $nom): void {
    $this->nom = $nom;
  }

  public function setNomCourt(string $nom_court): void {
    $this->nom_court = $nom_court;
  }

  public function setVille(string $ville): void {
    $this->ville = $ville;
  }

  public function setSport(string $sport): void {
    $this->sport = $sport;
  }

  public function setLogo(string $logo): void {
    $this->logo = $logo;
  }

  // CRUD methods
  // Method to create a new team
  public static function create($trigramme, $nom, $nom_court, $ville, $sport, $logo) {
    $sql = "INSERT INTO equipes (trigramme, nom, nom_court, ville, sport, logo)
            VALUES (:trigramme, :nom, :nom_court, :ville, :sport, :logo)";
    $values = array(
      "trigramme" => $trigramme,
      "nom" => $nom,
      "nom_court" => $nom_court,
      "ville" => $ville,
      "sport" => $sport,
      "logo" => $logo
    );
    $stmt = Model::getPDO()->prepare($sql);
    $stmt->execute($values);
    return Model::getPDO()->lastInsertId();
  }

  // Method to get all teams
  public static function readAll() {
    $sql = "SELECT id, trigramme, nom, nom_court, ville, sport, logo
            FROM equipes
            ORDER BY nom_court ASC";
    $stmt = Model::getPDO()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // Method to get a single team by ID
  public static function read($id) {
    $sql = "SELECT * FROM equipes WHERE id = :id";
    $values = array("id" => $id);
    $stmt = Model::getPDO()->prepare($sql);
    $stmt->execute($values);
    $stmt->setFetchMode(PDO::FETCH_CLASS, (new self())->getClassName());
    return $stmt->fetch();
  }

  // Method to update an existing team
  public static function update($id, $trigramme, $nom, $nom_court, $ville, $sport, $logo) {
    $sql = "UPDATE equipes 
            SET trigramme = :trigramme, nom = :nom, nom_court = :nom_court, ville = :ville, sport = :sport, logo = :logo 
            WHERE id = :id";
    $values = array(
      "id" => $id,
      "trigramme" => $trigramme,
      "nom" => $nom,
      "nom_court" => $nom_court,
      "ville" => $ville,
      "sport" => $sport,
      "logo" => $logo
    );
    $stmt = Model::getPDO()->prepare($sql);
    $stmt->execute($values);
  }

  // Method to delete a team by ID
  public static function delete($id) {
    $sql = "DELETE FROM equipes WHERE id = :id";
    $values = array("id" => $id);
    $stmt = Model::getPDO()->prepare($sql);
    $stmt->execute($values);
  }
}
