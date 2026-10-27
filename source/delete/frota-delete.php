<?php
session_start();
include("../../config/conexao.php");

$mensagem = "Erro ao excluir locomotiva. Tente novamente.";
$tipoMensagem = "danger";
$id = $_GET['id'] ?? null;

if ($id && $conexao->begin_transaction()) {
    $sensor = $conexao->prepare("UPDATE sensor SET trem_id = NULL WHERE trem_id = ?");
    $rota = $conexao->prepare("UPDATE rota SET trem_id = NULL WHERE trem_id = ?");
    $trem = $conexao->prepare("DELETE FROM trem WHERE id = ?");

    if ($sensor && $rota && $trem) {
        $sensor->bind_param("i", $id);
        $rota->bind_param("i", $id);
        $trem->bind_param("i", $id);

        if ($sensor->execute() && $rota->execute() && $trem->execute() && $trem->affected_rows > 0) {
            if ($conexao->commit()) {
                $mensagem = "Locomotiva excluída com sucesso!";
                $tipoMensagem = "success";
            } else {
                $conexao->rollback();
            }
        } else {
            $conexao->rollback();
        }
    } else {
        $conexao->rollback();
    }
}

$_SESSION['mensagem'] = $mensagem;
$_SESSION['tipo_mensagem'] = $tipoMensagem;
header("Location: ../../public/frota.php");
exit();
?>
