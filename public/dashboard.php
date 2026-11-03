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

    <main class="main-padrao fade-in">
           <div class="page-heading">
            <div class="d-flex page-heading-row">
                 <i class="bi bi-house page-heading-icon"></i>
                <h1 class="m-0 fw-bold page-heading-title">Visualização de <span class="texto-laranja">Dashboard</span></h1>
            </div>
            <p class="page-heading-description">Painel principal com gráficos e os dados mais críticos dos trens e sensores.</p>
        </div>
        <br>
        </main>
    <script src="../scripts/navbar.js"></script>
    <?php include '../config/bootstrap.html'; ?>
    <script src="../scripts/sensores.js"></script>
    </body>