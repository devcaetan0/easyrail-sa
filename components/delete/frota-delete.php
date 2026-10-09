<?php
    include("../../infra/conexao.php");

    $id = $_GET["id"];

    $c1 = $conexao->prepare("UPDATE sensor SET trem_id = NULL WHERE trem_id = ?");
    $c1->bind_param("i", $id);
    $c1->execute();

    $c2 = $conexao->prepare("DELETE FROM rota WHERE trem_id = ?");
    $c2->bind_param("i", $id);
    $c2->execute();

    $c3 = $conexao->prepare("DELETE FROM trem WHERE id = ?");
    $c3->bind_param("i", $id);
    $c3->execute();

    header("Location: ../../public/frota.php");
?>