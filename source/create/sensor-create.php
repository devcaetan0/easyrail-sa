<?php
include '../../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Método não permitido.');
}

$nome = trim($_POST['nome'] ?? '');
$tipo = trim($_POST['tipo'] ?? '');
$status = trim($_POST['status'] ?? '');
$trem_id = filter_input(INPUT_POST, 'trem_id', FILTER_VALIDATE_INT);
$rota_id = filter_input(INPUT_POST, 'rota_id', FILTER_VALIDATE_INT);

if ($nome === '' || $tipo === '' || $status === '' ||
    $trem_id === false || $trem_id === null || $trem_id < 1 ||
    $rota_id === false || $rota_id === null || $rota_id < 1) {
    http_response_code(400);
    exit('Preencha todos os campos do sensor.');
}

$sql = "INSERT INTO sensor (nome, tipo, status, trem_id, rota_id) VALUES (?, ?, ?, ?, ?)";
$stmt = $conexao->prepare($sql);

if (!$stmt) {
    die("Erro na preparação da consulta: " . $conexao->error);
}

$stmt->bind_param("sssii", $nome, $tipo, $status, $trem_id, $rota_id);

if (!$stmt->execute()) {
    die("Erro ao cadastrar sensor: " . $stmt->error);
}

header("Location: ../../public/sensores.php");
exit;
?>