<?php

require_once __DIR__ . '/../Enum/BatchStatus.php';

class StockBatch
{
    private int $id;
    private int $medicamentId;
    private string $batchNumero;
    private int $quantity;
    private string $expirationDate;
    private BatchStatus $status;

    public function getId(): int
    {
        return $this->id;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getExpirationDate(): string
    {
        return $this->expirationDate;
    }

    public function getStatus(): BatchStatus
    {
        return $this->status;
    }
}