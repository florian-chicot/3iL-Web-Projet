<?php

require_once 'Model.php';

class ModelCompetition extends Model {

  private int $id;
  private string $nom;

  public function __construct($id = NULL, $nom = NULL) {
    if (!is_null($id) && !is_null($nom)) {
      $this->id = $id;
      $this->nom = $nom;
    }
  }

  // Getters and Setters
  public function getId(): int {
    return $this->id;
  }

  public function setId(int $id): void {
    $this->id = $id;
  }

  public function getNom(): string {
    return $this->nom;
  }

  public function setNom(string $nom): void {
    $this->nom = $nom;
  }

  // Method to get all competitions
  public static function readAll() {
    $sql = "SELECT * FROM competitions ORDER BY nom ASC";
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
    $stmt->setFetchMode(PDO::FETCH_CLASS, "ModelCompetition");
    return $stmt->fetch();
  }
}
