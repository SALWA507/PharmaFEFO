<?php

require_once __DIR__ . '/../Repository/stockBatchRepository.php';

class StockController
{
    public function list()
    {
        $repository = new StockBatchRepository();

        $lots = $repository->findAll();

        require __DIR__ . '/../../templates/dashboard/index.php';
    }
}