<?php
require_once 'Model.php';

class ModelContact extends Model {
  private int $id;
  private string $username;
  private string $subject;
  private string $message;
  private string $created_at;

  public function __construct($id = NULL, $username = NULL, $subject = NULL, $message = NULL) {
    if (!is_null($id) && !is_null($username) && !is_null($subject) && !is_null($message)) {
      $this->id = $id;
      $this->username = $username;
      $this->subject = $subject;
      $this->message = $message;
    }
  }

  private function getClassName(): string {
    return 'ModelContact';
  }

  // Getters
  public function getId(): int {
    return $this->id;
  }

  public function getUsername(): string {
    return $this->username;
  }

  public function getSubject(): string {
    return $this->subject;
  }

  public function getMessage(): string {
    return $this->message;
  }
  public function save() {
    $sql = "INSERT INTO contacts (username, subject, message) VALUES (:username, :subject, :message)";
    $stmt = Model::getPDO()->prepare($sql);
    $stmt->execute([
      'username' => $this->username,
      'subject' => $this->subject,
      'message' => $this->message
    ]);
  }

  // Method to add a new contact message
  public static function create($username, $subject, $message) {
    $sql = "INSERT INTO contacts (username, subject, message) VALUES (:username, :subject, :message)";
    $stmt = Model::getPDO()->prepare($sql);
    $stmt->execute([
      'username' => $username,
      'subject' => $subject,
      'message' => $message
    ]);
    return Model::getPDO()->lastInsertId();
  }

  // Method to get all contact messages
  public static function readAll() {
    $sql = "SELECT * FROM contacts ORDER BY created_at DESC";
    $stmt = Model::getPDO()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // Method to get a single contact message by ID
  public static function read($id) {
    $sql = "SELECT * FROM contacts WHERE id = :id";
    $values = array("id" => $id);
    $stmt = Model::getPDO()->prepare($sql);
    $stmt->execute($values);
    $stmt->setFetchMode(PDO::FETCH_CLASS, (new self())->getClassName());
    return $stmt->fetch();
  }
}
