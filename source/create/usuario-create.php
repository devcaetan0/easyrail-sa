<?php

session_start();
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

    if (!$stmtUsuario || !$stmtEndereco) {
        $_SESSION['mensagem_usuarios'] = "Erro ao cadastrar usuário. Verifique os dados e tente novamente.";
        $_SESSION['tipo_mensagem_usuarios'] = "danger";
        header("Location: ../../public/usuarios.php");
        exit();
    }

    $stmtUsuario->bind_param("sssi", $nome, $email, $senhaCriptografada, $perfil_id);

    if ($stmtUsuario->execute()) {
        $usuario_id = $conexao->insert_id;

        $stmtEndereco->bind_param("ssssi", $estado, $cidade, $bairro, $rua, $usuario_id);

        if ($stmtEndereco->execute()) {
            $_SESSION['mensagem_usuarios'] = "Usuário cadastrado com sucesso!";
            $_SESSION['tipo_mensagem_usuarios'] = "success";
            header("Location: ../../public/usuarios.php");
            exit();
        } else {
            $_SESSION['mensagem_usuarios'] = "Erro ao cadastrar usuário. Verifique os dados e tente novamente.";
            $_SESSION['tipo_mensagem_usuarios'] = "danger";
            header("Location: ../../public/usuarios.php");
            exit();
        }
    } else {
        $_SESSION['mensagem_usuarios'] = "Erro ao cadastrar usuário. Verifique os dados e tente novamente.";
        $_SESSION['tipo_mensagem_usuarios'] = "danger";
        header("Location: ../../public/usuarios.php");
        exit();
    }
}
?>