<?php

require_once __DIR__ . '/Despesas.php';
require_once __DIR__ . '/Receitas.php';
require_once __DIR__ . '/Saldo.php';
require_once __DIR__ . '/../models/ReceitaModel.php';
require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/SaldoModel.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$receitas = new Receitas( (int)$_POST['id'],
                            (float)$_POST['valor'],
                            new DateTimeImmutable($_POST['data']),
                            $_POST['descricao'],
                            $_POST['categoria']);





// 1) ler o template de resposta
$template = file_get_contents(__DIR__ . '/src/views/receitas.html');

// 2) trocar cada valor estatico pelo valor do script
$template = str_replace(
    [
        '{{ID}}',
        '{{VALOR}}',
        '{{DATA}}',
        '{{DESCRICAO}}',
        '{{CATEGORIA}}'
    ],
    [
        $receitas->getId(),
        $receitas->getValor(),
        $receitas->getData()->format('Y-m-d'),
        $receitas->getDescricao(),
        $receitas->getCategoria()
        
    ],
    $template);

    $database = Database::getConn(); 
    $receitaModelo = new ReceitaModel($database, $receitas);
    if ($receitaModelo->save()) {
        echo "Receita salva com sucesso!";
    } else {
        echo "Erro ao salvar receita";
    }
    
    echo $template;
}