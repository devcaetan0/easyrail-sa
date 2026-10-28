<?php
session_start();
include("../../config/conexao.php");

$mensagem = "Erro ao atualizar locomotiva. Verifique os dados e tente novamente.";
$tipoMensagem = "danger";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? 0;
    $modelo = trim($_POST['modelo'] ?? '');
    $carga_id = $_POST['carga_id'] ?? null;
    $usuario_id = $_POST['usuario_id'] ?? null;
    $status_id = $_POST['status_id'] ?? null;

    $stmt = $conexao->prepare("UPDATE trem SET modelo = ?, carga_id = ?, usuario_id = ?, status_id = ? WHERE id = ?");

    if ($stmt) {
        $stmt->bind_param("siiii", $modelo, $carga_id, $usuario_id, $status_id, $id);

        if ($stmt->execute()) {
            $mensagem = "Locomotiva atualizada com sucesso!";
            $tipoMensagem = "success";
        }
    }
}

$_SESSION['mensagem'] = $mensagem;
$_SESSION['tipo_mensagem'] = $tipoMensagem;
header("Location: ../../public/frota.php");
exit();
?>
