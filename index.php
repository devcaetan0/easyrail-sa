<?php
if (isset($_GET['logout'])) {
    session_start();
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit;
}
?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Conheça a EasyRail, proposta de sistema para acompanhar trens, rotas e sensores ferroviários.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/images/logo.png" type="image/png">
    <title>EasyRail</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg p-2" id="navbar" aria-label="Navegação principal">
            <div class="container">
                <div class="navbar-brand d-flex align-items-center fw-bold">
                    <img src="assets/images/logo-navbar.png" alt="EasyRail Logo" width="" height="45px">
                    <span style="color: var(--cor-branca);">Easy</span><span
                        style="color: var(--cor-laranja);">Rail</span>
                </div>
                <a class="btn btn-laranja" href="public/login.php">
                    Entrar <i class="bi bi-arrow-right ms-1" aria-hidden="true"></i>
                </a>
            </div>
        </nav>
    </header>

    <main class="container mt-5 pt-4 pb-5 fade-in" id="inicio">
        <div class="row align-items-center g-4 py-lg-4">
            <div class="col-lg-7">
                <h1 class="display-4 fw-bold">Mais clareza para acompanhar cada jornada.</h1>
                <p class="lead mt-3">
                    A EasyRail é uma proposta de sistema que reúne informações de trens, rotas e sensores para apoiar
                    o acompanhamento e a análise das operações ferroviárias.
                </p>
                <a class="btn btn-laranja btn-lg mt-2" href="public/login.php">
                    Conheça o sistema <i class="bi bi-arrow-right ms-2" aria-hidden="true"></i>
                </a>
            </div>
            <div class="col-lg-5">
                <div class="bg-white border rounded-3 shadow-sm p-4">
                    <h2 class="h5 fw-bold"><i class="bi bi-train-front me-2 text-warning" aria-hidden="true"></i>
                        Informação conectada</h2>
                    <p class=" mb-3">
                        Um lugar para organizar dados operacionais que podem ficar dispersos entre diferentes
                        ferramentas.
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge text-bg-dark p-2"><i class="bi bi-train-front me-2"></i> Frota</span>
                        <span class="badge text-bg-dark p-2"><i class="bi bi-signpost-2 me-2"></i> Rotas</span>
                        <span class="badge text-bg-dark p-2"><i class="bi bi-broadcast me-2"></i> Sensores</span>
                        <span class="badge text-bg-dark p-2"><i class="bi bi-bar-chart me-2"></i> Relatórios</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-top py-4">
            <h2 class="h4 fw-bold">O que a EasyRail propõe?</h2>
            <p class="">
                Acompanhar uma operação ferroviária exige relacionar informações de trens, trajetos e sensores.
                A EasyRail organiza esses dados para facilitar consultas e dar mais visibilidade ao cenário operacional.
            </p>
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="h-100 bg-white border rounded-3 p-3">
                        <h3 class="h6 fw-bold"><i class="bi bi-speedometer2 text-warning me-2"></i>Painel e dados</h3>
                        <p class=" mb-0">Visualize informações operacionais e registros dos sensores em um
                            dashboard.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="h-100 bg-white border rounded-3 p-3">
                        <h3 class="h6 fw-bold"><i class="bi bi-broadcast text-warning me-2"></i>Sensores e frota</h3>
                        <p class=" mb-0">Gerencie trens, rotas e sensores, incluindo dados como
                            velocidade, localização e falhas.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="h-100 bg-white border rounded-3 p-3">
                        <h3 class="h6 fw-bold"><i class="bi bi-file-earmark-bar-graph text-warning me-2"></i>Análises
                        </h3>
                        <p class=" mb-0">Consulte relatórios e históricos para apoiar a eficiência e a
                            atenção à segurança.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-top py-4">
            <h2 class="h4 fw-bold mb-3">Quem desenvolveu?</h2>
            <div class="row row-cols-2 row-cols-md-4 fade-in">
                <div class="col text-center">
                    <p class="fw-semibold mb-2">Antonio Ribeiro</p>
                    <img src="assets/images/antonio-terno.png" class="img-fluid border rounded"
                        alt="Desenvolvedor Antonio">
                </div>
                <div class="col text-center">
                    <p class="fw-semibold mb-2">Davi Batista</p>
                    <img src="assets/images/davi-terno.png" class="img-fluid border rounded" alt="Desenvolvedor Davi">
                </div>
                <div class="col text-center">
                    <p class="fw-semibold mb-2">Gabriel Maciel</p>
                    <img src="assets/images/gabe-terno.png" class="img-fluid border rounded"
                        alt="Desenvolvedor Gabriel">
                </div>
                <div class="col text-center">
                    <p class="fw-semibold mb-2">Rafael Calegari</p>
                    <img src="assets/images/calegari-terno.png" class="img-fluid border rounded"
                        alt="Desenvolvedor Calegari">
                </div>
            </div>
        </div>
    </main>
</body>

</html>