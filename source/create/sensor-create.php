<?php
session_start();
include '../../config/conexao.php';

$mensagem = "Erro ao cadastrar sensor. Verifique os dados e tente novamente.";
$tipoMensagem = "danger";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $tipo = trim($_POST['tipo'] ?? '');
    $status_id = $_POST['status_id'] ?? 1;
    $trem_id = $_POST['trem_id'] ?? null;
    $rota_id = $_POST['rota_id'] ?? null;

    $stmt = $conexao->prepare("INSERT INTO sensor (nome, tipo, status_id, trem_id, rota_id) VALUES (?, ?, ?, ?, ?)");

    if ($stmt) {
        $stmt->bind_param("ssiii", $nome, $tipo, $status_id, $trem_id, $rota_id);

        if ($stmt->execute()) {
            $mensagem = "Sensor cadastrado com sucesso!";
            $tipoMensagem = "success";
        }
    }
}

$_SESSION['mensagem'] = $mensagem;
$_SESSION['tipo_mensagem'] = $tipoMensagem;
header("Location: ../../public/sensores.php");
exit();
?>
