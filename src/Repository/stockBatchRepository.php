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
            SELECT 
                l.id,
                m.name,
                l.batchNumero,
                l.quantity,
                l.expirationDate,
                l.status
            FROM lots l
            JOIN medicaments m ON m.id = l.medicament_id
            ORDER BY l.expirationDate ASC
        ";

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findCriticalLots()
{
    $stmt = $this->pdo->prepare("
        SELECT l.*,m.name
        FROM lots l
        JOIN medicaments m
        ON m.id=l.medicament_id
        WHERE l.status='CRITICAL'
        ORDER BY expirationDate ASC
    ");

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}