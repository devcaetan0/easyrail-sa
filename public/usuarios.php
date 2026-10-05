<?php
session_start();
include "../infra/conexao.php";

verificarAcesso(1);

$resultadoUsuario = $conexao->query("
    SELECT u.id, u.nome, u.email, u.perfil_id, p.nome AS perfil
    FROM usuario u
    LEFT JOIN perfil p ON u.perfil_id = p.id
");

?>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../components/links.html') ?>
    <title>Usuários</title>
</head>

<body>
    <?php include('../components/navbar.php') ?>

    <main class="main-padrao">
        <div class="container-fluid px-5">
            <h1 class="titulo-pagina fw-bold mb-5">Administração de Usuário</h1>

            <div class="row px-5">
                <div class="col-md-4 col-lg-3 mb-4">
                    <?php include('../components/usuarios-form.php') ?>
                </div>

                <div class="col-md-8 col-lg-9">
                    <div class="card p-3 mb-4 shadow-sm">
                        <div class="row">
                            <div class="col-md-6 mb-2 mb-md-0">
                                <label class="fw-bold form-label">Pesquisar</label>
                                <input type="text" id="pesquisa" class="form-control" placeholder="Nome / ID">
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold form-label">Atuação</label>
                                <select class="form-select" id="atuacao">
                                    <option>Todos</option>
                                    <option>Gestão</option>
                                    <option>Chefe - Setor</option>
                                    <option>Operacional</option>
                                    <option>Administrativo</option>
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
                                        <th>Setor</th>
                                        <th>Usuário</th>
                                        <th>Ações</th>
                                </thead>

                                <tbody id="tabelaUsuarios">
                                    <?php while ($usuario = $resultadoUsuario->fetch_assoc()) { ?>

                                        <tr>
                                            <td>
                                                #<?= $usuario['id'] ?>
                                            </td>

                                            <td class="setor-tr">
                                                <?= $usuario['perfil'] ?>
                                            </td>

                                            <td class="nome-tr">
                                                <?= $usuario['nome'] ?>
                                            </td>

                                            <td class="buttons">
                                                <button type="button"
                                                    class="editar-usuario btn btn-sm btn-outline-secondary"
                                                    data-bs-toggle="modal" data-bs-target="#modalUsuario"
                                                    data-id="<?= $usuario['id'] ?>" data-nome="<?= $usuario['nome'] ?>"
                                                    data-email="<?= $usuario['email'] ?>"
                                                    data-perfil="<?= $usuario['perfil_id'] ?? '' ?>">
                                                    ✏
                                                </button>

                                                <a href="../components/delete/usuario-delete.php?id=<?= $usuario['id'] ?>"
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
            </div>
        </div>
    </main>

    <?php include '../components/modals/usuarios-edit.php'; ?>

    <?php include '../infra/bootstrap.html'; ?>

    <script src="../scripts/usuarios.js"></script>

</body>

</html>