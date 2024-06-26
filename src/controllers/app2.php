<?php

require_once __DIR__ . '/Despesas.php';
require_once __DIR__ . '/Receitas.php';
require_once __DIR__ . '/Saldo.php';
require_once __DIR__ . '/../models/ReceitaModel.php';
require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/SaldoModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $receitas = new Receitas(
        (int)$_POST['id'],
        (float)$_POST['valor'],
        new DateTimeImmutable($_POST['data']),
        $_POST['descricao'],
        $_POST['categoria']
    );

    $template = file_get_contents(__DIR__ . '/src/views/receitas.html');

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
        $template
    );

    $receitaModelo = new ReceitaModel($receitas);
    if ($receitaModelo->save()) {
        $ultimoUsuarioId = $receitaModelo->getUltimoUsuario()['id'];
    } else {
        echo "Erro ao salvar receita";
    }

    echo $template;
}