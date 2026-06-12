<?php

require_once __DIR__ . '/../Repository/stockBatchRepository.php';

class DashboardController
{
    public function index()
    {
        $repo = new StockBatchRepository();
        $lots = $repo->findAll();

        $total = count($lots);
        $warning = count(array_filter($lots, fn($l) => $l['status'] == 'WARNING'));
        $critical = count(array_filter($lots, fn($l) => $l['status'] == 'CRITICAL'));

        require __DIR__ . '/../../templates/dashboard/index.php';
    }
}