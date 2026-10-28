<?php
session_start();
include '../../config/conexao.php';

$mensagem = "Erro ao cadastrar rota. Verifique os dados e tente novamente.";
$tipoMensagem = "danger";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $distancia = $_POST['distancia'] ?? 0;
    $descricao = trim($_POST['descricao'] ?? '');
    $duracao = $_POST['duracao'] ?? '';
    $trem_id = $_POST['trem_id'] ?? null;

    $stmt = $conexao->prepare("INSERT INTO rota (nome, distancia, descricao, duracao, trem_id) VALUES (?, ?, ?, ?, ?)");

    if ($stmt) {
        $stmt->bind_param("sdssi", $nome, $distancia, $descricao, $duracao, $trem_id);

        if ($stmt->execute()) {
            $mensagem = "Rota cadastrada com sucesso!";
            $tipoMensagem = "success";
        }
    }
}

$_SESSION['mensagem'] = $mensagem;
$_SESSION['tipo_mensagem'] = $tipoMensagem;
header("Location: ../../public/rotas.php");
exit();
?>
