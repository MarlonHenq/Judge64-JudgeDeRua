<?php
ob_start();

require_once '../app/dbconnection.php';

$db = new Database();
$conn = $db->connect();

//Lógica para o usuário já logado e apenas adms podem acessar
$user = $db->getUserByToken($_COOKIE['auth_token']);
if (!$user || !$user['admin']) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $test = $_POST['test'];
    $difficulty = $_POST['difficulty'];

    //Criar arquivo aqui

    $db->createExercise($name, $description, $difficulty, $test);
    echo '<div class="alert alert-success" role="alert">Exercício criado com sucesso!</div>';
    header('Location: dashboard.php');
    exit;
}

require_once 'visual/createEx.php';