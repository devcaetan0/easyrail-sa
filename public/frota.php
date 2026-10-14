<?php
session_start();

include "../config/conexao.php";

verificarAcesso(5);

$perfilAtual = $_SESSION['perfil_id'];

$resultadoTrem = $conexao->query("
    SELECT t.id, t.modelo, t.carga_id, c.nome AS carga, t.usuario_id, u.nome AS nome_usuario
    FROM trem t
    LEFT JOIN usuario u ON t.usuario_id = u.id
    LEFT JOIN carga c ON c.id = t.carga_id
");

$resultadoCargas = $conexao->query("SELECT id, nome FROM carga ORDER BY nome ASC");
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
                        <input class="form-control" placeholder="Modelo/ID" id="pesquisa">
                    </div>
                    <div class="col-md-6">
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
                                <th>Usuário</th>
                                <?php if ($perfilAtual == 1) { ?>
                                    <th>Ações</th>
                                <?php } ?>
                            </tr>
                        </thead>

                        <tbody id="tabelaTrens">
                            <?php while ($trem = $resultadoTrem->fetch_assoc()) { ?>

                                <tr>
                                    <td>
                                        #<?= $trem['id'] ?>
                                    </td>

                                    <td class="modelo-tr">
                                        <?= $trem['modelo'] ?>
                                    </td>

                                    <td class="carga-tr">
                                        <?= $trem['carga'] ?>
                                    </td>

                                    <td class="usuario-tr">
                                        <?= $trem['nome_usuario'] ?>
                                    </td>
                                    <?php if ($perfilAtual == 1) { ?>
                                        <td class="buttons" data-carga-id="<?= $trem['carga_id'] ?? '' ?>">
                                            <button type="button" class="editar-trem btn btn-sm btn-outline-secondary"
                                                data-bs-toggle="modal" data-bs-target="#modalEditarTrem"
                                                data-id="<?= $trem['id'] ?>" data-modelo="<?= $trem['modelo'] ?>"
                                                data-carga-id="<?= $trem['carga_id'] ?? '' ?>"
                                                data-usuario-id="<?= $trem['usuario_id'] ?? '' ?>">
                                                ✏
                                            </button>

                                            <a href="../source/delete/frota-delete.php?id=<?= $trem['id'] ?>"
                                                class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Deseja realmente excluir este trem?')">
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

        <?php include('../components/modals/add/frota-add.php') ?>

        <?php include('../components/modals/edit/frota-edit.php') ?>

    </main>

    <?php include('../config/bootstrap.html') ?>
    <script src="../scripts/frota.js"></script>
</body>

</html>