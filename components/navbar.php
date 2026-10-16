<header>
    <nav class="navbar navbar-expand-lg w-100 p-3" id="navbar">
        <div style="transform: scale(1.25);" class="">
            <a class="navbar-brand" href="home.php">
                <img src="../assets/images/logo-navbar.png" alt="EasyRail Logo" width="45px" height="45px">
                <span style="color: var(--cor-branca);">Easy</span><span style="color: var(--cor-laranja);">Rail</span>
            </a>
        </div>
        <div class="collapse navbar-collapse d-flex justify-content-center">
            <ul class="navbar-nav gap-5">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="frota.php">Frota de Carga</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="rotas.php">Rotas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sensores.php">Sensores IoT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="relatorios.php">Relatórios</a>
                </li>
                <?php if (isset($_SESSION['perfil_id']) && $_SESSION['perfil_id'] == 1) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="usuarios.php">Usuários</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div>
            <a class="navbar-brand" href="../index.php?logout=1">Sair</a>
        </div>
    </nav>
</header>