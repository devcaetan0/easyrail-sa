<?php
session_start();
include "../infra/conexao.php";
verificarAcesso(5, $_SESSION['perfil_id']);
?>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../components/links.html') ?>
    <title>Relatórios</title>
</head>

<body>
    <?php include('../components/navbar.html') ?>



    <main class="main-padrao">

        <div class="container-fluid w-75">
            <h1 class="titulo-pagina fw-bold mb-5">Histórico Analítico</h1>

            <div class="card p-3 mb-4 shadow-sm">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label class="fw-bold form-label">Pesquisar</label>
                        <input class="form-control" placeholder="ID">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="fw-bold form-label">Falha</label>
                        <select class="form-select">
                            <option>Todas</option>
                            <option>Elétrica</option>
                            <option>Combustível</option>
                            <option>Peso</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card p-3 shadow-sm">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>ID do trem</th>
                                <th>Falha</th>
                                <th>Risco</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="1">
                                <td id="1">DD.MM.YYYY</td>
                                <td id="1" class="nome-tr">#00001</td>
                                <td id="1" class="responsavel-tr">Elétrica</td>
                                <td id="1" class="tipo-tr">Alto</td>
                                <td>
                                    <button class="editar btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                                        data-bs-target="#modalCadastro" id="1">👀</button>
                                    <button class="excluir btn btn-sm btn-outline-danger" id="1">⬇️</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <?php include '../infra/bootstrap.html'; ?>
    <script src="../scripts/sensores.js"></script>
</body>

</html>