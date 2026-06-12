<?php

session_start();

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../src/Repository/UserRepository.php';

$error = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $repo = new UserRepository();

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $user = $repo->findByEmail($email);

    if ($user && $user['password'] === $password)
    {
        $_SESSION['user'] = $user;

        header('Location: index.php?page=dashboard');
        exit;
    }

    $error = "Email ou mot de passe incorrect";
}


if (!isset($_SESSION['user']))
{
    require_once __DIR__ . '/../templates/auth/login.php';
    exit;
}



require_once __DIR__ . '/../src/controller/dashboardController.php';
require_once __DIR__ . '/../src/controller/stockController.php';


$page = $_GET['page'] ?? 'dashboard';

switch ($page)
{
    case 'stock':
        (new StockController())->list();
        break;

    case 'dashboard':
    default:
        (new DashboardController())->index();
        break;
}