<?php
session_start();
include "../config/conexao.php";

$perfilAtual = $_SESSION['perfil_id'];
verificarAcesso(5);

$resultadoSensores = $conexao->query("
    SELECT s.id, s.nome, s.tipo, s.status, t.modelo AS trem, r.nome AS rota
    FROM sensor s
    LEFT JOIN trem t ON s.trem_id = t.id
    LEFT JOIN rota r ON s.rota_id = r.id
    ORDER BY s.id ASC
");
?>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../config/links.html') ?>
    <title>Sensores</title>
</head>

<body>
    <?php include('../components/navbar.php') ?>

    <main class="main-padrao">
        <div class="container-fluid w-75">
            <h1 class="titulo-pagina fw-bold mb-5">Monitoramento IoT</h1>

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
                    <div class="col-md-6">
                        <label class="fw-bold form-label" for="pesquisa">Pesquisar</label>
                        <input class="form-control" placeholder="Nome/ID" id="pesquisa">
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
                                <th>Status</th>
                                <th>Trem</th>
                                <th>Rota</th>
                                <?php if ($perfilAtual == 1) { ?>
                                    <th>Ações</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody id="tabelaSensores">
                            <?php while ($sensor = $resultadoSensores->fetch_assoc()) { ?>
                                <tr>
                                    <td>#<?= $sensor['id'] ?></td>
                                    <td><?= $sensor['nome'] ?></td>
                                    <td><?= $sensor['tipo'] ?></td>
                                    <td><?= $sensor['status'] ?></td>
                                    <td><?= $sensor['trem'] ?? 'Nenhum' ?></td>
                                    <td><?= $sensor['rota'] ?? 'Nenhuma' ?></td>
                                    <?php if ($perfilAtual == 1) { ?>
                                        <td>
                                            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modalEditarSensor" data-id="<?= $sensor['id'] ?>">
                                                ✏
                                            </button>
                                            <a href="../source/delete/sensor-delete.php?id=<?= $sensor['id'] ?>"
                                                class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Deseja realmente excluir esse sensor?')">
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

        <?php include('../components/modals/add/sensor-add.php') ?>

        <?php include('../components/modals/edit/sensor-edit.php') ?>
    </main>

    <script src="../scripts/navbar.js"></script>
    <?php include '../config/bootstrap.html'; ?>
    <script src="../scripts/sensores.js"></script>
</body>

</html>