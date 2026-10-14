<?php

include("../../config/conexao.php");

$id = $_POST["id"];
$modelo = $_POST["modelo"];
$carga_id = $_POST["carga_id"];
$usuario_id = $_POST["usuario_id"];

$sql = "UPDATE trem SET modelo = ?, carga_id = ?, usuario_id = ? WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("ssii", $modelo, $carga_id, $usuario_id, $id);

$stmt->execute();

header("Location: ../../public/frota.php");



?>