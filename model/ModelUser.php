<?php

require_once 'Model.php';

class ModelUser extends Model {

    private int $id;
    private string $username;
    private string $password;
    private ?string $email;
    private string $created_at;

    public function __construct($username = null, $password = null, $email = null) {
        if (!is_null($username) && !is_null($password)) {
            $this->username = $username;
            $this->password = password_hash($password, PASSWORD_DEFAULT); // Hachage direct ici
            $this->email = $email;
        }
    }


    // Getters
    public function getId(): int {
        return $this->id;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getEmail(): ?string {
        return $this->email;
    }

    public function getCreatedAt(): string {
        return $this->created_at;
    }

    // Setters
    public function setUsername(string $username): void {
        $this->username = $username;
    }

    public function setPassword(string $password): void {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function setEmail(?string $email): void {
        $this->email = $email;
    }

    // Méthode pour vérifier si un utilisateur existe par son nom d'utilisateur
    public static function userExists($username): bool {
        $sql = "SELECT COUNT(*) FROM users WHERE username = :username";
        $stmt = Model::getPDO()->prepare($sql);
        $stmt->execute(['username' => $username]);
        return $stmt->fetchColumn() > 0;
    }

    // Sauvegarde un utilisateur dans la base de données
    public function save() {
      $sql = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
      $stmt = Model::getPDO()->prepare($sql);
      $stmt->execute([
          'username' => $this->username,
          'password' => $this->password,
          'email' => $this->email
      ]);
  }

    // Database interactions
    public static function readAll() {
        $sql = "SELECT * FROM users";
        $stmt = Model::getPDO()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function readByUsername($username) {
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = Model::getPDO()->prepare($sql);
        $stmt->execute(['username' => $username]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, "ModelUser");
        return $stmt->fetch();
    }

    public static function create($username, $password, $email = null) {
        $sql = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
        $stmt = Model::getPDO()->prepare($sql);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->execute(['username' => $username, 'password' => $hashedPassword, 'email' => $email]);
        return Model::getPDO()->lastInsertId();
    }
}