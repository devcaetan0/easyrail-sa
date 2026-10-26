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
            <a class="navbar-brand ms-auto" href="public/login.php">
                <i class="bi bi-person-fill-up"></i>
                <span class="ms-1" style="color: var(--cor-branca);  ">Entrar</span>
            </a>
        </nav>
    </header>

    <main class="container-fluid fade-in main-padrao">
        <div class="titulo-home text-center mt-5 mb-5 fw-bold">
            <h1>Olá, Bem-vindo(a) a EasyRail!</h1>
            <h4>Selecione uma categoria para começar a gerenciar os dados de suas locomotivas.</h4>
        </div>


        <div class="row justify-content-center mt-4">
            <div class="col-auto">
                <img class="logo-home" src="assets/images/logo-negative.png" alt="EasyRail Logo">
            </div>
        </div>
    </main>

</body>

</html>