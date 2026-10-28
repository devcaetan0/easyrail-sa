<?php
session_start();
include '../../config/conexao.php';

$mensagem = "Erro ao atualizar sensor. Verifique os dados e tente novamente.";
$tipoMensagem = "danger";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? 0;
    $nome = trim($_POST['nome'] ?? '');
    $tipo = trim($_POST['tipo'] ?? '');
    $status_id = $_POST['status_id'] ?? null;
    $trem_id = $_POST['trem_id'] ?? null;
    $rota_id = $_POST['rota_id'] ?? null;

    $stmt = $conexao->prepare("UPDATE sensor SET nome = ?, tipo = ?, status_id = ?, trem_id = ?, rota_id = ? WHERE id = ?");

    if ($stmt) {
        $stmt->bind_param("ssiiii", $nome, $tipo, $status_id, $trem_id, $rota_id, $id);

        if ($stmt->execute()) {
            $mensagem = "Sensor atualizado com sucesso!";
            $tipoMensagem = "success";
        }
    }
}

$_SESSION['mensagem'] = $mensagem;
$_SESSION['tipo_mensagem'] = $tipoMensagem;
header("Location: ../../public/sensores.php");
exit();
?>
