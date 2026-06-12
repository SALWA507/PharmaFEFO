<?php

require_once __DIR__ . '/../../config/database.php';

class ProductRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    public function findAll(): array
    {
        return $this->pdo->query("SELECT * FROM medicaments")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name,$code,$description): bool
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO medicaments(name,code,description)
            VALUES (?,?,?)
        ");

        return $stmt->execute([$name,$code,$description]);
    }
}