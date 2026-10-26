<?php
session_start();
include("../../config/conexao.php");

$id = $_POST["id"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$perfil_id = $_POST["perfil_id"];

try {
    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

    if (trim($senha) === '') {
        $sql = "UPDATE usuario SET nome = ?, email = ?, perfil_id = ? WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ssii", $nome, $email, $perfil_id, $id);
    } else {
        $sql = "UPDATE usuario SET nome = ?, email = ?, senha = ?, perfil_id = ? WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("sssii", $nome, $email, $senhaCriptografada, $perfil_id, $id);
    }

    if ($stmt->execute()) {
        $_SESSION['mensagem_usuarios'] = "Usuário atualizado com sucesso!";
        $_SESSION['tipo_mensagem_usuarios'] = "success";
    } else {
        $_SESSION['mensagem_usuarios'] = "Erro ao atualizar usuário. Verifique os dados e tente novamente.";
        $_SESSION['tipo_mensagem_usuarios'] = "danger";
    }
} catch (Exception $e) {
    $_SESSION['mensagem_usuarios'] = "Erro ao atualizar usuário. Verifique os dados e tente novamente.";
    $_SESSION['tipo_mensagem_usuarios'] = "danger";
}

header("Location: ../../public/usuarios.php");
exit();
?>