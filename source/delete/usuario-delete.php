<?php
session_start();
include("../../config/conexao.php");

$mensagem = "Erro ao excluir usuário. Tente novamente.";
$tipoMensagem = "danger";
$id = $_GET['id'] ?? null;

if ($id && $conexao->begin_transaction()) {
    $checkTrem = $conexao->prepare("SELECT id FROM trem WHERE usuario_id = ?");

    if ($checkTrem) {
        $checkTrem->bind_param("i", $id);

        if ($checkTrem->execute()) {
            $checkTrem->store_result();

            if ($checkTrem->num_rows > 0) {
                $conexao->rollback();
                $mensagem = "Não foi possível excluir este usuário porque ele está vinculado a uma locomotiva.";
            } else {
                $comandoEndereco = $conexao->prepare("DELETE FROM endereco WHERE usuario_id = ?");
                $comandoUsuario = $conexao->prepare("DELETE FROM usuario WHERE id = ?");

                if ($comandoEndereco && $comandoUsuario) {
                    $comandoEndereco->bind_param("i", $id);
                    $comandoUsuario->bind_param("i", $id);

                    if ($comandoEndereco->execute() && $comandoUsuario->execute() && $comandoUsuario->affected_rows > 0) {
                        if ($conexao->commit()) {
                            $mensagem = "Usuário excluído com sucesso!";
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
        } else {
            $conexao->rollback();
        }
    } else {
        $conexao->rollback();
    }
}

$_SESSION['mensagem'] = $mensagem;
$_SESSION['tipo_mensagem'] = $tipoMensagem;
header("Location: ../../public/usuarios.php");
exit();
?>