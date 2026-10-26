<?php
session_start();
include "../config/conexao.php";

?>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../config/links.html') ?>
    <title>Usuários</title>
</head>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../config/links.html') ?>
    <title>Relatórios</title>
</head>

<body>
    <?php include('../components/navbar.php') ?>

    <main class="main-padrao">
           <div class=" align-items-center gap-3">
            <div class="d-flex">
                 <i class="bi bi-house" style="font-size: 4rem; line-height: 1; margin-left: 20px;"></i>
                <h1 class="m-0 fw-bold ms-4">Visualização de <span style="color: var(--cor-laranja);">Dashboard</span></h1>
            </div>
            <p style="margin-left: 110px;">Painel principal com gráficos e os dados mais críticos dos trens e sensores.</p>
        </div>
        <br>
        </main>
    <script src="../scripts/navbar.js"></script>
    <?php include '../config/bootstrap.html'; ?>
    <script src="../scripts/sensores.js"></script>
    </body>