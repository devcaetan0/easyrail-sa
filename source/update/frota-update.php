<?php

include("../../config/conexao.php");

$id = $_POST['id'] ?? null;
$modelo = trim($_POST['modelo'] ?? '');
$carga_id = $_POST['carga_id'] ?? null;
$usuario_id = $_POST['usuario_id'] ?? null;
$status_id = $_POST['status_id'] ?? null;

$sql = "UPDATE trem SET modelo = ?, carga_id = ?, usuario_id = ?, status_id = ? WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("siisi", $modelo, $carga_id, $usuario_id, $status_id, $id);

$stmt->execute();

header("Location: ../../public/frota.php");



?>