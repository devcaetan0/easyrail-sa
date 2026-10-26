<?php
session_start();
include("../../config/conexao.php");

try {
    $id = $_GET["id"];

    $queryEndereco = "DELETE FROM endereco WHERE usuario_id=?";
    $queryUsuario = "DELETE FROM usuario WHERE id=?";

    $comandoEndereco = $conexao->prepare($queryEndereco);
    $comandoEndereco->bind_param("i", $id);

    $comandoUsuario = $conexao->prepare($queryUsuario);
    $comandoUsuario->bind_param("i", $id);

    $comandoEndereco->execute();

    if ($comandoUsuario->execute()) {
        $_SESSION['mensagem_usuarios'] = "Usuário excluído com sucesso!";
        $_SESSION['tipo_mensagem_usuarios'] = "success";

    } else {
        $_SESSION['mensagem_usuarios'] = "Erro ao excluir usuário. Tente novamente.";
        $_SESSION['tipo_mensagem_usuarios'] = "danger";
    }

    header("Location: ../../public/usuarios.php");
    exit();
} catch (Exception $e) {
    $_SESSION['mensagem_usuarios'] = "Erro ao excluir usuário. Tente novamente.";
    $_SESSION['tipo_mensagem_usuarios'] = "danger";
    header("Location: ../../public/usuarios.php");
    exit();
}
?>