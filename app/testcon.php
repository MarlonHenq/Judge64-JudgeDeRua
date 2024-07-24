<?php
require_once __DIR__ . '/../app/func/loadEnv.php';
loadEnv(__DIR__ . '/../.env');

$dsn = 'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'];
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];

// Verificar os valores das variáveis
echo 'DSN: ' . $dsn . '<br>';
echo 'Username: ' . $username . '<br>';
echo 'Password: ' . $password . '<br>';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connection successful!';
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
