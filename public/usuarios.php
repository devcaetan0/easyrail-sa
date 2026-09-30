<?php
session_start();
include "../infra/conexao.php";
verificarAcesso(1, $_SESSION['perfil_id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int) $_POST['id'];
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $perfil_id = (int) $_POST['perfil_id'];
    $senha = $_POST['senha'] ?? '';

    if ($senha !== '') {
        $stmt = $conexao->prepare(
            "UPDATE usuario SET nome = ?, email = ?, perfil_id = ?, senha = ? WHERE id = ?"
        );
        $stmt->bind_param("ssisi", $nome, $email, $perfil_id, $senha, $id);
    } else {
        $stmt = $conexao->prepare(
            "UPDATE usuario SET nome = ?, email = ?, perfil_id = ? WHERE id = ?"
        );
        $stmt->bind_param("ssii", $nome, $email, $perfil_id, $id);
    }

    $stmt->execute();

    header("Location: usuarios.php");
    exit;
}

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
                    <div class="card borda-laranja shadow-sm p-3">
                        <div class="card-body">
                            <form id="form-funcionarios" action="../components/create/usuario-create.php" method="POST"
                                class="row g-3">
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
                                        <option value="1">Administrador</option>
                                        <option value="2">Operador</option>
                                        <option value="3">Analista</option>
                                        <option value="4">Gestor</option>
                                        <option value="5">Maquinista</option>
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
                                                <button type="button"
                                                    class="editar-usuario btn btn-sm btn-outline-secondary"
                                                    data-bs-toggle="modal" data-bs-target="#modalUsuario"
                                                    data-id="<?= $usuario['id'] ?>"
                                                    data-nome="<?= htmlspecialchars($usuario['nome']) ?>"
                                                    data-email="<?= htmlspecialchars($usuario['email']) ?>"
                                                    data-perfil="<?= $usuario['perfil_id'] ?? '' ?>">
                                                    ✏
                                                </button>

                                                <a href="../components/delete/usuario-delete.php?id<<?= $usuario['id'] ?>"
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

    <div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="modalUsuarioLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="modalUsuarioLabel">Editar Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-modal-usuario" action="../public/usuarios.php" method="POST">

                        <input type="hidden" id="modal-id" name="id">

                        <div class="mb-3">
                            <label for="modal-nome" class="form-label fw-bold">Nome Usuário</label>
                            <input type="text" class="form-control borda-laranja" id="modal-nome" name="nome" required>
                        </div>

                        <div class="mb-3">
                            <label for="modal-email" class="form-label fw-bold">Email Institucional</label>
                            <input type="email" class="form-control borda-laranja" id="modal-email" name="email"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="modal-senha" class="form-label fw-bold">Nova Senha (opcional)</label>
                            <input type="password" class="form-control borda-laranja" id="modal-senha" name="senha">
                        </div>

                        <div class="mb-3">
                            <label for="modal-setor" class="form-label fw-bold">Setor</label>
                            <select name="perfil_id" class="form-control borda-laranja" id="modal-setor" required>
                                <option value="1">Administrador</option>
                                <option value="2">Operador</option>
                                <option value="3">Analista</option>
                                <option value="4">Gestor</option>
                                <option value="5">Maquinista</option>
                            </select>
                        </div>

                        <div class="modal-footer px-0 pb-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-laranja fw-bold">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include '../infra/bootstrap.html'; ?>

    <script>
        document.querySelectorAll('.editar-usuario').forEach(btn => {
            btn.addEventListener('click', () => {
                document.getElementById('modal-id').value = btn.dataset.id;
                document.getElementById('modal-nome').value = btn.dataset.nome;
                document.getElementById('modal-email').value = btn.dataset.email;
                document.getElementById('modal-setor').value = btn.dataset.perfil;
                document.getElementById('modal-senha').value = '';
            });
        });
    </script>

</body>

</html>