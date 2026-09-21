<?php 

include '../../infra/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $perfil_id = $_POST['perfil_id'];


    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuario (nome, email, senha, perfil_id) VALUES (?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);

    if(!$stmt) {
        die("Erro na preparação da consulta: " . $conexao->error);
    }


    $stmt->bind_param("sssi", $nome, $email, $senhaCriptografada, $perfil_id);

    if ($stmt->execute()) {
      header("Location: ../../public/usuarios.php");
      exit();

    } else {

        die ("Erro ao cadastrar usuário: " . $stmt->error);

    }

    $stmt->close();
    $conexao->close();
}


?>



   

                    