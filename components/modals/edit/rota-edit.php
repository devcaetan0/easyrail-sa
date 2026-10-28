<?php
$resultadoTrens = $conexao->query("SELECT id, modelo FROM trem ORDER BY modelo ASC");
?>

<div class="modal fade" id="modalEditarRota" tabindex="-1" aria-labelledby="modalEditarRotaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-start">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="modalEditarRotaLabel">Editar Rota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-modal-rota" action="../source/update/rota-update.php" method="POST">

                    <input type="hidden" id="modal-id" name="id">

                    <div class="row g-3">
                        <div class="col-md-8">
                            <label for="nome" class="form-label fw-bold">Nome *</label>
                            <input type="text" class="form-control" id="modal-nome" name="nome" maxlength="100"
                                required>
                        </div>
                        <div class="col-md-4">
                            <label for="distancia" class="form-label fw-bold">Distância (km) *</label>
                            <input type="number" class="form-control" id="modal-distancia" name="distancia" min="0"
                                step="any" required>
                        </div>
                        <div class="col-md-4">
                            <label for="duracao" class="form-label fw-bold">Duração *</label>
                            <input type="time" class="form-control" id="modal-duracao" name="duracao" step="1" required>
                        </div>
                        <div class="col-12">
                            <label for="descricao" class="form-label fw-bold">Descrição</label>
                            <textarea class="form-control" id="modal-descricao" name="descricao" rows="3"></textarea>
                        </div>
                        <div class="col-12">
                            <label for="trem_id" class="form-label fw-bold">Trem Vinculado *</label>
                            <select class="form-select" id="modal-trem_id" name="trem_id" required>
                                <option value="">Selecione um trem</option>
                                <?php while ($trem = $resultadoTrens->fetch_assoc()) { ?>
                                    <option value="<?= $trem['id'] ?>">
                                        <?= $trem['modelo'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex gap-2 mt-3">
                        <button type="button" class="btn btn-secondary fw-bold"
                            data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-laranja" id="btn-salvar">Salvar Rota</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
            </div>
        </div>
    </div>
</div>