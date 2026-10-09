<?php
session_start();
include "../infra/conexao.php";
verificarAcesso(5);
$perfilAtual = $_SESSION['perfil_id'];

$resultadoTrem = $conexao->query("
    SELECT u.id, u.modelo, u.carga, u.usuario_id, p.nome AS usuario
    FROM trem u
    LEFT JOIN usuario p ON u.usuario_id = p.id
");
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
                                        <th>Usuário</th>
                                        <th>Ações</th>
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
                                                <?= $trem['usuario_id'] ?>
                                            </td>

                                            <td class="buttons">
                                                <button type="button"
                                                    class="editar-trem btn btn-sm btn-outline-secondary"
                                                    data-bs-toggle="modal" data-bs-target="#modalTrem"
                                                    data-id="<?= $trem['id'] ?>" 
                                                    data-modelo="<?= $trem['modelo'] ?>"
                                                    data-carga="<?= $trem['carga'] ?>"
                                                    data-usuario-id="<?= $trem['usuario_id'] ?? '' ?>">
                                                    ✏
                                                </button>

                                                <a href="../components/delete/usuario-delete.php?id=<?= $trem['id'] ?>"
                                                    class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Deseja realmente excluir esse usuário?')">
                                                    🗑
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
        </div>

        <?php include('../components/modals/frota-add.php') ?>

    </main>

    <?php include('../infra/bootstrap.html') ?>
    <script src="../scripts/trens.js"></script>
</body>

</html>