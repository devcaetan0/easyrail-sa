<?php

    include("../../infra/conexao.php");

    $id = $_GET["id"];

    $query = "DELETE FROM usuario WHERE id=?";

    $comando = mysqli_prepare($conexao, $query);
    mysqli_stmt_bind_param($comando, "i", $id);
    mysqli_stmt_execute($comando);

    header("Location: ../../public/usuarios.php");

?>
