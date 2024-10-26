<?php

require_once 'Model.php';

class ModelStadium extends Model {

  private int $id;
  private string $nom;
  private int $capacite;
  private string $ville;
  private string $pays;

  public function __construct($id = NULL, $nom = NULL, $capacite = NULL, $ville = NULL, $pays = NULL) {
    if (!is_null($id) && !is_null($nom) && !is_null($capacite) && !is_null($ville) && !is_null($pays)) {
      $this->id = $id;
      $this->nom = $nom;
      $this->capacite = $capacite;
      $this->ville = $ville;
      $this->pays = $pays;
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

  public function getCapacite(): int {
    return $this->capacite;
  }

  public function setCapacite(int $capacite): void {
    $this->capacite = $capacite;
  }

  public function getVille(): string {
    return $this->ville;
  }

  public function setVille(string $ville): void {
    $this->ville = $ville;
  }

  public function getPays(): string {
    return $this->pays;
  }

  public function setPays(string $pays): void {
    $this->pays = $pays;
  }

  // Method to get all stadiums
  public static function readAll() {
    $sql = "SELECT * FROM stades ORDER BY nom ASC";
    $stmt = Model::getPDO()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // Method to get a single stadium by ID
  public static function read($id) {
    $sql = "SELECT * FROM stades WHERE id = :id";
    $values = array("id" => $id);

    $stmt = Model::getPDO()->prepare($sql);
    $stmt->execute($values);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "ModelStadium");
    return $stmt->fetch();
  }
}
