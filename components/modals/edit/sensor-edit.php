<?php
$resultadoTrens = $conexao->query("SELECT id, modelo FROM trem ORDER BY modelo ASC");
$resultadoRotas = $conexao->query("SELECT id, nome FROM rota ORDER BY nome ASC");
?>

<div class="modal fade" id="modalEditarSensor" tabindex="-1" aria-labelledby="modalEditarSensorLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-start">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="modalEditarSensorLabel">Editar Sensor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form id="form-sensor" action="../source/update/sensor-update.php" method="POST">
                    <input type="hidden" id="modal-sensor-id" name="id">

                    <div class="mb-3">
                        <label for="modal-nome" class="form-label fw-bold">Nome</label>
                        <input type="text" class="form-control" id="modal-nome" name="nome" maxlength="100" required>
                    </div>
                    <div class="mb-3">
                        <label for="modal-tipo" class="form-label fw-bold">Tipo</label>
                        <input type="text" class="form-control" id="modal-tipo" name="tipo" maxlength="45" required>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold form-label" for="modal-status_id">Status</label>
                        <select class="form-select" id="modal-status_id" name="status_id" required>
                            <option value="">Selecione um status</option>
                            <option value="1">Ativo</option>
                            <option value="2">Inativo</option>
                            <option value="3">Manutenção</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="modal-trem_id" class="form-label fw-bold">Trem vinculado</label>
                        <select class="form-select" id="modal-trem_id" name="trem_id" required>
                            <option value="">Selecione um trem</option>
                            <?php while ($trem = $resultadoTrens->fetch_assoc()) { ?>
                                <option value="<?= $trem['id'] ?>"><?= $trem['modelo'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="modal-rota_id" class="form-label fw-bold">Rota vinculada</label>
                        <select class="form-select" id="modal-rota_id" name="rota_id" required>
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