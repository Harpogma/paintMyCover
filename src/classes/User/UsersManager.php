<?php
namespace User;

use Database;

class UsersManager {
    private $database;
    
    public function __construct() {
        $this->database = new Database();
    }
    

//Récupère tous les utilisateurs
    public function getAllUsers(): array {
        $sql = "SELECT id, username, email, role FROM user ORDER BY id DESC";
        $stmt = $this->database->getPdo()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
//Met à jour le rôle d'un utilisateur
    public function updateUserRole(int $userId, string $role): bool {
        if (!in_array($role, ['admin', 'user'])) {
            throw new \InvalidArgumentException("Rôle invalide");
        }
        
        $sql = "UPDATE user SET role = :role WHERE id = :id";
        $stmt = $this->database->getPdo()->prepare($sql);
        $stmt->bindValue(':role', $role);
        $stmt->bindValue(':id', $userId);
        return $stmt->execute();
    }
    
// Supprime un utilisateur
    public function deleteUser(int $userId): bool {
        $sql = "DELETE FROM user WHERE id = :id";
        $stmt = $this->database->getPdo()->prepare($sql);
        $stmt->bindValue(':id', $userId);
        return $stmt->execute();
    }
}