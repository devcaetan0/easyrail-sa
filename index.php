<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <?php include('config/links.html') ?>
    <link rel="icon" href="assets/images/logo.png" type="image/png">
    <title>Página Inicial</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg w-100 p-3" id="navbar">
            <div style="transform: scale(1.25);" class="">
                <a class="navbar-brand">
                    <img src="assets/images/logo-navbar.png" alt="EasyRail Logo" width="45px" height="45px">
                    <span style="color: var(--cor-branca);">Easy</span><span
                        style="color: var(--cor-laranja);">Rail</span>
                </a>
            </div>
            <a class="navbar-brand ms-auto" href="public/login.php?logout=1">
                <i class="bi bi-person-fill-up"></i>
                <span class="ms-1" style="color: var(--cor-branca);  ">Entrar</span>
            </a>
        </nav>
    </header>

    <main class="container-fluid fade-in main-padrao">
        <div class="titulo-home text-center mt-5 mb-5 fw-bold">
            <h1>Olá, Bem-vindo(a) a EasyRail!</h1>
            <h4>Acompanhe cada trem, trilho e carga em tempo real.</h4>
        </div>
        <section>
            <h1>EasyRail</h1>
            <br>
            <h6>Este site é o resultado da nossa Situação de Aprendizagem (SA) do curso técnico, desenvolvida para
                colocar em prática o que aprendemos ao longo dos anos letivos.<br>
                O desafio proposto foi criar um sistema de controle ferroviário que reúne, em um só lugar, as
                informações dos sensores instalados nos trens, nos trilhos<br>
                e no ambiente, permitindo analisar melhor o desempenho do envio de cargas.</h6>

        </section>

        <div class="row justify-content-center mt-4">
            <div class="d-flex">
                <img class="foto-integrante borda-laranja fade-fotos" src="assets/images/calegari-terno.png"
                    alt="integrante-calegari">

                <img class="foto-integrante borda-laranja fade-fotos" src="assets/images/gabe-terno.png"
                    alt="integrante-gabe">
                <img class="foto-integrante borda-laranja fade-fotos" src="assets/images/davi-terno.png"
                    alt="integrante-davi">
                <img class="foto-integrante borda-laranja fade-fotos" src="assets/images/antonio-terno.png"
                    alt="integrante-antonio">
            </div>
        </div>
    </main>

</body>
<footer>



</footer>

</html>