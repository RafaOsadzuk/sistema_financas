<?php

require_once __DIR__ . '/src/models/Database.php';
require_once __DIR__ . '/src/controllers/Receita.php';
require_once __DIR__ . 'src\controllers\Despesa.php';
require_once __DIR__ . 'src\controllers\Saldo.php';
require_once __DIR__ . 'src\models\SaldoModel.php';

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