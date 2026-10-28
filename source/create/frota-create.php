<?php
session_start();
include '../../config/conexao.php';

$mensagem = "Erro ao cadastrar locomotiva. Verifique os dados e tente novamente.";
$tipoMensagem = "danger";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $modelo = trim($_POST['modelo'] ?? '');
    $carga_id = $_POST['carga_id'] ?? null;
    $usuario_id = $_POST['usuario_id'] ?? null;
    $status_id = $_POST['status_id'] ?? null;

    $stmt = $conexao->prepare("INSERT INTO trem (modelo, carga_id, usuario_id, status_id) VALUES (?, ?, ?, ?)");

    if ($stmt) {
        $stmt->bind_param("siii", $modelo, $carga_id, $usuario_id, $status_id);

        if ($stmt->execute()) {
            $mensagem = "Locomotiva cadastrada com sucesso!";
            $tipoMensagem = "success";
        }
    }
}

$_SESSION['mensagem'] = $mensagem;
$_SESSION['tipo_mensagem'] = $tipoMensagem;
header("Location: ../../public/frota.php");
exit();
?>
