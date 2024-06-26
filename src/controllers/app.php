<?php

require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/Receita.php';
require_once __DIR__ . '/Despesas.php';
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
<<<<<<< HEAD
 
    

=======
>>>>>>> 9d4d51af36797b7bec97f05f2d12ac2110048dfa
    $saldo = new Saldo($_POST['saldo']);
    $saldoModel = new SaldoModel($saldo);

    try {
        if ($saldoModel->save()) {
            echo json_encode(['message' => 'Saldo adicionado com sucesso!']);
            exit();
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Erro ao adicionar saldo.']);
        }
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['message' => 'Erro ao adicionar saldo: ' . $e->getMessage()]);
    }
} else {
    try {
        $stmt = $pdo->prepare('SELECT saldo FROM SaldoUsuario');
        $stmt->execute();
        $saldo = $stmt->fetchAll(PDO::FETCH_ASSOC);

        header('Content-Type: application/json');
        echo json_encode($saldo);
        exit();
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['message' => 'Erro ao recuperar saldo: ' . $e->getMessage()]);
    }
}