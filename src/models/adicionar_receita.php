<?php

require 'db_config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $valor = $_POST['valor'];
    $data = $_POST['data'];
    $descricao = $_POST['descricao'];
    $categoria = $_POST['categoria'];

    try {

        $conn = new PDO('sqlite:' . DB_PATH);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $stmt = $conn->prepare("INSERT INTO receitas (id, valor, data, descricao, categoria) VALUES (:id, :valor, :data, :descricao, :categoria)");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':categoria', $categoria);


        if ($stmt->execute()) {
            echo "Nova receita financeira adicionada com sucesso!";
        } else {
            echo "Erro: Não foi possível adicionar a receita.";
        }
    } catch (PDOException $e) {
        echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    }
}
