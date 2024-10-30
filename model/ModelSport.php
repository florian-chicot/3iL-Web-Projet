<?php
require_once 'Model.php';

class ModelSport extends Model {
  private int $id;
  private string $nom;

  public function __construct($id = NULL, $nom = NULL) {
    if (!is_null($id) && !is_null($nom)) {
      $this->id = $id;
      $this->nom = $nom;
    }
  }

  private function getClassName(): string {
    return 'ModelSport';
  }

  // Getters
  public function getId(): int {
    return $this->id;
  }

  public function getNom(): string {
    return $this->nom;
  }

  // Setters
  public function setId(int $id): void {
    $this->id = $id;
  }

  public function setNom(string $nom): void {
    $this->nom = $nom;
  }

  // CRUD
  // Method to create a new sport
  public function create() {
    $sql = "INSERT INTO sports (nom) VALUES (:nom)";
    $stmt = Model::getPDO()->prepare($sql);
    $stmt->execute([
        'nom' => $this->nom
    ]);
    $this->id = Model::getPDO()->lastInsertId();
  }

  // Method to get all sports
  public static function readAll() {
    $sql = "SELECT * FROM sports ORDER BY nom ASC";
    $stmt = Model::getPDO()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // Method to get a single sport by ID
  public static function read($id) {
    $sql = "SELECT * FROM sports WHERE id = :id";
    $values = array("id" => $id);

    $stmt = Model::getPDO()->prepare($sql);
    $stmt->execute($values);
    $stmt->setFetchMode(PDO::FETCH_CLASS, (new self())->getClassName());
    return $stmt->fetch();
  }

  // Method to update a sport
  public function update() {
      $sql = "UPDATE sports SET nom = :nom WHERE id = :id";
      $stmt = Model::getPDO()->prepare($sql);
      $stmt->execute([
          'nom' => $this->nom,
          'id' => $this->id
      ]);
  }

  // Method to delete a sport
  public static function delete($id) {
      $sql = "DELETE FROM sports WHERE id = :id";
      $stmt = Model::getPDO()->prepare($sql);
      $stmt->execute(['id' => $id]);
  }
}