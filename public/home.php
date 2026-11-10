<?php
session_start();
include "../config/conexao.php";
verificarAcesso(67);

$perfilAtual = $_SESSION['perfil_id'];
$nomeUsuario = $_SESSION['nome'];
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../config/links.html') ?>
    <title>Página Inicial</title>
</head>

<body>
    <?php include('../components/navbar.php'); ?>

    <main class="container-fluid fade-in main-home">
        <div class="home-topbar">
            <div class="titulo-home mt-3 cabecalho-home fw-bold">
                <h1>Olá, <?= $nomeUsuario ?>! Bem-vindo(a) a <span class="texto-preto">Easy</span><span
                        class="texto-laranja">Rail</span></h1>
                <h4>Selecione uma categoria para começar a gerenciar os dados de suas locomotivas.</h4>
            </div>
            <?php include('../components/clima.php'); ?>
        </div>

        <?php include('../components/cards.php') ?>

        <div class="row justify-content-center mt-5">
            <div class="col-auto">
                <img class="logo-home" src="../assets/images/logo-negative.png" alt="EasyRail Logo">
            </div>
        </div>
    </main>
</body>

<?php include('../config/bootstrap.html') ?>
<script src="../scripts/nav.js"></script>
<script src="../scripts/api-clima.js"></script>

</html>