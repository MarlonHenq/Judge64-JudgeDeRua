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

//Lógica para pegar os exercícios
$exercises = $db->getExercises();

foreach ($exercises as $exercise) {
    $content .= '<div class="card mt-3">';
    $content .= '<div class="card-body">';
    $content .= '<h5 class="card-title">' . $exercise['name'] . '</h5>';
    $content .= '<p class="card-text">' . $exercise['description'] . '</p>';
    $content .= '<a href="exercise.php?id=' . $exercise['id'] . '" class="btn btn-primary">Ver</a>';
    $content .= '</div>';
    $content .= '</div>';
}

$userCompletedExercises = $db->getUserCompletedExercises($user['id']);

$completed = count($userCompletedExercises);

require_once 'visual/dashboard.php';