<?php
session_start();
include "../config/conexao.php";
verificarAcesso(5);

$perfilAtual = $_SESSION['perfil_id'];

$limite = 9;
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($pagina < 1) $pagina = 1;
$offset = ($pagina - 1) * $limite;

$resultadoRota = $conexao->query("
    SELECT r.id, r.nome, r.distancia, r.descricao, r.trem_id, r.duracao, t.modelo AS modelo
    FROM rota r JOIN trem t ON t.id = r.trem_id
    ORDER BY r.id ASC
    LIMIT $limite OFFSET $offset
");

     $ultimaPagina = $resultadoRota->num_rows < $limite;

    if ($resultadoRota->num_rows < $limite) {
    $ultimaPagina = true;
    } else {
    $ultimaPagina = false;
    }


$resultadoTrem = $conexao->query("SELECT id, modelo FROM trem ORDER BY modelo ASC");
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
                        <input class="form-control" placeholder="Nome/ID" id="pesquisa">
                    </div>
                    <div class="col-md-6">
                        <label class="fw-bold form-label">Trem</label>
                        <select class="form-select" id="filtroTrem">
                            <option value="">Todos</option>
                            <?php while ($tremFiltro = $resultadoTrem->fetch_assoc()) { ?>
                                <option value="<?= $tremFiltro['id'] ?>">
                                    <?= $tremFiltro['modelo'] ?>
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
                                <th>Nome</th>
                                <th>Distância (km)</th>
                                <th>Trem</th>
                                <th>Duração</th>
                                <?php if ($perfilAtual == 1) { ?>
                                    <th>Ações</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody id="tabelaRotas">
                            <?php while ($rota = $resultadoRota->fetch_assoc()) { ?>

                                <tr data-trem-id="<?= $rota['trem_id'] ?>">
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
                    <br>
                    <?php if ($pagina > 1) { ?>
                    <a href="?pagina=<?= $pagina - 1 ?>" class="btn btn-laranja btn-sm">Anterior</a>
                    <?php } ?>
                    <span class="mx-2">Página <?= $pagina ?></span>
                    <?php if (!$ultimaPagina) { ?>
                    <a href="?pagina=<?= $pagina + 1 ?>" class="btn btn-laranja btn-sm">Próxima</a>
                    <?php } ?> 
                </div>
            </div>
        </div>

        <?php include('../components/modals/add/rota-add.php') ?>

        <?php include('../components/modals/edit/rota-edit.php') ?>
    </main>

    <script src="../scripts/navbar.js"></script>
    <?php include('../config/bootstrap.html') ?>

    <script src="../scripts/rotas.js"></script>
</body>

</html>