<?php


$sql = "SELECT id, nome FROM usuario ORDER BY nome ASC";
$resultado = mysqli_query($conexao, $sql);

?>


<div class="modal fade" id="modalCadastroTrem" tabindex="-1" aria-labelledby="modalCadastroTremLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-start">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="modalCadastroTremLabel">Cadastrar Locomotiva</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-trem" action="../../components/create/frota-create.php" method="POST">

                    <div class="mb-3">
                        <label for="modelo" class="form-label fw-bold">Modelo</label>
                        <input type="text" class="form-control" id="modelo" name="modelo" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipoCarga" class="fw-bold form-label">Tipo de Carga</label>
                        <select class="form-select" id="tipoCarga" name="carga" required>
                            <option>Mineral</option>
                            <option>Combustível</option>
                            <option>Agrícola</option>
                            <option>Granel</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold form-label">Usuário Responsável</label>
                        <select class="form-select mb-3" id="usuario_id" name="usuario_id" required>

                            <option value="">Selecione um usuário: </option>

                            <?php while ($usuario = mysqli_fetch_assoc($resultado)) { ?>
                                <option value="<?= $usuario['id'] ?>">
                                    <?= $usuario['nome'] ?>
                                </option>
                            <?php } ?>

                        </select>
                    </div>


                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-secondary fw-bold"
                            data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-laranja" id="btn-salvar">Salvar Trem</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
            </div>
        </div>
    </div>
</div>