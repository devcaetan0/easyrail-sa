<?php
session_start();
include("../../config/conexao.php");

$mensagem = "Erro ao atualizar usuário. Verifique os dados e tente novamente.";
$tipoMensagem = "danger";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST["id"] ?? 0;
    $nome = trim($_POST["nome"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $senha = $_POST["senha"] ?? '';
    $perfil_id = $_POST["perfil_id"] ?? null;

    if (trim($senha) === '') {
        $stmt = $conexao->prepare("UPDATE usuario SET nome = ?, email = ?, perfil_id = ? WHERE id = ?");

        if ($stmt) {
            $stmt->bind_param("ssii", $nome, $email, $perfil_id, $id);
        }
    } else {
        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $conexao->prepare("UPDATE usuario SET nome = ?, email = ?, senha = ?, perfil_id = ? WHERE id = ?");

        if ($stmt) {
            $stmt->bind_param("sssii", $nome, $email, $senhaCriptografada, $perfil_id, $id);
        }
    }

    if ($stmt && $stmt->execute()) {
        $mensagem = "Usuário atualizado com sucesso!";
        $tipoMensagem = "success";
    }
}

$_SESSION['mensagem'] = $mensagem;
$_SESSION['tipo_mensagem'] = $tipoMensagem;
header("Location: ../../public/usuarios.php");
exit();
?>
