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

  private function getClassName(): string {
    return 'ModelStadium';
  }

  // Getters
  public function getId(): int {
    return $this->id;
  }

  public function getNom(): string {
    return $this->nom;
  }

  public function getCapacite(): int {
    return $this->capacite;
  }

  public function getVille(): string {
    return $this->ville;
  }

  public function getPays(): string {
    return $this->pays;
  }

  // Setters
  public function setId(int $id): void {
    $this->id = $id;
  }

  public function setNom(string $nom): void {
    $this->nom = $nom;
  }

  public function setCapacite(int $capacite): void {
    $this->capacite = $capacite;
  }

  public function setVille(string $ville): void {
    $this->ville = $ville;
  }

  public function setPays(string $pays): void {
    $this->pays = $pays;
  }

  // CRUD methods
  // Method to create a new stadium
  public function create() {
    $sql = "INSERT INTO stades (nom, capacite, ville, pays) VALUES (:nom, :capacite, :ville, :pays)";
    $stmt = Model::getPDO()->prepare($sql);
    $stmt->execute([
      'nom' => $this->nom,
      'capacite' => $this->capacite,
      'ville' => $this->ville,
      'pays' => $this->pays
    ]);
    $this->id = Model::getPDO()->lastInsertId();
  }

  // Method to get all stadia
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
    $stmt->setFetchMode(PDO::FETCH_CLASS, (new self())->getClassName());
    return $stmt->fetch();
  }

  // Method to update a stadium
  public function update() {
    $sql = "UPDATE stades SET nom = :nom, capacite = :capacite, ville = :ville, pays = :pays WHERE id = :id";
    $stmt = Model::getPDO()->prepare($sql);
    $stmt->execute([
      'nom' => $this->nom,
      'capacite' => $this->capacite,
      'ville' => $this->ville,
      'pays' => $this->pays,
      'id' => $this->id
    ]);
  }

  // Method to delete a stadium by ID
  public static function delete($id) {
    $sql = "DELETE FROM stades WHERE id = :id";
    $stmt = Model::getPDO()->prepare($sql);
    $stmt->execute(['id' => $id]);
  }
}
