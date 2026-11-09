<?php
session_start();
include("../../config/conexao.php");

$mensagem = "Erro ao excluir rota. Tente novamente.";
$tipoMensagem = "danger";
$id = $_GET['id'] ?? null;

try {
    $conexao->begin_transaction();

    $sensor = $conexao->prepare("UPDATE sensor SET rota_id = NULL WHERE rota_id = ?");
    $sensor->bind_param("i", $id);
    $sensor->execute();

    $rota = $conexao->prepare("DELETE FROM rota WHERE id = ?");
    $rota->bind_param("i", $id);
    $rota->execute();

    $conexao->commit();

    $mensagem = "Rota excluída com sucesso!";
    $tipoMensagem = "success";
} catch (Exception $e) {
    $mensagem = "Erro ao excluir rota: " . $e->getMessage();
    $tipoMensagem = "danger";
}

$_SESSION['mensagem'] = $mensagem;
$_SESSION['tipo_mensagem'] = $tipoMensagem;
header("Location: ../../public/rotas.php");
exit();
?>