<?php

require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/Receita.php';
require_once __DIR__ . '/Despesa.php';
require_once __DIR__ . '/Saldo.php';
require_once __DIR__ . '/../models/SaldoModel.php';

/*
if (isset($_POST['saldo'])) {
    
    $saldoValue = filter_var($_POST['saldo'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    
    $saldo = new Saldo((float) $saldoValue);

    
    $saldoModel = new SaldoModel($saldo);

    if ($saldoModel->save()) {
        echo json_encode(['message' => 'Saldo adicionado com sucesso!']);
    } else {
        http_response_code(500);
        echo json_encode(['message' => 'Erro ao adicionar saldo.']);
    }
} else {
    http_response_code(400);
    echo json_encode(['message' => 'Saldo não enviado via formulário.']);
    
}
*/

$pdo = Database::getConn();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    //$aluno = new Aluno($_POST['nome'], $_POST['Ra'], $_POST['email']);

    $saldo = new Saldo($_POST['saldo']);
    
   
    $saldoModel = new SaldoModel($saldo);
    if ($saldoModel->save()) {
        
        exit();
    } else {
        
        echo "Não foi possível salvar o aluno no banco de dados.";
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $stmt = $pdo->query('SELECT saldo FROM SaldoUsuario');
    $saldo = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    header('Content-Type: application/json');
    echo json_encode($saldo);
    exit();
} else {
    echo "Impossível conectar no banco";
}