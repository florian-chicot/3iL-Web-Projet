<?php

require_once 'Model.php';

class ModelUser extends Model {

    private int $id;
    private string $username;
    private string $password;
    private ?string $email;
    private string $created_at;
    private string $role;

    public function __construct($username = null, $password = null, $email = null, $role = "user") {
        if (!is_null($username) && !is_null($password) && !is_null($role)) {
            $this->username = $username;
            $this->password = password_hash($password,  PASSWORD_BCRYPT);
            $this->email = $email;
            $this->role = $role;
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

    public function getRole(): string {
        return $this->role;
    }

    // Setters
    public function setUsername(string $username): void {
        $this->username = $username;
    }

    public function setPassword(string $password): void {
        $this->password = password_hash($password,  PASSWORD_BCRYPT);
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

    public function isAdmin() {
        return $this->role === 'admin';
    }

    // Sauvegarde un utilisateur dans la base de données
    public function save() {
        $sql = "INSERT INTO users (username, password, email, role) VALUES (:username, :password, :email, :role)";
        $stmt = Model::getPDO()->prepare($sql);
        $stmt->execute([
            'username' => $this->username,
            'password' => $this->password,
            'email' => $this->email,
            'role' => $this->role
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

    public static function create($username, $password, $email = null, $role = "user") {
        $sql = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
        $stmt = Model::getPDO()->prepare($sql);
        $hashedPassword = password_hash($password,  PASSWORD_BCRYPT);
        $stmt->execute(['username' => $username, 'password' => $hashedPassword, 'email' => $email, 'role' => $role]);
        return Model::getPDO()->lastInsertId();
    }
}