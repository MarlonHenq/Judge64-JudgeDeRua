<?php
ob_start();

require_once '../app/dbconnection.php';

$db = new Database();
$conn = $db->connect();

//Lógica paora usuário já logado
$user = $db->getUserByToken($_COOKIE['auth_token']);
if (!$user) {
    header('Location: index.php');
    exit;
}

if (!$_GET['id']){
    header('Location: dashboard.php');
    exit;
}

$exercise = $db->getExerciseById($_GET['id']);
if (!$exercise) {
    header('Location: dashboard.php');
    exit;
}

if ($user['admin']) {
    $admButtom = '<li class="nav-item">
                        <a class="nav-link active" aria-current="page">|</a>
                    </li> <a class="nav-link" href="createEx.php?id=' . $_GET['id'] . '" aria-current="page">Editar</a>';
}

$UserExercie = $db->getUserExercise($user['id'], $_GET['id']);

$code = '';
if ($UserExercie) {
    $code = $UserExercie['user_solution'];
}

require_once 'visual/exercise.php';
