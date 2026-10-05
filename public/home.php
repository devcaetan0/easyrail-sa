<?php
session_start();
include "../infra/conexao.php";
$perfilAtual = $_SESSION['perfil_id'];
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../components/links.html') ?>
    <title>Página Inicial</title>
</head>

<body>
    <?php include('../components/navbar.php') ?>

    <main class="container-fluid fade-in">
        <div class="titulo-home text-center mt-5 mb-5 fw-bold">
            <h1>Bem-vindo(a) a EasyRail!</h1>
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

<?php include('../infra/bootstrap.html') ?>

</body>

</html>