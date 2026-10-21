<?php
$resultadoTrens = $conexao->query("SELECT id, modelo FROM trem ORDER BY modelo ASC");
$resultadoRotas = $conexao->query("SELECT id, nome FROM rota ORDER BY nome ASC");
?>

<div class="modal fade" id="modalCadastroSensor" tabindex="-1" aria-labelledby="modalCadastroSensorLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-start">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="modalCadastroSensorLabel">Cadastrar Novo Sensor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form id="form-sensor" action="../source/create/sensor-create.php" method="POST">
                    <div class="mb-3">
                        <label for="nome" class="form-label fw-bold">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" maxlength="100" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipo" class="form-label fw-bold">Tipo</label>
                        <input type="text" class="form-control" id="tipo" name="tipo" maxlength="45" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label fw-bold">Status</label>
                        <input type="text" class="form-control" id="status" name="status" maxlength="45" required>
                    </div>
                    <div class="mb-3">
                        <label for="trem_id" class="form-label fw-bold">Trem vinculado</label>
                        <select class="form-select" id="trem_id" name="trem_id" required>
                            <option value="">Selecione um trem</option>
                            <?php while ($trem = $resultadoTrens->fetch_assoc()) { ?>
                                <option value="<?= $trem['id'] ?>"><?= $trem['modelo'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="rota_id" class="form-label fw-bold">Rota vinculada</label>
                        <select class="form-select" id="rota_id" name="rota_id" required>
                            <option value="">Selecione uma rota</option>
                            <?php while ($rota = $resultadoRotas->fetch_assoc()) { ?>
                                <option value="<?= $rota['id'] ?>"><?= $rota['nome'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-secondary fw-bold"
                            data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-laranja">Salvar Sensor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>