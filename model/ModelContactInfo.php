<?php
require_once 'Model.php';

class ModelContactInfo extends Model {
  private int $id;
  private string $name;
  private string $content;

  public function __construct($id = NULL, $name = NULL, $content = NULL) {
    if (!is_null($id) && !is_null($name) && !is_null($content)) {
      $this->id = $id;
      $this->name = $name;
      $this->content = $content;
    }
  }

  private function getClassName(): string {
    return 'ModelContactInfo';
  }

  public function getId(): int {
    return $this->id;
  }

  public function getName(): string {
    return $this->name;
  }

  public function getContent(): string {
    return $this->content;
  }

  public function save() {
    $sql = "INSERT INTO contact_info (name, content) VALUES (:name, :content)";
    $stmt = Model::getPDO()->prepare($sql);
    $stmt->execute([
      'name' => $this->name,
      'content' => $this->content
    ]);
  }

  public static function create($name, $content) {
    $sql = "INSERT INTO contact_info (name, content) VALUES (:name, :content)";
    $stmt = Model::getPDO()->prepare($sql);
    $stmt->execute([
      'name' => $name,
      'content' => $content
    ]);
    return Model::getPDO()->lastInsertId();
  }

  public static function readAll() {
    $sql = "SELECT * FROM contact_info";
    $stmt = Model::getPDO()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function read($id) {
    $sql = "SELECT * FROM contact_info WHERE id = :id";
    $values = array("id" => $id);
    $stmt = Model::getPDO()->prepare($sql);
    $stmt->execute($values);
    $stmt->setFetchMode(PDO::FETCH_CLASS, (new self())->getClassName());
    return $stmt->fetch();
  }
}
