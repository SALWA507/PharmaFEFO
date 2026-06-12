<?php

require_once __DIR__ . '/../Repository/stockBatchRepository.php';

class StockController
{
    public function list()
    {
        $repo = new StockBatchRepository();
        $lots = $repo->findAll();

        require __DIR__ . '/../../templates/dashboard/index.php';
    }
}