<?php
include "../infra/conexao.php";

$queryUsuario = "SELECT u.id, u.nome, u.email, p.nome AS perfil 
FROM usuario u
LEFT JOIN perfil p ON u.perfil_id = p.id";

$resultadoUsuario = $conexao->query($queryUsuario);



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
                            <form id="form-funcionarios" action="../components/create/usuario-create.php"
                                method="POST" class="row g-3">
                                <h2 id="titulo" class="text-center fw-bold"></h2>

                                <div class="mb-2">
                                    <label for="nome" class="form-label fw-bold">Nome Usuário</label>
                                    <input type="text" class="form-control borda-laranja" id="nome" name="nome"
                                        required>
                                </div>

                                <div class="mb-2">
                                    <label for="email" class="form-label fw-bold">Email Institucional</label>
                                    <input type="email" class="form-control borda-laranja" id="email" name="email"
                                        required>
                                </div>

                                <div class="mb-2">
                                    <label for="senha" class="form-label fw-bold">Senha</label>
                                    <input type="password" class="form-control borda-laranja" id="senha" name="senha"
                                        required>
                                </div>

                                <div class="mb-2">

                                    <label for="setor" class="form-label fw-bold">Setor</label>

                                    <select name="perfil_id" class="form-control borda-laranja" id="setor" required>
                                        <option value=1>Gestão</option>
                                        <option value=2>Chefe - Setor</option>
                                        <option value=3>Operacional</option>
                                        <option value=4>Administrativo</option>
                                        <option value=5>Funcionários</option>
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
                                    <?php while ($usuario = $resultadoUsuario->fetch_assoc()) { ?>

                                        <tr>
                                            <td>
                                                #<?= str_pad($usuario['id'], 5, '0', STR_PAD_LEFT) ?>
                                            </td>

                                            <td class="setor-tr">
                                                <?= htmlspecialchars($usuario['perfil']) ?>
                                            </td>

                                            <td class="nome-tr">
                                                <?= htmlspecialchars($usuario['nome']) ?>
                                            </td>

                                            <td class="buttons">

                                                <button class="editar btn btn-sm btn-outline-secondary"
                                                    data-id="<?= $usuario['id'] ?>" data-bs-toggle="modal"
                                                    data-bs-target="#modalCadastro">
                                                    ✏
                                                </button>

                                                <button class="excluir btn btn-sm btn-outline-danger"
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


 
</body>

</html>