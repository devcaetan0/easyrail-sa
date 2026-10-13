<?php
session_start();
include "../config/conexao.php";
verificarAcesso(5);

$perfilAtual = $_SESSION['perfil_id'];

$resultadoRota = $conexao->query("
    SELECT r.id, r.nome, r.distancia, r.descricao, r.trem_id, r.duracao, t.modelo AS modelo
    FROM rota r JOIN trem t ON t.id = r.trem_id
    ORDER BY r.id ASC
");

?>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../config/links.html') ?>
    <title>Rotas</title>
</head>

<body>
    <?php include('../components/navbar.php') ?>


    <main class="main-padrao">
        <div class="container-fluid w-75">

            <h1 class="titulo-pagina fw-bold mb-5">Mapeamento de Rotas</h1>

            <?php if ($perfilAtual == 1) { ?>
                <div class="d-flex justify-content-end mb-2">
                    <button type="button" class="btn btn-laranja fw-bold p-2 mb-3" data-bs-toggle="modal"
                        data-bs-target="#modalCadastroRota">
                        + Adicionar Rota
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
                                <th>Nome</th>
                                <th>Distância (km)</th>
                                <th>Trem</th>
                                <th>Duração</th>
                                <?php if ($perfilAtual == 1) { ?>
                                    <th>Ações</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="1">
                                <?php while ($rota = $resultadoRota->fetch_assoc()) { ?>

                                <tr>
                                    <td>
                                        #<?= $rota['id'] ?>
                                    </td>
                                    <td class="nome-tr">
                                        <?= $rota['nome'] ?>
                                    </td>
                                    <td class="distancia-tr">
                                        <?= $rota['distancia'] ?>
                                    </td>
                                    <td class="setor-tr">
                                        <?= $rota['modelo'] ?>
                                    </td>
                                    <td class="duracao-tr">
                                        <?= $rota['duracao'] ?>
                                    </td>
                                    <?php if ($perfilAtual == 1) { ?>
                                        <td>
                                            <button class="editar-rota btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                                                data-bs-target="#modalEditarRota" data-id="<?= $rota['id'] ?>"
                                                data-nome="<?= $rota['nome'] ?>" data-descricao="<?= $rota['descricao'] ?>"
                                                data-distancia="<?= $rota['distancia'] ?>"
                                                data-trem-id="<?= $rota['trem_id'] ?>">
                                                ✏
                                            </button>
                                            <a href="../source/delete/rota-delete.php?id=<?= $rota['id'] ?>"
                                                class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Deseja realmente excluir essa rota?')">
                                                🗑
                                            </a>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php include('../components/modals/add/rota-add.php') ?>

        <?php include('../components/modals/edit/rota-edit.php') ?>
    </main>

    <?php include('../config/bootstrap.html') ?>

    <script src="../scripts/rotas.js"></script>
</body>

</html>