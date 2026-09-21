<?php 

include '../../infra/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $perfil_id = $_POST['perfil_id'];


    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuario (nome, email, senha, perfil_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nome, $email, $senhaCriptografada, $perfil_id);

    if ($stmt->execute()) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}


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
            <h1 class="titulo-pagina fw-bold mb-5">Adicionar Novo Usuário</h1>

            <div class="row px-5">
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card borda-laranja shadow-sm p-3">
                        <div class="card-body">
                            <form id="form-funcionarios" method="POST" class="row g-3">
                                <h2 id="titulo" class="text-center fw-bold"></h2>

                                <div class="mb-2">
                                    <label for="nome" class="form-label fw-bold">Nome Usuário</label>
                                    <input type="text" class="form-control borda-laranja" id="nome" name="nome" required>
                                </div>

                                <div class="mb-2">
                                    <label for="email" class="form-label fw-bold">Email Institucional</label>
                                    <input type="email" class="form-control borda-laranja" id="email" name="email" required>
                                </div>

                                <div class="mb-2">
                                    <label for="senha" class="form-label fw-bold">Senha</label>
                                    <input type="password" class="form-control borda-laranja" id="senha" name="senha" required>
                                </div>

                                <div class="mb-2">
                                    <label for="perfil_id" class="form-label fw-bold">Setor</label>
                                    <select name="perfil_id" class="form-control borda-laranja" id="perfil_id" required>
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
                                <br>
                                <button type="button" class="btn btn-secondary w-100 py-2 fw-bold" onclick="window.location.href='../../public/usuarios.php'">Voltar</button>
                                </body>
                                </html>

                    