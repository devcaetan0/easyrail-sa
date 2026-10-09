<?php
session_start();

$usuarioLogado = isset($_SESSION['logado']) && $_SESSION['logado'] === true && isset($_SESSION['perfil_id']);

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit;
}

if ($usuarioLogado) {
    header('Location: public/home.php');
    exit;
}

if (isset($_SESSION['logado']) || isset($_SESSION['perfil_id'])) {
    session_unset();
    session_destroy();
}
?>