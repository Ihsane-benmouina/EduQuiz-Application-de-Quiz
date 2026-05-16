<?php
namespace App\Repositories;
use PDO;

class UserRepository {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Sauvegarder user jdid
    public function registerUser($firstname, $lastname, $email, $passwordHash, $labelRole) {
        try {
            $sql = "INSERT INTO users (firstname, lastname, email, password, label_role) 
                    VALUES (:firstname, :lastname, :email, :password, :label_role)";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                ':firstname'  => $firstname,
                ':lastname'   => $lastname,
                ':email'      => $email,
                ':password'   => $passwordHash,
                ':label_role' => $labelRole // 'formateur' aw 'student'
            ]);
        } catch (\Exception $e) {
            return false;
        }
    }

    // Jbed user b l-email
    public function getUserByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}