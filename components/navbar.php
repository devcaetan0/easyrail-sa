<?php
$perfilId = $_SESSION['perfil_id'];

if ($perfilId < 2) {
    $homeLink = 'home-admin.php';
} else {
    $homeLink = 'home-usuario.php';
}

?>

    <header>
        <nav class="navbar navbar-expand-lg w-100 p-2" id="navbar">
            <a class="navbar-brand" href="<?= $homeLink ?>">
                <img src="../assets/images/logo-navbar.png" alt="EasyRail Logo" width="45px" height="45px">
                EasyRail
            </a>
            <div class="collapse navbar-collapse d-flex justify-content-center">
                <ul class="navbar-nav gap-5">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="frota.php">Frota de Carga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sensores.php">Sensores IoT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="relatorios.php">Relatórios</a>
                    </li>
                    <?php if ($perfilId < 2): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="usuarios.php">Usuários</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
            <a class="navbar-brand" href="../index.php">Sair</a>
        </nav>
    </header>