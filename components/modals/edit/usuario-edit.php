<?php
$resultadoPerfis = $conexao->query("SELECT id, nome FROM perfil ORDER BY nome ASC");
?>

<div class="modal fade" id="modalEditarUsuario" tabindex="-1" aria-labelledby="modalEditarUsuarioLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="modalEditarUsuarioLabel">Editar Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-modal-usuario" action="../source/update/usuario-update.php" method="POST">

                    <input type="hidden" id="modal-id" name="id">

                    <div class="mb-3">
                        <label for="modal-nome" class="form-label fw-bold">Nome Usuário</label>
                        <input type="text" class="form-control " id="modal-nome" name="nome" required>
                    </div>

                    <div class="mb-3">
                        <label for="modal-email" class="form-label fw-bold">Email Institucional</label>
                        <input type="email" class="form-control " id="modal-email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="modal-senha" class="form-label fw-bold">Nova Senha (opcional)</label>
                        <input type="password" class="form-control " id="modal-senha" name="senha">
                    </div>

                    <div class="mb-3">
                        <label for="modal-cargo" class="form-label fw-bold">Cargo</label>
                        <select name="perfil_id" class="form-control" id="perfil_id" required>
                            <?php while ($perfil = $resultadoPerfis->fetch_assoc()) { ?>
                                <option value="<?= $perfil['id'] ?>">
                                    <?= $perfil['nome'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="modal-footer px-0 pb-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-laranja fw-bold">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>