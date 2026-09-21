<?php
session_start();
include '../../infra/conexao.php';
header('Content-Type: application/json; charset=utf-8');

function responder(int $status, array $corpo): void {
    http_response_code($status);
    echo json_encode($corpo);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    responder(405, ['sucesso' => false, 'erro' => 'Método não permitido.']);
}

if (empty($_SESSION['usuario_id'])) {
    responder(401, ['sucesso' => false, 'erro' => 'Faça login para continuar.']);
}

