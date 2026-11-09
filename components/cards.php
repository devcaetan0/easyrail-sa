<div class="row g-3 justify-content-center home-cards mb-5">
    
    <div class="home-card-column">
        <div class="home-card shadow-sm borda-laranja text-center p-3 d-flex flex-column">
            <h3> <i class="bi bi-box fs-2"></i></h3>
            <h4>Frota</h4>
            <a href="frota.php" class="btn btn-laranja mt-auto">Gerenciar</a>
        </div>
    </div>
    <div class="home-card-column">
        <div class="home-card shadow-sm borda-laranja text-center p-3 d-flex flex-column">
            <h3><i class="bi bi-map fs-2"></i></h3>
            <h4>Rotas</h4>
            <a href="rotas.php" class="btn btn-laranja mt-auto">Mapear</a>
        </div>
    </div>
    <div class="home-card-column">
        <div class="home-card shadow-sm borda-laranja text-center p-3 d-flex flex-column">
            <h3><i class="bi bi-wifi fs-2"></i></h3>
            <h4>Sensores</h4>
            <a href="sensores.php" class="btn btn-laranja mt-auto">Monitorar</a>
        </div>
    </div>
    
    <?php if ($perfilAtual == 1) { ?>
        <div class="home-card-column">
            <div class="home-card shadow-sm borda-laranja text-center p-3 d-flex flex-column">
                <h3><i class="bi bi-person fs-2"></i></h3>
                <h4>Equipe</h4>
                <a href="usuarios.php" class="btn btn-laranja mt-auto">Administrar</a>
            </div>
        </div>
    <?php } ?>
</div>