<?php

require_once __DIR__ . '/../../config/database.php';

class UserRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    public function findByEmail(
        string $email
    )
    {
        $sql = "
        SELECT *
        FROM users
        WHERE email = ?
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([$email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}