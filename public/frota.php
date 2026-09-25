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
    <title>Frota de Carga</title>
</head>

<body>
    <?php include('../components/navbar.php') ?>


    <main class="main-padrao">
        <div class="container-fluid w-75">

            <h1 class="titulo-pagina fw-bold">Gerenciamento de Frota</h1>

            <div class="d-flex justify-content-end mb-2">
                <button type="button" class="btn btn-laranja fw-bold p-2 mb-3" data-bs-toggle="modal"
                    data-bs-target="#modalCadastro">
                    + Adicionar Locomotiva
                </button>
            </div>

            <div class="card p-3 mb-4 shadow-sm">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label class="fw-bold form-label">Pesquisar</label>
                        <input class="form-control" placeholder="Modelo/ID">
                    </div>
                    <div class="col-md-6">
                        <label class="fw-bold form-label">Tipo</label>
                        <select class="form-select">
                            <option>Todos</option>
                            <option>Minerais</option>
                            <option>Combustível</option>
                            <option>Agrícola</option>
                            <option>Granel</option>
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
                                <th>Modelo</th>
                                <th>Carga</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="1">
                                <td id="1">#00001</td>
                                <td id="1" class="nome-tr">CIVIC 2001</td>
                                <td id="1" class="tipo-tr">Combustível</td>
                                <td>
                                    <button class="editar btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                                        data-bs-target="#modalCadastro" id="1">✏</button>
                                    <button class="excluir btn btn-sm btn-outline-danger" id="1">🗑</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalCadastro" tabindex="-1" aria-labelledby="modalCadastroLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content text-start">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="modalCadastroLabel">Cadastrar Locomotiva</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form-sensor">
                            <div class="mb-3">
                                <label for="id-sensor" class="form-label fw-bold">Modelo</label>
                                <input type="text" class="form-control" id="edit-nome" required>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold form-label">Tipo de Carga</label>
                                <select class="form-select" id="edit-tipo">
                                    <option>Mineral</option>
                                    <option>Combustível</option>
                                    <option>Agrícola</option>
                                    <option>Granel</option>
                                </select>
                            </div>
                            <div class="mb-3 d-flex">
                                <label for="nome-sensor" class="form-label fw-bold">Partida</label>
                                <input type="text" class="form-control" id="edit-localizacao" required>

                                <label for="nome-sensor" class="form-label fw-bold">Destino</label>
                                <input type="text" class="form-control" id="edit-destino" required>
                            </div>
                            <button type="button" class="btn btn-secondary fw-bold"
                                data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-laranja" id="btn-salvar">Salvar Trem</button>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                    </div>
                </div>
            </div>
        </div>

    </main>

    <?php include('../infra/bootstrap.html') ?>
</body>

</html>