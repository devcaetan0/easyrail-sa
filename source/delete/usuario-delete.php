<?php
include("../../config/conexao.php");

try {
    $id = $_GET["id"];

    $query = "DELETE FROM usuario WHERE id=?";

    $comando = $conexao->prepare($query);
    $comando->bind_param("i", $id);
    $comando->execute();

    header("Location: ../../public/usuarios.php");
} catch (Exception $e) {
    echo "<script>alert('Erro ao excluir usuário.');</script>";
     header("Location: ../../public/usuarios.php");
}
?>