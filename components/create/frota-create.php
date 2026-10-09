<?php

include '../../infra/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $modelo = $_POST['modelo'];
    $carga = $_POST['carga'];
    $usuario_id = $_POST['usuario_id'];


    $sql = "INSERT INTO trem (modelo, carga, usuario_id) VALUES (?, ?, ?)";

    $stmt = $conexao->prepare($sql);

    if (!$stmt) {
        die("Erro na preparação da consulta: " . $conexao->error);
    }

    $stmt->bind_param("ssi", $modelo, $carga, $usuario_id);

    if ($stmt->execute()) {
        header("Location: ../../public/frotas.php");
        exit();

    } else {

        die("Erro ao cadastrar trem: " . $stmt->error);

    }
}
?>