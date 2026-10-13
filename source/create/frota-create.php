<?php
include '../../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Método não permitido.');
}

$modelo = trim($_POST['modelo'] ?? '');
$carga_id = filter_input(INPUT_POST, 'carga_id', FILTER_VALIDATE_INT);
$usuario_id = filter_input(INPUT_POST, 'usuario_id', FILTER_VALIDATE_INT);

if ($modelo === '' || $carga_id === false || $carga_id === null || $carga_id < 1 ||
    $usuario_id === false || $usuario_id === null || $usuario_id < 1) {
    http_response_code(400);
    exit('Modelo, tipo de carga e usuário são obrigatórios.');
}

$sql = "INSERT INTO trem (modelo, carga_id, usuario_id) VALUES (?, ?, ?)";

$stmt = $conexao->prepare($sql);

if (!$stmt) {
    die("Erro na preparação da consulta: " . $conexao->error);
}

$stmt->bind_param("sii", $modelo, $carga_id, $usuario_id);

if (!$stmt->execute()) {
    die("Erro ao cadastrar locomotiva: " . $stmt->error);
}

header("Location: ../../public/frota.php");
exit;
?>