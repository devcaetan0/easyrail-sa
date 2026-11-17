<?php
include "../config/conexao.php";

include("../source/auth-login.php");
?>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("../config/links.html"); ?>
    <title>Login</title>
</head>

<body id="body-login">
    <main id="main-login">
        <img src="../assets/images/logo.png" class="logo-login" alt="EasyRail icon">
        <div class="login-content">
            <h2 class="login-title">EASYRAIL</h2>

            <form id="form-login" action="" method="POST">

                <div class="mt-3 mb-3">
                    <label for="nome">Usuário/E-mail:</label>
                    <input class="form-control " type="text" name="nome" id="nome" required>
                </div>

                <div class="mt-3 login-ultimo-campo">
                    <label for="senha">Senha:</label>
                    <input class="form-control " type="password" name="senha" id="senha" required>
                </div>

                <?php if (!empty($erro)) { ?>
                    <p> <?php echo $erro; ?></p>
                <?php } ?>

                <button class="btn w-100" id="btn-envio" type="submit">Entrar</button>
            </form>
        </div>
    </main>
</body>

</html>