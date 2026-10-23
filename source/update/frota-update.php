<?php

include("../../config/conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$modelo = trim($_POST['modelo'] ?? '');
$carga_id = filter_input(INPUT_POST, 'carga_id', FILTER_VALIDATE_INT);
$usuario_id = filter_input(INPUT_POST, 'usuario_id', FILTER_VALIDATE_INT);
$status_id = filter_input(INPUT_POST, 'status_id', FILTER_VALIDATE_INT);

if ($id === false || $id === null || $id < 1 ||
    $modelo === '' ||
    $carga_id === false || $carga_id === null || $carga_id < 1 ||
    $usuario_id === false || $usuario_id === null || $usuario_id < 1 ||
    $status_id === false || $status_id === null || !in_array($status_id, [1, 2, 3], true)) {
    http_response_code(400);
    exit('Dados inválidos para atualização do trem.');
}

$sql = "UPDATE trem SET modelo = ?, carga_id = ?, usuario_id = ?, status_id = ? WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("siisi", $modelo, $carga_id, $usuario_id, $status_id, $id);

$stmt->execute();

header("Location: ../../public/frota.php");



?>