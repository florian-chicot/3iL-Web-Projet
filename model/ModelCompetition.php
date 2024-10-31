<?php
require_once 'Model.php';

class ModelCompetition extends Model {
  private int $id;
  private string $nom;
  private string $sport;

  public function __construct($id = NULL, $nom = NULL, $sport = NULL) {
    if (!is_null($id) && !is_null($nom)) {
      $this->id = $id;
      $this->nom = $nom;
      $this->sport = $sport;
    }
  }

  private function getClassName(): string {
    return 'ModelCompetition';
  }

  // Getters
  public function getId(): int {
    return $this->id;
  }

  public function getNom(): string {
    return $this->nom;
  }

  public function getSport(): string {
    return $this->sport;
  }

  // Setters
  public function setId(int $id): void {
    $this->id = $id;
  }

  public function setNom(string $nom): void {
    $this->nom = $nom;
  }

  public function setSport(string $sport): void {
    $this->sport = $sport;
  }

  // CRUD
  // Method to add a new competition
  public static function create($nom, $sport) {
    $sql = "INSERT INTO competitions (nom, sport) VALUES (:nom, :sport)";
    $stmt = Model::getPDO()->prepare($sql);
    $stmt->execute(['nom' => $nom, 'sport' => $sport]);
    return Model::getPDO()->lastInsertId();
  }
  

  // Method to get all competitions
  public static function readAll() {
    $sql = "SELECT competitions.id, competitions.nom, sports.nom AS sport 
            FROM competitions 
            JOIN sports ON competitions.sport = sports.id 
            ORDER BY sports.nom ASC";
    $stmt = Model::getPDO()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // Method to get a single competition by ID
  public static function read($id) {
    $sql = "SELECT * FROM competitions WHERE id = :id";
    $values = array("id" => $id);
    $stmt = Model::getPDO()->prepare($sql);
    $stmt->execute($values);
    $stmt->setFetchMode(PDO::FETCH_CLASS, (new self())->getClassName());
    return $stmt->fetch();
  }

  // Method to updatte an existing competition
  public function update() {
      $sql = "UPDATE competitions SET nom = :nom, sport = :sport WHERE id = :id";
      $stmt = Model::getPDO()->prepare($sql);
      $stmt->execute([
        'id' => $this->id,
        'nom' => $this->nom,
        'sport' => $this->sport
      ]);
  }

  // Method to delete a competition
  public static function delete($id) {
      $sql = "DELETE FROM competitions WHERE id = :id";
      $values = array("id" => $id);
      $stmt = Model::getPDO()->prepare($sql);
      $stmt->execute($values);
  }
}