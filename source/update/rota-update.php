<?php
include("../../config/conexao.php");

$id = $_POST["id"];
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$distancia = $_POST["distancia"];
$trem_id = $_POST["trem_id"];

$sql = "UPDATE rota SET nome = ?, descricao = ?, distancia = ?,  trem_id = ? WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("ssdii", $nome, $descricao, $distancia, $trem_id, $id);

$stmt->execute();

header("Location: ../../public/rotas.php");
?>