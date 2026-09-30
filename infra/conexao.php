<?php

$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "easyraildb";
$porta = 6608;

$conexao = new mysqli($host, $usuario, $senha, $banco, $porta);

if ($conexao->connect_error) {
    die("Erro na conexão com o banco: " . $conexao->connect_error);
}

$conexao->set_charset("utf8mb4");

function verificarAcesso($permissao_necessaria)
{
    if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true || !isset($_SESSION['perfil_id'])) {
        session_unset();
        session_destroy();
        header('Location: ../index.php');
        exit;
    }

    if ($_SESSION['perfil_id'] > $permissao_necessaria) {
        header('Location: ../public/home.php');
        exit;
    }
}
?>