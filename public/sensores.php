<?php
session_start();
include "../config/conexao.php";

verificarAcesso(67);
$perfilAtual = $_SESSION['perfil_id'];

$resultadoSensores = $conexao->query("
    SELECT s.id, s.nome, s.tipo, st.nome AS status, s.status_id, s.trem_id, s.rota_id,
    t.modelo AS trem, r.nome AS rota
    FROM sensor s
    JOIN status st ON s.status_id = st.id
    LEFT JOIN trem t ON s.trem_id = t.id
    LEFT JOIN rota r ON s.rota_id = r.id
    ORDER BY s.id ASC
");

$resultadoTipos = $conexao->query("SELECT DISTINCT tipo FROM sensor ORDER BY tipo ASC");
$resultadoStatus = $conexao->query("SELECT st.nome FROM sensor s JOIN status st ON s.status_id = st.id ORDER BY st.nome ASC");
$resultadoRotas = $conexao->query("
    SELECT r.id, r.nome
    FROM rota r
    INNER JOIN sensor s ON s.rota_id = r.id
    ORDER BY r.nome ASC
");
$resultadoTrem = $conexao->query("
    SELECT t.id, t.modelo
    FROM trem t
    INNER JOIN sensor s ON s.trem_id = t.id
    ORDER BY t.modelo ASC
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
        <div class=" align-items-center gap-3">
            <div class="d-flex">
                <i class="bi bi-wifi" style="font-size: 4rem; line-height: 1; margin-left: 20px;"></i>
                <h1 class="m-0 fw-bold ms-4">Monitoramento IoT</h1>
            </div>
            <p style="margin-left: 110px;">Tela para cadastro, gereciamento e listagem de todos os sensores.</p>
        </div>
        <br>

        <div class="container-fluid w-75">
            <?php include("../components/mensagem.php"); ?>

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
                    <div class="col-md-3 mb-2">
                        <label class="fw-bold form-label" for="pesquisaSensor">Pesquisar</label>
                        <input type="search" class="form-control" placeholder="Nome/ID" id="pesquisaSensor">
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="fw-bold form-label" for="filtroTipo">Tipo</label>
                        <select class="form-select" id="filtroTipo">
                            <option value="">Todos</option>
                            <?php while ($tipo = $resultadoTipos->fetch_assoc()) { ?>
                                <option value="<?= $tipo['tipo'] ?>">
                                    <?= $tipo['tipo'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-2 mb-2 mb-md-0">
                        <label class="fw-bold form-label" for="filtroRota">Rota</label>
                        <select class="form-select" id="filtroRota">
                            <option value="">Todas</option>
                            <?php while ($rota = $resultadoRotas->fetch_assoc()) { ?>
                                <option value="<?= $rota['nome'] ?>">
                                    <?= $rota['nome'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-2 mb-2 mb-md-0">
                        <label class="fw-bold form-label" for="filtroTrem">Trem</label>
                        <select class="form-select" id="filtroTrem">
                            <option value="">Todos</option>
                            <?php while ($trem = $resultadoTrem->fetch_assoc()) { ?>
                                <option value="<?= $trem['modelo'] ?>">
                                    <?= $trem['modelo'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="fw-bold form-label" for="filtroStatus">Status</label>
                        <select class="form-select" id="filtroStatus">
                            <option value="">Todos</option>
                            <option value="1">Ativo</option>
                            <option value="2">Inativo</option>
                            <option value="3">Manutenção</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card border rounded-3 overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="">
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
                                <tr data-tipo="<?= $sensor['tipo'] ?>" data-status="<?= $sensor['status'] ?>"
                                    data-trem="<?= $sensor['trem'] ?? 'Nenhum' ?>"
                                    data-rota="<?= $sensor['rota'] ?? 'Nenhuma' ?>">
                                    <td>#<?= $sensor['id'] ?></td>
                                    <td class="nome-tr"><?= $sensor['nome'] ?></td>
                                    <td><?= $sensor['tipo'] ?></td>
                                    <td><?= $sensor['status'] ?></td>
                                    <td><?= $sensor['trem'] ?? 'Nenhum' ?></td>
                                    <td><?= $sensor['rota'] ?? 'Nenhuma' ?></td>
                                    <?php if ($perfilAtual == 1) { ?>
                                        <td>
                                            <button type="button" class="btn btn-outline-secondary btn-sm editar-sensor"
                                                data-bs-toggle="modal" data-bs-target="#modalEditarSensor"
                                                data-id="<?= $sensor['id'] ?>" data-nome="<?= $sensor['nome'] ?>"
                                                data-tipo="<?= $sensor['tipo'] ?>" data-status-id="<?= $sensor['status_id'] ?>"
                                                data-trem-id="<?= $sensor['trem_id'] ?? 'Nenhum' ?>"
                                                data-rota-id="<?= $sensor['rota_id'] ?? 'Nenhuma' ?>">
                                                <i class="bi bi-pencil fs-5"></i>
                                            </button>
                                            <a href="../source/delete/sensor-delete.php?id=<?= $sensor['id'] ?>"
                                                class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Deseja realmente excluir esse sensor?')">
                                                <i class="bi bi-trash fs-5"></i>
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