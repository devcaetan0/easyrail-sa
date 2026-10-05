<div class="modal fade" id="modalCadastroTrem" tabindex="-1" aria-labelledby="modalCadastroTremLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-start">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="modalCadastroTremLabel">Cadastrar Locomotiva</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-sensor">
                    <div class="mb-3">
                        <label for="edit-nome" class="form-label fw-bold">Modelo</label>
                        <input type="text" class="form-control" id="edit-nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-tipo" class="fw-bold form-label">Tipo de Carga</label>
                        <select class="form-select" id="edit-tipo">
                            <option>Mineral</option>
                            <option>Combustível</option>
                            <option>Agrícola</option>
                            <option>Granel</option>
                        </select>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="edit-localizacao" class="form-label fw-bold">Partida</label>
                            <input type="text" class="form-control" id="edit-localizacao" required>
                        </div>
                        <div class="col-md-6">
                            <label for="edit-destino" class="form-label fw-bold">Destino</label>
                            <input type="text" class="form-control" id="edit-destino" required>
                        </div>
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