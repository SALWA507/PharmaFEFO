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
        $sql = "SELECT * FROM medicaments";

        return $this->pdo
            ->query($sql)
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(
        string $name,
        string $code,
        string $description
    ): bool
    {
        $sql = "
        INSERT INTO medicaments
        (name,code,description)
        VALUES
        (?,?,?)
        ";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            $name,
            $code,
            $description
        ]);
    }
}