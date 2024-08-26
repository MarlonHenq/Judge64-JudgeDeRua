<?php
require_once '../app/dbconnection.php';
$db = new Database();
$conn = $db->connect();
// Configuração
$icarusVerilogPath = 'iverilog';
$iverilogOptions = '-o ';
$testbenchDir = __DIR__ . '/test/';

// Recebe o código Verilog via POST e o ID do testbench via GET
$verilogCode = $_POST['code'];
$testbenchId = $_GET['testbench_id'];
$userId = $_GET['user_id'];

$result = 0;


if (empty($verilogCode) || empty($testbenchId)) {
    echo json_encode(['status' => 'error', 'message' => 'API: Código Verilog não fornecido.']);
    exit;
}

// Limite de tamanho para o código Verilog e ID do testbench
$maxCodeSize = 1000000; // exemplo de tamanho máximo em bytes
if (strlen($verilogCode) > $maxCodeSize) {
    echo json_encode(['status' => 'error', 'message' => 'API: Código Verilog muito grande.']);
    exit;
}

// Gera um ID único para a execução
$executionId = uniqid('test_', true);
$executionDir = __DIR__ . "/tmp/$executionId";

if (!mkdir($executionDir, 0777, true)) {
    echo json_encode(['status' => 'error', 'message' => 'API ERROR: Não foi possível criar o diretório temporário.']);
    exit;
}

// Salva o código Verilog em um arquivo dentro do diretório temporário
$verilogFile = "$executionDir/code.v";
//error_log ($verilogCode);
file_put_contents($verilogFile, $verilogCode);

// Verifica se o testbench existe
$testbenchFile = $testbenchDir . $testbenchId . '.v';
//error_log($testbenchFile);
if (!file_exists($testbenchFile)) {
    echo json_encode(['status' => 'error', 'message' => 'API ERROR: Testbench não encontrado.']);
    deleteDirectory($executionDir);
    exit;
}

// Cria um arquivo de teste temporário no diretório
$testFile = "$executionDir/testbench.v";
copy($testbenchFile, $testFile);

$iverlog = $iverilogOptions . $executionDir . '/test_run ';

// Executa o Icarus Verilog para compilar o código e o testbench
$command = escapeshellcmd("$icarusVerilogPath $iverlog $verilogFile $testFile");
exec($command, $output, $returnVar);

// Checa se a compilação foi bem-sucedida
if ($returnVar === 0) {
    $runCommand = escapeshellcmd("$executionDir/test_run");
    exec($runCommand, $runOutput, $runReturnVar);

    if ($runReturnVar === 0) {
        // for ($i = 0; $i < count($runOutput); $i++) {
        //     error_log($i . $runOutput[$i]);
        // }
        if ($runOutput[0] == 'erro') {
            echo json_encode(['status' => 'failure', 'message' => 'Teste falhou.']);
        } else {
            echo json_encode(['status' => 'success', 'message' => 'Teste bem-sucedido.']);
            $result = 1;
        }
    }
}
else {
    echo json_encode(['status' => 'error', 'message' => 'Erro na compilação.']);
}

// Limpeza: remove o diretório temporário e seu conteúdo
function deleteDirectory($dir) {
    if (!file_exists($dir)) {
        return true;
    }

    if (!is_dir($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }
    }

    return rmdir($dir);
}

deleteDirectory($executionDir);

//Aqui colocar depois a atualização no banco do usuário

$exercise = $db->getUserExercise($userId, $testbenchId);
if ($exercise) {
    $db->updateUserExercise($userId, $testbenchId, $result, date('Y-m-d H:i:s'), $verilogCode);
} else {
    $db->createUserExercise($userId, $testbenchId, $result, date('Y-m-d H:i:s'), $verilogCode);
}