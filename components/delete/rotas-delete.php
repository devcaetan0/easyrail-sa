<?php
    include("../../infra/conexao.php");

    $id = $_GET["id"];

    $query = "DELETE FROM rota WHERE id=?";

    $comando = $conexao->prepare($query);
    $comando->bind_param("i", $id);
    $comando->execute();
    

    
    header("Location: ../../public/rotas.php");
?>
