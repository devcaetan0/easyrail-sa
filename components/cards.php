<div class="row g-3 justify-content-center">
    <div class="col-2">
        <div class="card-padrao shadow-sm borda-laranja rounded text-center p-4 d-flex flex-column">
            <h3>📊</h3>
            <h4>Dashboard</h4>
            <a href="#" class="btn btn-laranja mt-auto">Acessar</a>
        </div>
    </div>
    <div class="col-2">
        <div class="card-padrao shadow-sm borda-laranja rounded text-center p-4 d-flex flex-column">
            <h3>🚂</h3>
            <h4>Frota</h4>
            <a href="frota.php" class="btn btn-laranja mt-auto">Gerenciar</a>
        </div>
    </div>
    <div class="col-2">
        <div class="card-padrao shadow-sm borda-laranja rounded text-center p-4 d-flex flex-column">
            <h3>📡</h3>
            <h4>Sensores</h4>
            <a href="sensores.php" class="btn btn-laranja mt-auto">Monitorar</a>
        </div>
    </div>
    <div class="col-2">
        <div class="card-padrao shadow-sm borda-laranja rounded text-center p-4 d-flex flex-column">
            <h3>📋</h3>
            <h4>Relatórios</h4>
            <a href="relatorios.php" class="btn btn-laranja mt-auto">Visualizar</a>
        </div>
    </div>
    <?php if ($perfilAtual == 1) { ?>
        <div class="col-2">
            <div class="card-padrao shadow-sm borda-laranja  text-center p-4 d-flex flex-column">
                <h3>👥</h3>
                <h4>Equipe</h4>
                <a href="usuarios.php" class="btn btn-laranja mt-auto">Administrar</a>
            </div>
        </div>
    <?php } ?>
</div>