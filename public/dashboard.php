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

//Lógica para usuário administrador
$admButtom = '';
if ($user['admin']) {
    $admButtom = '<li class="nav-item">
                        <a class="nav-link active" aria-current="page">|</a>
                    </li> <a class="nav-link" href="createEx.php" aria-current="page">Criar Exercício</a>';
}

//Lógica para pegar os exercícios
$exercises = $db->getExercises();
$userCompletedExercises = $db->getUserCompletedExercises($user['id']);

$exercisesCount = count($exercises);

$content = '<div class="row"> ';

if ($exercisesCount == 0) {
    $content .= '</div>';
}

for ($i = 0; $i < $exercisesCount; $i++) {
    if (in_array($exercises[$i]['id'], $userCompletedExercises)) {
        $content .= '<div class="col-md-4">
                <div class="card card-success">
                    <div class="card-body">
                        <h5 class="card-title">' . $exercises[$i]['name'] . '</h5>
                        <div class="d-flex justify-content-between">
                            <span class="badge">' . $exercises[$i]['id'] . ': ' . $exercises[$i]['difficulty'] . '</span>
                            <a href="exercise.php?id=' . $exercises[$i]['id'] . '" class="btn">Ver</a>
                        </div>
                    </div>
                </div>
                <br>
            </div>';
    }
    else {
        $content .= '<div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">' . $exercises[$i]['name'] . '</h5>
                        <div class="d-flex justify-content-between">
                            <span class="badge">' . $exercises[$i]['id'] . ': ' . $exercises[$i]['difficulty'] . '</span>
                            <a href="exercise.php?id=' . $exercises[$i]['id'] . '" class="btn btn-default">Fazer</a>
                        </div>
                    </div>
                </div>
                <br>
            </div>';
    }
        
    if ($i+1 % 3 == 0) {
        $content .= '</div>';
        if ($i+1 != $exercisesCount) {
            $content .= '<div class="row">';
        }
    }
}

if ($exercisesCount % 3 != 0) {
    $content .= '</div>';
}


//Exercícios feitos pelo usuário
$userCompletedExercises = $db->getUserCompletedExercises($user['id']);
$completed = count($userCompletedExercises);

require_once 'visual/dashboard.php';
