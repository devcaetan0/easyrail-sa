<?php
include '../../config/conexao.php';

$modelo = trim($_POST['modelo'] ?? '');
$carga_id = $_POST['carga_id'] ?? null;
$usuario_id = $_POST['usuario_id'] ?? null;
$status_id = $_POST['status_id'] ?? null;

$sql = "INSERT INTO trem (modelo, carga_id, usuario_id, status_id) VALUES (?, ?, ?, ?)";

$stmt = $conexao->prepare($sql);

if (!$stmt) {
    die("Erro na preparação da consulta: " . $conexao->error);
}

$stmt->bind_param("siis", $modelo, $carga_id, $usuario_id, $status_id);

if (!$stmt->execute()) {
    die("Erro ao cadastrar locomotiva: " . $stmt->error);
}

header("Location: ../../public/frota.php");
exit;
?>