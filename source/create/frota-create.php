<?php
session_start();
include '../../config/conexao.php';

$modelo = trim($_POST['modelo'] ?? '');
$carga_id = $_POST['carga_id'] ?? null;
$usuario_id = $_POST['usuario_id'] ?? null;
$status_id = $_POST['status_id'] ?? null;

$sql = "INSERT INTO trem (modelo, carga_id, usuario_id, status_id) VALUES (?, ?, ?, ?)";

$stmt = $conexao->prepare($sql);

if (!$stmt) {
    $_SESSION['mensagem_frota'] = "Erro ao cadastrar locomotiva. Verifique os dados e tente novamente.";
    $_SESSION['tipo_mensagem_frota'] = "danger";
    header("Location: ../../public/frota.php");
    exit();
}

$stmt->bind_param("siis", $modelo, $carga_id, $usuario_id, $status_id);

if (!$stmt->execute()) {
    $_SESSION['mensagem_frota'] = "Erro ao cadastrar locomotiva. Verifique os dados e tente novamente.";
    $_SESSION['tipo_mensagem_frota'] = "danger";
    header("Location: ../../public/frota.php");
    exit();
}

$_SESSION['mensagem_frota'] = "Locomotiva cadastrada com sucesso!";
$_SESSION['tipo_mensagem_frota'] = "success";
header("Location: ../../public/frota.php");
exit;
?>