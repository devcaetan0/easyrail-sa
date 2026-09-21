<?php

$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "easyraill";
$porta = 6608;

$conexao = new mysqli($host, $usuario, $senha, $banco, $porta);

if ($conexao->connect_error) {
    die("Erro na conexão com o banco: " . $conexao->connect_error);
};

$conexao->set_charset("utf8mb4");

function verificarAcesso($permissao_necessaria, $permissao_atual) {

    if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
        header('Location: ../index.php'); 
        exit;
    }

    if ($permissao_atual > $permissao_necessaria) {
        header('Location: ../index.php'); 
        exit;
    }
}

?>