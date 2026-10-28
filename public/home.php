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
    <?php include('../components/navbar.php') ?>

    <div class="card-clima-flutuante shadow-sm borda-laranja p-3 text-center">
        <h2 class="text-uppercase fw-bold mb-2 text-muted">Clima</h2>
        <div id="temperatura" class="temperatura-destaque fw-bold mb-1">--°C</div>
        <div id="condicao" class="small fw-semibold text-capitalize text-dark">Carregando...</div>
    </div>

    <main class="container-fluid fade-in pt-5 mt-4">
        <div class="titulo-home text-center mt-5 mb-5 fw-bolD">
            <h1>Olá, <?= $nomeUsuario ?>! Bem-vindo(a) a <span style="color: var(--cor-preto);">Easy</span><span style="color: var(--cor-laranja);">Rail</span></h1>
            <h4>Selecione uma categoria para começar a gerenciar os dados de suas locomotivas.</h4>
        </div>

        <?php include('../components/cards.php') ?>

        <div class="row justify-content-center mt-4">
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