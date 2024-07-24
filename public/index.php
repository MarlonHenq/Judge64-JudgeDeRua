<?php
ob_start();

require_once '../app/dbconnection.php';
require_once 'visual/home.php';
require_once '../app/func/generateToken.php';

$db = new Database();
$conn = $db->connect();

//Lógica paora usuário já logado
if (isset($_COOKIE['auth_token'])) {
    $user = $db->getUserByToken($_COOKIE['auth_token']);
    if ($user) {
        header('Location: dashboard.php');
        exit;
    }
}

//Lógica de login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nickname = $_POST['nick'];
    $password = $_POST['password'];

    $user = $db->getUserByNickname($nickname);
    
    if ($user && password_verify($password, $user['password'])) {
        $token = generateToken();
        $db->updateUserToken($user['id'], $token);
        $db->updateUserLastLoginDate($user['id']);
        setcookie('auth_token', $token, time() + (86400 * 30), "/"); // Expira em 30 dias
        header('Location: dashboard.php');
        exit;
    } else {
        echo '<script>alert("Usuário ou Senha Incorreto!");</script>';
    }
}
