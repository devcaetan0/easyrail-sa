<?php
session_start();
include "../config/conexao.php";

verificarAcesso(1);

$mensagemUsuarios = $_SESSION['mensagem'] ?? '';
$tipoMensagemUsuarios = $_SESSION['tipo_mensagem'] ?? 'success';
unset($_SESSION['mensagem'], $_SESSION['tipo_mensagem']);

$resultadoUsuario = $conexao->query("
    SELECT u.id, u.nome, u.email, u.perfil_id, p.nome AS perfil, e.cidade AS cidade
    FROM usuario u
    LEFT JOIN perfil p ON u.perfil_id = p.id
    LEFT JOIN endereco e ON u.id = e.usuario_id
    ORDER BY u.id
");

$resultadoPerfisFiltro = $conexao->query("SELECT id, nome FROM perfil ORDER BY nome ASC");
?>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../config/links.html') ?>
    <title>Usuários</title>
</head>

<body>
    <?php include('../components/navbar.php') ?>

    <main class="main-padrao">
        <div class=" align-items-center gap-3">
            <div class="d-flex">
                <i class="bi bi-person" style="font-size: 4rem; line-height: 1; margin-left: 20px;"></i>
                <h1 class="m-0 fw-bold ms-4">Administração de Usuário</h1>
            </div>
            <p style="margin-left: 110px;">Tela interativa para cadastrar novos funcionários e listagem dos
                funcionários.</p>
        </div>
        <br>
        <div class="container-fluid px-5">

            <?php if (!empty($mensagemUsuarios)) { ?>
                <div class="alert alert-<?= $tipoMensagemUsuarios ?> alert-dismissible show mx-5 mt-3">
                    <?= $mensagemUsuarios ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
                </div>
            <?php } ?>

            <div class="row px-5">
                <div class="col-md-4 col-lg-3 mb-4">
                    <?php include('../components/modals/add/usuario-add.php') ?>
                </div>

                <div class="col-md-8 col-lg-9">
                    <div class="card p-3 mb-4 shadow-sm">
                        <div class="row">
                            <div class="col-md-6 mb-2 mb-md-0">
                                <label class="fw-bold form-label">Pesquisar</label>
                                <input type="text" id="pesquisa" class="form-control" placeholder="Nome / ID">
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold form-label">Cargo</label>
                                <select class="form-select" id="filtroPerfil">
                                    <option value="">Todos</option>
                                    <?php while ($perfil = $resultadoPerfisFiltro->fetch_assoc()) { ?>
                                        <option value="<?= $perfil['id'] ?>">
                                            <?= $perfil['nome'] ?>
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
                                        <th>Cargo</th>
                                        <th>Usuário</th>
                                        <th>Cidade</th>
                                        <th>Ações</th>
                                </thead>

                                <tbody id="tabelaUsuarios">
                                    <?php while ($usuario = $resultadoUsuario->fetch_assoc()) { ?>

                                        <tr data-perfil-id="<?= $usuario['perfil_id'] ?? '' ?>">
                                            <td>
                                                #<?= $usuario['id'] ?>
                                            </td>

                                            <td class="Cargo-tr">
                                                <?= $usuario['perfil'] ?>
                                            </td>

                                            <td class="nome-tr">
                                                <?= $usuario['nome'] ?>
                                            </td>

                                            <td class="cidade-tr">
                                                <?= $usuario['cidade'] ?>
                                            </td>

                                            <td class="buttons">
                                                <button type="button"
                                                    class=" editar-usuario btn btn-sm btn-outline-secondary"
                                                    data-bs-toggle="modal" data-bs-target="#modalEditarUsuario"
                                                    data-id="<?= $usuario['id'] ?>" data-nome="<?= $usuario['nome'] ?>"
                                                    data-email="<?= $usuario['email'] ?>"
                                                    data-perfil="<?= $usuario['perfil_id'] ?>">
                                                    <i class="bi bi-pencil fs-5"></i>
                                                </button>

                                                <a href="../source/delete/usuario-delete.php?id=<?= $usuario['id'] ?>"
                                                    class=" btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Deseja realmente excluir esse usuário?')">
                                                    <i class="bi bi-trash fs-5"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include '../components/modals/edit/usuario-edit.php'; ?>

    </main>

    <?php include '../config/bootstrap.html'; ?>
    <script src="../scripts/navbar.js"></script>
    <script src="../scripts/usuarios.js"></script>

</body>

</html>