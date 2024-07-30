<?php
$testbenchDir = __DIR__ . '/test/';

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

$torf = false;
$name = '';
$des = '';
$tests = '';
$diff = '';
$code = '';

if ($_GET['id'] > 0){
    $torf = true;
}

if ($torf) {
    $exercise = $db->getExerciseById($_GET['id']);
    if (!$exercise) {
        header('Location: dashboard.php');
        exit;
    }

    $id = $_GET['id'];
    $name = $exercise['name'];
    $des = $exercise['description'];
    $tests = $exercise['test'];
    $diff = $exercise['difficulty'];
    $code = $exercise['code'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $test = $_POST['test'];
        $difficulty = $_POST['difficulty'];
        $code = $_POST['code'];

        $db->updateExercise($_GET['id'], $name, $description, $difficulty, $test, $code);

        //Criar o arquivo do testbench com o id do exercício dado pelo banco
        $testbenchFile = $testbenchDir . $_GET['id'] . '.v';
        //Deleta testbench antigo
        if (file_exists($testbenchFile)) {
            unlink($testbenchFile);
        }

        file_put_contents($testbenchFile, $test);

        echo '<div class="alert alert-success" role="alert">Exercício editado com sucesso!</div>';
        header('Location: dashboard.php');
        exit;
    } 
}
else{

    $id = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $test = $_POST['test'];
        $difficulty = $_POST['difficulty'];
        $code = $_POST['code'];


        $db->createExercise($name, $description, $difficulty, $test, $code);

        //Criar o arquivo do testbench com o id do exercício dado pelo banco
        $testbenchFile = $testbenchDir . $db->getLastId() . '.v';
        file_put_contents($testbenchFile, $test);

        echo '<div class="alert alert-success" role="alert">Exercício criado com sucesso!</div>';
        header('Location: dashboard.php');
        exit;
    } 
}


require_once 'visual/createEx.php';