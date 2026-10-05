<?php
session_start();

$usuarioLogado = isset($_SESSION['logado']) && $_SESSION['logado'] === true && isset($_SESSION['perfil_id']);

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit;
}

if ($usuarioLogado) {
    header('Location: public/home.php');
    exit;
}

if (isset($_SESSION['logado']) || isset($_SESSION['perfil_id'])) {
    session_unset();
    session_destroy();
}

include "infra/conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    if (!empty($senha) && !empty($nome)) {
        $stmt = $conexao->prepare("SELECT id, nome, email, senha, perfil_id FROM usuario WHERE (nome = ? OR email = ?) ");
        $stmt->bind_param("ss", $nome, $nome);
        $stmt->execute();
    
    
    $resultado = $stmt->get_result();
    
    if ($usuarios = $resultado->fetch_assoc()) {
        
        if (password_verify($senha, $usuarios['senha'])) {
            session_regenerate_id(true);


            $_SESSION['id'] = $usuarios['id'];
            $_SESSION['nome'] = $usuarios['nome'];
            $_SESSION['email'] = $usuarios['email'];
            $_SESSION['perfil_id'] = $usuarios['perfil_id'];
            $_SESSION['logado'] = true;

            header('Location: public/home.php');
            exit;

        } else {
            $erro = "Nome ou senha incorretos!";
        }
        } else {
            $erro = "Nome ou senha incorretos!";
        }
    } else {
        $erro = "Preencha o usuário e a senha.";
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="icon" href="assets/images/logo.png" type="image/png">
    <title>Login</title>
</head>

<body id="body-login" class="h-100">
    <main id="main-login" class=" h-100">
        <img src="assets/images/logo.png" class="logo-login d-flex justify-content-center" alt="EasyRail icon">
        <div style="transform: scale(0.75);" class="p-5 m-5">
            <div class="card-body p-5 m-5">
                <h2 style="font-size: 50px;">EASYRAIL</h2>

                <form id="form-login" action="" method="POST">

                    <div class="mt-3 mb-3">
                        <label for="nome">Usuário/E-mail:</label>
                        <input class="form-control " type="text" name="nome" id="nome" required>
                    </div>

                    <div class="mt-3 mb-3">
                        <label for="senha">Senha:</label>
                        <input class="form-control " type="password" name="senha" id="senha" required>
                    </div>

                    <div class="mt-3 mb-3">
                        <input style="width: 20px; height: 20.00px;" type="checkbox">
                        <label>Mantenha-me logado</label><br>
                    </div>

                    <?php if (!empty($erro)): ?>
                        <p> <?php echo $erro; ?></p>
                    <?php endif; ?>

                    <button class="btn w-100" id="btn-envio" type="submit">Entrar</button>
                </form>
            </div>
        </div>
    </main>
</body>

</html>