<?php
session_start();
include "../config/conexao.php";
$perfilAtual = $_SESSION['perfil_id'];

verificarAcesso(5);
?>

<html lang="pt-BR">

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
                 <i class="bi bi-file-earmark-text" style="font-size: 4rem; line-height: 1; margin-left: 20px;"></i>
                <h1 class="m-0 fw-bold ms-4">Histórico Analítico</h1>
            </div>
            <p style="margin-left: 110px;">Histórico de dados gerados pelos sensores e das rotas realizadas pelos trens.</p>
        </div>
        <br>

        <div class="container-fluid w-75">
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

            <div class="card border rounded-3 overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="">
                            <tr>
                                <th>Data</th>
                                <th>ID do trem</th>
                                <th>Falha</th>
                                <th>Risco</th>
                                <?php if ($perfilAtual == 1) { ?>
                                    <th>Ações</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="1">
                                <td id="1">DD.MM.YYYY</td>
                                <td id="1" class="nome-tr">#00001</td>
                                <td id="1" class="responsavel-tr">Elétrica</td>
                                <td id="1" class="tipo-tr">Alto</td>
                                <td>
                                    <?php if ($perfilAtual == 1) { ?>
                                        <button class="editar btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                                            data-bs-target="#modalCadastroSensor" id="1"><i class="bi bi-eye fs-5"></i></button>
                                        <button class="excluir btn btn-sm btn-outline-danger" id="1"><i class="bi bi-cloud-download fs-5"</button>
                                    </td>
                                <?php } ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <script src="../scripts/navbar.js"></script>
    <?php include '../config/bootstrap.html'; ?>
    <script src="../scripts/sensores.js"></script>
</body>

</html>