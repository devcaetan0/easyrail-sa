<?php
include '../../config/conexao.php';

$id = $_POST['id'] ?? null;
$nome = trim($_POST['nome'] ?? '');
$tipo = trim($_POST['tipo'] ?? '');
$status_id = $_POST['status_id'] ?? null;
$trem_id = $_POST['trem_id'] ?? null;
$rota_id = $_POST['rota_id'] ?? null;

$sql = "UPDATE sensor SET nome = ?, tipo = ?, status_id = ?, trem_id = ?, rota_id = ? WHERE id = ?";
$stmt = $conexao->prepare($sql);

if (!$stmt) {
    die("Erro na preparação da consulta: " . $conexao->error);
}

$stmt->bind_param("ssiiii", $nome, $tipo, $status_id, $trem_id, $rota_id, $id);

if (!$stmt->execute()) {
    die("Erro ao atualizar sensor: " . $stmt->error);
}

header("Location: ../../public/sensores.php");
exit;
?>