<?php
include "../infra/conexao.php";

$sql = "SELECT id, nome, email, perfil_id FROM usuario";

$result = $conexao->query($sql);
?>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../components/links.html') ?>
    <title>Usuários</title>
</head>

<body>
    <?php include('../components/navbar.html') ?>


    <main class="main-padrao">
        <div class="container-fluid px-5">
            <h1 class="titulo-pagina fw-bold mb-5">Administração de Usuário</h1>

            <div class="row px-5">
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card borda-laranja shadow-sm p-3">
                        <div class="card-body">
                            <form id="form-funcionarios" class="row g-3">
                                <h2 id="titulo" class="text-center fw-bold"></h2>

                                <div class="mb-2">
                                    <label for="nome" class="form-label fw-bold">Nome Usuário</label>
                                    <input type="text" class="form-control borda-laranja" id="nome" required>
                                </div>

                                <div class="mb-2">
                                    <label for="email" class="form-label fw-bold">Email Institucional</label>
                                    <input type="email" class="form-control borda-laranja" id="email" required>
                                </div>

                                <div class="mb-2">
                                    <label for="senha" class="form-label fw-bold">Senha</label>
                                    <input type="password" class="form-control borda-laranja" id="senha" required>
                                </div>

                                <div class="mb-2">
                                    <label for="setor" class="form-label fw-bold">Setor</label>
                                    <select name="Setor" class="form-control borda-laranja" id="setor" required>
                                        <option selected>Gestão</option>
                                        <option>Chefe - Setor</option>
                                        <option>Operacional</option>
                                        <option>Administrativo</option>
                                        <option>Funcionários</option>
                                    </select>
                                </div>
                                <div class="mb-2 mt-4">
                                    <button type="submit" class="btn btn-laranja w-100 py-2 fw-bold">Cadastrar</button>
                                </div>
                            </form>
                            <div id="mensagem" class="text-center mt-3"></div>
                            <div class="toggle text-center mt-2" id="toggle"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 col-lg-9">
                    <div class="card p-3 mb-4 shadow-sm">
                        <div class="row">
                            <div class="col-md-6 mb-2 mb-md-0">
                                <label class="fw-bold form-label">Pesquisar</label>
                                <input class="form-control" placeholder="Nome / ID">
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold form-label">Atuação</label>
                                <select class="form-select">
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
                                    </tr>
                                </thead>
                              
            <tbody>
                <?php while ($usuario = $resultado->fetch_assoc()) { ?>

                        <tr>
                            <td>
                                #<?= str_pad($usuario['id'], 5, '0', STR_PAD_LEFT) ?>
                            </td>

                            <td class="setor-tr">
                                    <?= htmlspecialchars($usuario['perfil_id']) ?>
                            </td>

                            <td class="nome-tr">
                                    <?= htmlspecialchars($usuario['nome']) ?>
                            </td>

                            <td class="buttons">

                                    <button>
                                        class="editar btn btn-sm btn-outline-secondary"
                                        data-id="<?= $usuario['id'] ?>"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalCadastro">
                                        ✏
                                    </button>

                                    <button
                                        class="excluir btn btn-sm btn-outline-danger"
                                        data-id="<?= $usuario['id'] ?>">
                                        🗑
                                    </button>

                                </td>
                            </tr>

                        <?php } ?>

        </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalCadastro" tabindex="-1" aria-labelledby="modalCadastroLabel aria-hidden="
                true">
                <div class="modal-dialog">
                    <div class="modal-content text-start">
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold" id="modalCadastroLabel">Editar Funcionário</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="form-editor">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Nome Usuário</label>
                                    <input type="text" class="form-control" id="edit-nome" required>
                                </div>
                                <div class="mb-3">
                                    <label class="fw-bold form-label">Setor</label>
                                    <select class="form-select" id="edit-setor">
                                        <option>Gestão</option>
                                        <option>Chefe - Setor</option>
                                        <option>Operacional</option>
                                        <option>Administrativo</option>
                                        <option>Funcionários</option>
                                    </select>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-secondary fw-bold"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-laranja" id="btn-salvar">Salvar Sensor</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

    </main>

    <script src="../scripts/funcionarios.js"></script>
</body>

</html>