<?php
session_start();
include("../../config/conexao.php");

try {
    $id = $_GET["id"];

    $sensor = $conexao->prepare("UPDATE sensor SET trem_id = NULL WHERE trem_id = ?");
    $sensor->bind_param("i", $id);
    $sensor->execute();

    $rota = $conexao->prepare("DELETE FROM rota WHERE trem_id = ?");
    $rota->bind_param("i", $id);
    $rota->execute();

    $trem = $conexao->prepare("DELETE FROM trem WHERE id = ?");
    $trem->bind_param("i", $id);

    if ($trem->execute()) {
        $_SESSION['mensagem_frota'] = "Locomotiva excluída com sucesso!";
        $_SESSION['tipo_mensagem_frota'] = "success";
    } else {
        $_SESSION['mensagem_frota'] = "Erro ao excluir locomotiva. Tente novamente.";
        $_SESSION['tipo_mensagem_frota'] = "danger";
    }

    header("Location: ../../public/frota.php");
    exit();
} catch (Exception $e) {
    $_SESSION['mensagem_frota'] = "Erro ao excluir locomotiva. Tente novamente.";
    $_SESSION['tipo_mensagem_frota'] = "danger";
    header("Location: ../../public/frota.php");
    exit();
}

?>