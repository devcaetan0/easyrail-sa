<?php
session_start();
include("../../config/conexao.php");

$id = $_GET["id"];

$checkTrem = $conexao->prepare("SELECT id FROM trem WHERE usuario_id = ? LIMIT 1");
$checkTrem->bind_param("i", $id);
$checkTrem->execute();
$checkTrem->store_result();

if ($checkTrem->num_rows > 0) {
    $_SESSION['mensagem'] = "Não foi possível excluir este usuário porque ele está vinculado a uma locomotiva.";
    $_SESSION['tipo_mensagem'] = "danger";
    header("Location: ../../public/usuarios.php");
    exit();
}

$queryEndereco = "DELETE FROM endereco WHERE usuario_id=?";
$queryUsuario = "DELETE FROM usuario WHERE id=?";

$comandoEndereco = $conexao->prepare($queryEndereco);
$comandoEndereco->bind_param("i", $id);

$comandoUsuario = $conexao->prepare($queryUsuario);
$comandoUsuario->bind_param("i", $id);

$comandoEndereco->execute();

if ($comandoUsuario->execute()) {
    $_SESSION['mensagem'] = "Usuário excluído com sucesso!";
    $_SESSION['tipo_mensagem'] = "success";
} else {
    $_SESSION['mensagem'] = "Erro ao excluir usuário. Tente novamente.";
    $_SESSION['tipo_mensagem'] = "danger";
}

header("Location: ../../public/usuarios.php");
?>