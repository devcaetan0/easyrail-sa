<?php
include "../infra/conexao.php";
?>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="icon" href="../assets/images/logo.png" type="image/png">
    <title>Sensores</title>
</head>

<body>
    <?php include('../components/navbar.html') ?>

    <h1 class="titulo-pagina fw-bold">Relatórios</h1>

    <main class="main-padrao">
        <div class="container-fluid">
            <div class="d-flex justify-content-end mb-3">
            </div>

            <div class="card p-3 mb-4 shadow-sm">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label class="fw-bold form-label">Pesquisar</label>
                        <input class="form-control" placeholder="Modelo/ID">
                    </div>
                    <div class="col-md-4">
                        <label class="fw-bold form-label">Falha</label>
                        <select class="form-select">
                            <option>Todas</option>
                            <option>Elétrica</option>
                            <option>Combustível</option>
                            <option>Peso</option>
                        </select>
                        <div/>
                  <div class="col-md-6 mb-2">
                    <label class="fw-bold form-label">ID do trem</label>
                        <input class="form-control" placeholder="ID">
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
                                <td id="1" class="nome-tr">00000001</td>
                                <td id="1" class="responsavel-tr">Elétrica</td>
                                <td id="1" class="tipo-tr">Alto</td>
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
                        <h5 class="modal-title fw-bold" id="modalCadastroLabel">Cadastrar Novo Sensor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form-sensor">
                            <div class="mb-3">
                                <label for="id-sensor" class="form-label fw-bold">Nome</label>
                                <input type="text" class="form-control" id="edit-nome" required>
                            </div>
                            <div class="mb-3">
                                <label for="setor-sensor" class="form-label fw-bold">Responsável</label>
                                <input type="text" class="form-control" id="edit-responsavel" required>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold form-label">Tipo</label>
                                <select class="form-select" id="edit-tipo">
                                    <option>Temperatura</option>
                                    <option>Velocidade</option>
                                    <option>Energia</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nome-sensor" class="form-label fw-bold">Localização</label>
                                <input type="text" class="form-control" id="edit-localizacao" required>
                            </div>
                            <button type="button" class="btn btn-secondary fw-bold"
                                data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-laranja" id="btn-salvar">Salvar Sensor</button>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                    </div>
                </div>
            </div>
        </div>

    </main>

    <?php include '../infra/bootstrap.html'; ?>
    <script src="../scripts/sensores.js"></script>
</body>

</html>