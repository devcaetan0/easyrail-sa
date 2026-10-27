<?php
session_start();
include '../../config/conexao.php';

$mensagem = "Erro ao cadastrar usuário. Verifique os dados e tente novamente.";
$tipoMensagem = "danger";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';
    $perfil_id = $_POST['perfil_id'] ?? null;
    $bairro = trim($_POST['bairro'] ?? '');
    $cidade = trim($_POST['cidade'] ?? '');
    $rua = trim($_POST['rua'] ?? '');
    $estado = $_POST['estado'] ?? '';

    $checkEmail = $conexao->prepare("SELECT email FROM usuario WHERE email = ?");

    if ($checkEmail) {
        $checkEmail->bind_param("s", $email);

        if ($checkEmail->execute()) {
            $checkEmail->store_result();

            if ($checkEmail->num_rows > 0) {
                $mensagem = "E-mail já cadastrado na plataforma. Cadastre outro e-mail.";
            } else {
                if ($conexao->begin_transaction()) {
                    $stmtUsuario = $conexao->prepare("INSERT INTO usuario (nome, email, senha, perfil_id) VALUES (?, ?, ?, ?)");
                    $stmtEndereco = $conexao->prepare("INSERT INTO endereco (estado, cidade, bairro, rua, usuario_id) VALUES (?, ?, ?, ?, ?)");

                    if ($stmtUsuario && $stmtEndereco) {
                        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
                        $stmtUsuario->bind_param("sssi", $nome, $email, $senhaCriptografada, $perfil_id);

                        if ($stmtUsuario->execute()) {
                            $usuario_id = $conexao->insert_id;
                            $stmtEndereco->bind_param("ssssi", $estado, $cidade, $bairro, $rua, $usuario_id);

                            if ($stmtEndereco->execute() && $conexao->commit()) {
                                $mensagem = "Usuário cadastrado com sucesso!";
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
            }
        }
    }
}

$_SESSION['mensagem'] = $mensagem;
$_SESSION['tipo_mensagem'] = $tipoMensagem;
header("Location: ../../public/usuarios.php");
exit();
?>