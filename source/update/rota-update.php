<?php
session_start();
include("../../config/conexao.php");

$mensagem = "Erro ao atualizar rota. Verifique os dados e tente novamente.";
$tipoMensagem = "danger";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST["id"] ?? 0;
    $nome = trim($_POST["nome"] ?? '');
    $descricao = trim($_POST["descricao"] ?? '');
    $distancia = $_POST["distancia"] ?? 0;
    $duracao = $_POST["duracao"] ?? '';
    $trem_id = $_POST["trem_id"] ?? null;

    $stmt = $conexao->prepare("UPDATE rota SET nome = ?, descricao = ?, distancia = ?, duracao = ?, trem_id = ? WHERE id = ?");

    if ($stmt) {
        $stmt->bind_param("ssdsii", $nome, $descricao, $distancia, $duracao, $trem_id, $id);

        if ($stmt->execute()) {
            $mensagem = "Rota atualizada com sucesso!";
            $tipoMensagem = "success";
        }
    }
}

$_SESSION['mensagem'] = $mensagem;
$_SESSION['tipo_mensagem'] = $tipoMensagem;
header("Location: ../../public/rotas.php");
exit();
?>
