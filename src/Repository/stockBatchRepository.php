<?php

require_once __DIR__ . '/../../config/database.php';

class StockBatchRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    public function findAll(): array
    {
        $sql = "
        SELECT l.*, m.name
        FROM lots l
        JOIN medicaments m
        ON l.medicament_id = m.id
        ";

        return $this->pdo
            ->query($sql)
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFEFOLot(
        int $medicamentId
    )
    {
        $sql = "
        SELECT *
        FROM lots
        WHERE medicament_id = ?
        AND quantity > 0
        AND status <> 'EXPIRED'
        ORDER BY expirationDate ASC
        LIMIT 1
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([$medicamentId]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getCriticalLots(): array
    {
        $sql = "
        SELECT *
        FROM lots
        WHERE status = 'CRITICAL'
        ";

        return $this->pdo
            ->query($sql)
            ->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findAllFEFO(): array
{
    $sql = "
        SELECT l.*, m.name
        FROM lots l
        JOIN medicaments m ON l.medicament_id = m.id
        ORDER BY l.expirationDate ASC
    ";

    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
}
