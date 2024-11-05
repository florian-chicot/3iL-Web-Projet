<?php
require_once 'Model.php';

class ModelPresentationContent extends Model {
  private int $id;
  private string $content;

  public function __construct($id = NULL, $content = NULL) {
    if (!is_null($id) && !is_null($content)) {
      $this->id = $id;
      $this->content = $content;
    }
  }

  // Getters
  public function getId(): int {
    return $this->id;
  }

  public function getContent(): string {
    return $this->content;
  }

  // Méthode pour récupérer tout le contenu de la table presentation_content
  public static function readAll() {
    $sql = "SELECT * FROM presentation_content";
    $stmt = Model::getPDO()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_CLASS, 'ModelPresentationContent');
  }
}
