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
public function getNextLot(int $medicamentId)
{
    $stmt = $this->pdo->prepare("
        SELECT *
        FROM lots
        WHERE medicament_id = ?
        AND quantity > 0
        ORDER BY expirationDate ASC
        LIMIT 1
    ");

    $stmt->execute([$medicamentId]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
public function sortirMedicament(
    int $medicamentId,
    int $quantite
)
{
    $lot = $this->getNextLot($medicamentId);

    if(!$lot)
    {
        return false;
    }

    $nouvelleQuantite =
        max(0, $lot['quantity'] - $quantite);

    $update = $this->pdo->prepare("
        UPDATE lots
        SET quantity = ?
        WHERE id = ?
    ");

    $update->execute([
        $nouvelleQuantite,
        $lot['id']
    ]);

    $insert = $this->pdo->prepare("
        INSERT INTO mouvement_stock
        (lot_id,type,quantite)
        VALUES
        (?, 'SORTIE', ?)
    ");

    $insert->execute([
        $lot['id'],
        $quantite
    ]);

    return true;
}
public function updateStatusLots()
{
    $lots = $this->pdo
        ->query("SELECT * FROM lots")
        ->fetchAll(PDO::FETCH_ASSOC);

    foreach($lots as $lot)
    {
        $days = floor(
            (strtotime($lot['expirationDate']) - time())
            / 86400
        );

        if($days < 0)
        {
            $status = 'EXPIRED';
        }
        elseif($days < 30)
        {
            $status = 'CRITICAL';
        }
        elseif($days < 90)
        {
            $status = 'WARNING';
        }
        else
        {
            $status = 'OK';
        }

        $stmt = $this->pdo->prepare("
            UPDATE lots
            SET status = ?
            WHERE id = ?
        ");

        $stmt->execute([
            $status,
            $lot['id']
        ]);
    }
}
}