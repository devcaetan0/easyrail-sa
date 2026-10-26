<?php

include '../../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $perfil_id = $_POST['perfil_id'];

    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $rua = $_POST['rua'];
    $estado = $_POST['estado'];

    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

    $sqlUsuario = "INSERT INTO usuario (nome, email, senha, perfil_id) VALUES (?, ?, ?, ?)";
    $sqlEndereco = "INSERT INTO endereco (estado, cidade, bairro, rua, usuario_id) VALUES (?, ?, ?, ?, ?)";

    $stmtUsuario = $conexao->prepare($sqlUsuario);
    $stmtEndereco = $conexao->prepare($sqlEndereco);

    if (!$stmtUsuario) {
        die("Erro na preparação da consulta: " . $conexao->error);
    }

    $stmtUsuario->bind_param("sssi", $nome, $email, $senhaCriptografada, $perfil_id);

    if ($stmtUsuario->execute()) {
        $usuario_id = $conexao->insert_id;

        $stmtEndereco->bind_param("ssssi", $estado, $cidade, $bairro, $rua, $usuario_id);

        if ($stmtEndereco->execute()) {
            header("Location: ../../public/usuarios.php");
            exit();
        } else {
            die("Erro ao cadastrar endereço: " . $stmtEndereco->error);
        }
    } else {
        die("Erro ao cadastrar usuário: " . $stmtUsuario->error);
    }
}
?>