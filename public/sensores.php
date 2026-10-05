<?php
session_start();
include "../infra/conexao.php";

$perfilAtual = $_SESSION['perfil_id'];
verificarAcesso(5);

?>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../components/links.html') ?>
    <title>Sensores</title>
</head>

<body>
    <?php include('../components/navbar.php') ?>


    <main class="main-padrao">
        <div class="container-fluid w-75">
            <h1 class="titulo-pagina fw-bold mb-4">Monitoramento IoT</h1>


    <?php if ($perfilAtual == 1) { ?>
        <div class="d-flex justify-content-end mb-2">
            <button type="button" class="btn btn-laranja fw-bold p-2 mb-3" data-bs-toggle="modal"
                data-bs-target="#modalCadastroSensor">
                + Adicionar Sensor
            </button>
         </div>

    <?php } ?>
            

            <div class="card p-3 mb-4 shadow-sm">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label class="fw-bold form-label">Pesquisar</label>
                        <input class="form-control" placeholder="Nome/ID">
                    </div>
                    <div class="col-md-6">
                        <label class="fw-bold form-label">Tipo</label>
                        <select class="form-select">
                            <option>Todos</option>
                            <option>Temperatura</option>
                            <option>Velocidade</option>
                            <option>Energia</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card p-3 shadow-sm">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Tipo</th>
                                <th>Localização</th>

                                <?php if ($perfilAtual == 1) { ?>
                                    <th>Ações</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="1">
                                <td id="1">#00001</td>
                                <td id="1" class="nome-tr">Sensor</td>
                                <td id="1" class="tipo-tr">Temperatura</td>
                                <td id="1" class="localizacao-tr">Praia do Ervino</td>
                                <td>
                                    <?php if ($perfilAtual == 1) { ?>
                                        <button class="editar btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                                            data-bs-target="#modalCadastroSensor" id="1">✏</button>
                                        <button class="excluir btn btn-sm btn-outline-danger" id="1">🗑</button>
                                    </td>
                                <?php } ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php include('../components/modals/sensores-add.php') ?>

    </main>

    <?php include '../infra/bootstrap.html'; ?>
</body>

</html>