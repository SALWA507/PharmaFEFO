<?php

require_once __DIR__ . '/../config/database.php';

require_once __DIR__ . '/../src/controller/dashboardController.php';
require_once __DIR__ . '/../src/controller/stockController.php';

$page = $_GET['page'] ?? 'dashboard';

switch ($page) {

    case 'stock':
        (new StockController())->list();
        break;

    default:
        (new DashboardController())->index();
        break;
}