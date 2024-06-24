<?php

require_once __DIR__ . '/src/controllers/Despesa.php';
require_once __DIR__ . '/src/controllers/Receita.php';
require_once __DIR__ . '/src/controllers/Saldo.php';
require_once __DIR__ . '/src/models/ReceitaModel.php';
require_once __DIR__ . '/src/models/Database.php';
require_once __DIR__ . '/src/models/SaldoModel.php';


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


// salvar um usuario no DB
$receitaModelo = new ReceitaModel($receitas);
if ($receitaModelo->save()) {
    $ultimoUsuarioId = $receitaModelo->getUltimoUsuario()['id'];
} else {
    echo "Erro ao salvar receita";
}

echo $template;
}
