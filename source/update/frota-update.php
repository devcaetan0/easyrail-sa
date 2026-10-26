<?php

session_start();
include("../../config/conexao.php");

$id = $_POST['id'] ?? null;
$modelo = trim($_POST['modelo'] ?? '');
$carga_id = $_POST['carga_id'] ?? null;
$usuario_id = $_POST['usuario_id'] ?? null;
$status_id = $_POST['status_id'] ?? null;

try {
    $sql = "UPDATE trem SET modelo = ?, carga_id = ?, usuario_id = ?, status_id = ? WHERE id = ?";
    $stmt = $conexao->prepare($sql);

    if (!$stmt) {
        throw new Exception("Erro ao preparar atualização.");
    }

    $stmt->bind_param("siisi", $modelo, $carga_id, $usuario_id, $status_id, $id);

    if ($stmt->execute()) {
        $_SESSION['mensagem_frota'] = "Locomotiva atualizada com sucesso!";
        $_SESSION['tipo_mensagem_frota'] = "success";
    } else {
        $_SESSION['mensagem_frota'] = "Erro ao atualizar locomotiva. Verifique os dados e tente novamente.";
        $_SESSION['tipo_mensagem_frota'] = "danger";
    }
} catch (Exception $e) {
    $_SESSION['mensagem_frota'] = "Erro ao atualizar locomotiva. Verifique os dados e tente novamente.";
    $_SESSION['tipo_mensagem_frota'] = "danger";
}

header("Location: ../../public/frota.php");
exit();



?>