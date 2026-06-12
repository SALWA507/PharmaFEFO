<?php

require_once __DIR__ . '/../Repository/stockBatchRepository.php';

class DashboardController
{
   public function index()
{
    $repository = new StockBatchRepository();

    $lots = $repository->findAllFEFO();

    $criticalLots = $repository->getCriticalLots();
    $totalLots = count($lots);
$warnings = 0;
$critical = 0;

foreach($lots as $lot){
    if($lot['status'] == 'WARNING') $warnings++;
    if($lot['status'] == 'CRITICAL') $critical++;
}

    require __DIR__ . '/../../templates/dashboard/index.php';
}
}