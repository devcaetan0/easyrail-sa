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
                    <a class="nav-link d-inline-flex align-items-center gap-2" href="dashboard.php">
                        <i class="bi bi-house fs-5"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-inline-flex align-items-center gap-2" href="frota.php">
                        <i class="bi bi-box fs-5"></i>
                        <span>Frota de Carga</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-inline-flex align-items-center gap-2" href="rotas.php">
                        <i class="bi bi-box fs-5"></i>
                        <span>Rotas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-inline-flex align-items-center gap-2" href="sensores.php">
                        <i class="bi bi-wifi fs-5"></i>
                        <span>Sensores IoT</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-inline-flex align-items-center gap-2" href="relatorios.php">
                        <i class="bi bi-file-earmark-text fs-5"></i>
                        <span>Relatórios</span>
                    </a>
                </li>
                <?php if (isset($_SESSION['perfil_id']) && $_SESSION['perfil_id'] == 1) { ?>
                    <li class="nav-item">
                        <a class="nav-link d-inline-flex align-items-center gap-2" href="usuarios.php">
                            <i class="bi bi-person fs-5"></i>
                            <span>Usuários</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div>
            <a class="navbar-brand" href="../index.php?logout=1"><span style="color: var(--cor-branca);">Sair</span></a>
        </div>
    </nav>
</header>