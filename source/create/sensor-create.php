<?php
include '../../config/conexao.php';

$nome = trim($_POST['nome'] ?? '');
$tipo = trim($_POST['tipo'] ?? '');
$status_id = $_POST['status_id'] ?? null;
$trem_id = $_POST['trem_id'] ?? null;
$rota_id = $_POST['rota_id'] ?? null;

$sql = "INSERT INTO sensor (nome, tipo, status_id, trem_id, rota_id) VALUES (?, ?, ?, ?, ?)";
$stmt = $conexao->prepare($sql);

if (!$stmt) {
    die("Erro na preparação da consulta: " . $conexao->error);
}

$stmt->bind_param("ssiii", $nome, $tipo, $status_id, $trem_id, $rota_id);

if (!$stmt->execute()) {
    die("Erro ao cadastrar sensor: " . $stmt->error);
}

header("Location: ../../public/sensores.php");
exit;
?>