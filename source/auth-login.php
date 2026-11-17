<?php
session_start();

$usuarioLogado = isset($_SESSION['logado']) && $_SESSION['logado'] === true && isset($_SESSION['perfil_id']);

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('Location: ../public/login.php');
    exit;
}

if ($usuarioLogado) {
    header('Location: ../public/home.php');
    exit;
}

if (isset($_SESSION['logado']) || isset($_SESSION['perfil_id'])) {
    session_unset();
    session_destroy();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $stmt = $conexao->prepare("SELECT u.id, u.nome, u.email, u.senha, u.perfil_id, p.nome AS perfil FROM usuario u LEFT JOIN perfil p ON u.perfil_id = p.id WHERE (u.nome = ? OR u.email = ?) ");
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
            $_SESSION['perfil'] = $usuarios['perfil'];
            $_SESSION['logado'] = true;

            header('Location: ../public/home.php');
            exit;

        } else {
            $erro = "Nome ou senha incorretos!";
        }
    } else {
        $erro = "Nome ou senha incorretos!";
    }
}
?>