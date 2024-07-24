<?php
require_once '../app/dbconnection.php';
require_once 'visual/create.php';
require_once '../app/func/generateToken.php';

$db = new Database();
$conn = $db->connect();
ob_start();

//Lógica paora usuário já logado
if (isset($_COOKIE['auth_token'])) {
    $user = $db->getUserByToken($_COOKIE['auth_token']);
    if ($user) {
        header('Location: dashboard.php');
        exit;
    }
}

//Lógica de cadastro
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['name'];
    $nickname = $_POST['nick'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $token = generateToken();

    $user = $db->getUserByNickname($nickname);

    if ($user) {
        echo '<script>alert("Nome de Usuário já cadastrado!");</script>';
    } else {
        $db->createUser($username, $nickname, $password, $token);
        setcookie('auth_token', $token, time() + (86400 * 30), "/"); // Expira em 30 dias
        header('Location: dashboard.php');
        exit;
    }
}