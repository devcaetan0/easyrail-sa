<?php
session_start();
include "../infra/conexao.php";
verificarAcesso(5);
$perfilAtual = $_SESSION['perfil_id'];
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

            <h1 class="titulo-pagina fw-bold mb-5">Gerenciamento de Frota</h1>

            <?php if ($perfilAtual == 1) { ?>
                <div class="d-flex justify-content-end mb-2">
                    <button type="button" class="btn btn-laranja fw-bold p-2 mb-3" data-bs-toggle="modal"
                        data-bs-target="#modalCadastroTrem">
                        + Adicionar Locomotiva
                    </button>
                </div>
            <?php } ?>


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
                                <th>Usuário Responsável</th>
                                <?php if ($perfilAtual == 1) { ?>
                                    <th>Ações</th>
                              
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                           

                                <?php if ($perfilAtual == 1) { ?>
                                    <td>
                                        <button class="editar btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                                            data-bs-target="#modalCadastro" id="1">✏</button>
                                        <button class="excluir btn btn-sm btn-outline-danger" id="1">🗑</button>
                                    </td>
                                <?php } ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php include('../components/modals/frota-add.php') ?>

    </main>

    <?php include('../infra/bootstrap.html') ?>
</body>

</html>