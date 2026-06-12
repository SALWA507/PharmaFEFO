<?php
session_start();

require_once '../src/Repository/UserRepository.php';

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $repo = new UserRepository();

    $user = $repo->findByEmail($_POST['email']);

    if($user && $_POST['password'] === $user['password'])
    {
        $_SESSION['user'] = $user;

        header('Location: index.php');
        exit;
    }

    $error = "Email ou mot de passe incorrect";
}
?>

<form method="POST">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button>Connexion</button>
</form>