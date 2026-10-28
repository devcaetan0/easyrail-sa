<?php
session_start();
include "../config/conexao.php";

verificarAcesso(67);
$perfilAtual = $_SESSION['perfil_id'];

$resultadoTrem = $conexao->query("
    SELECT t.id, t.modelo, t.carga_id, c.nome AS carga, t.usuario_id, u.nome AS nome_usuario, t.status_id, s.nome AS status_nome
    FROM trem t
    LEFT JOIN usuario u ON t.usuario_id = u.id
    LEFT JOIN carga c ON c.id = t.carga_id
    LEFT JOIN status s ON s.id = t.status_id
    ORDER BY t.id ASC
");

$resultadoCargas = $conexao->query("SELECT id, nome FROM carga ORDER BY nome ASC");
$resultadoUsuarios = $conexao->query("
    SELECT u.id, u.nome
    FROM usuario u
    JOIN trem t ON t.usuario_id = u.id
    ORDER BY u.nome ASC
");
?>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../config/links.html') ?>
    <title>Frota de Carga</title>
</head>

<body>
    <?php include('../components/navbar.php') ?>

    <main class="main-padrao">
        <div class=" align-items-center gap-3">
            <div class="d-flex">
                <i class="bi bi-box" style="font-size: 4rem; line-height: 1; margin-left: 20px;"></i>
                <h1 class="m-0 fw-bold ms-4">Gerenciamento de <span style="color: var(--cor-laranja);">Frota</span></h1>
            </div>
            <p style="margin-left: 110px;">Listagem e gerenciamento de todos os treins e suas respectivas rotas.</p>
        </div>
        <br>
        <div class="container-fluid w-75">
            <?php include("../components/mensagem.php") ?>

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
                    <div class="col-md-4 mb-2">
                        <label class="fw-bold form-label">Pesquisar</label>
                        <input class="form-control" placeholder="Modelo/ID" id="pesquisa">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="fw-bold form-label">Tipo de Carga</label>
                        <select class="form-select" id="filtroCarga">
                            <option value="">Todos</option>
                            <?php while ($cargaFiltro = $resultadoCargas->fetch_assoc()) { ?>
                                <option value="<?= $cargaFiltro['id'] ?>">
                                    <?= $cargaFiltro['nome'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="fw-bold form-label">Usuário Responsável</label>
                        <select class="form-select" id="filtroUsuario">
                            <option value="">Todos</option>
                            <?php while ($usuarioFiltro = $resultadoUsuarios->fetch_assoc()) { ?>
                                <option value="<?= $usuarioFiltro['id'] ?>">
                                    <?= $usuarioFiltro['nome'] ?>
                                </option>
                            <?php } ?>
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
                                <th></th>
                                <th>Modelo</th>
                                <th>Carga</th>
                                <th>Usuário</th>
                                <th>Status</th>
                                <?php if ($perfilAtual == 1) { ?>
                                    <th>Ações</th>
                                <?php } ?>
                            </tr>
                        </thead>

                        <tbody class="tabela-padding" id="tabelaTrens">
                            <?php while ($trem = $resultadoTrem->fetch_assoc()) { ?>

                                <tr data-carga-id="<?= $trem['carga_id'] ?? '' ?>"
                                    data-usuario-id="<?= $trem['usuario_id'] ?? '' ?>"
                                    data-status-id="<?= $trem['status_id'] ?? '' ?>">
                                    <td>
                                        #<?= $trem['id'] ?>
                                    </td>
                                    <td class="buttons"></td>
                                    <td class="modelo-tr">
                                        <?= $trem['modelo'] ?>
                                    </td>

                                    <td class="carga-tr">
                                        <?= $trem['carga'] ?>
                                    </td>

                                    <td class="usuario-tr">
                                        <?= $trem['nome_usuario'] ?>
                                    </td>

                                    <td class="status-tr">
                                        <?= $trem['status_nome'] ?? 'Ativo' ?>
                                    </td>
                                    <?php if ($perfilAtual == 1) { ?>
                                        <td class="buttons" data-carga-id="<?= $trem['carga_id'] ?? '' ?>">
                                            <button type="button" class="editar-trem btn btn-sm btn-outline-secondary"
                                                data-bs-toggle="modal" data-bs-target="#modalEditarTrem"
                                                data-id="<?= $trem['id'] ?>" data-modelo="<?= $trem['modelo'] ?>"
                                                data-carga-id="<?= $trem['carga_id'] ?? '' ?>"
                                                data-usuario-id="<?= $trem['usuario_id'] ?? '' ?>"
                                                data-status-id="<?= $trem['status_id'] ?? 1 ?>">
                                                <i class="bi bi-pencil fs-5"></i>
                                            </button>

                                            <a href="../source/delete/frota-delete.php?id=<?= $trem['id'] ?>"
                                                class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Deseja realmente excluir este trem?')">
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

        <?php include('../components/modals/add/frota-add.php') ?>

        <?php include('../components/modals/edit/frota-edit.php') ?>

    </main>

    <?php include('../config/bootstrap.html') ?>
    <script src="../scripts/navbar.js"></script>
    <script src="../scripts/frota.js"></script>
</body>

</html>