<?php

include '../../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $distancia = $_POST['distancia'];
    $descricao = $_POST['descricao'];
    $trem_id = $_POST['trem_id'];

    $sql = "INSERT INTO rota (nome, distancia, descricao, trem_id) VALUES (?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);

    if (!$stmt) {
        die("Erro na preparação da consulta: " . $conexao->error);
    }

    $stmt->bind_param("sdsi", $nome, $distancia, $descricao, $trem_id);

    if ($stmt->execute()) {
        header("Location: ../../public/rotas.php");
        exit();
    } else {
        die("Erro ao cadastrar rota: " . $stmt->error);
    }
}
?>