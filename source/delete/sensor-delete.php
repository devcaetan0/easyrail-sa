<?php
session_start();
include("../../config/conexao.php");

$mensagem = "Erro ao excluir sensor. Tente novamente.";
$tipoMensagem = "danger";
$id = $_GET['id'] ?? null;

if ($id) {
    $comando = $conexao->prepare("DELETE FROM sensor WHERE id = ?");

    if ($comando) {
        $comando->bind_param("i", $id);

        if ($comando->execute() && $comando->affected_rows > 0) {
            $mensagem = "Sensor excluído com sucesso!";
            $tipoMensagem = "success";
        }
    }
}

$_SESSION['mensagem'] = $mensagem;
$_SESSION['tipo_mensagem'] = $tipoMensagem;
header("Location: ../../public/sensores.php");
exit();
?>