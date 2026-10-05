<div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="modalUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="modalUsuarioLabel">Editar Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-modal-usuario" action="../update/usuarios-update.php" method="POST">

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
                        <label for="modal-setor" class="form-label fw-bold">Setor</label>
                        <select name="perfil_id" class="form-control " id="modal-setor" required>
                            <option value="1">Administrador</option>
                            <option value="2">Operador</option>
                            <option value="3">Analista</option>
                            <option value="4">Gestor</option>
                            <option value="5">Maquinista</option>
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