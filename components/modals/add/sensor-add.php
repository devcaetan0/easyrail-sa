<div class="modal fade" id="modalCadastroSensor" tabindex="-1" aria-labelledby="modalCadastroSensorLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-start">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="modalCadastroSensorLabel">Cadastrar Novo Sensor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-sensor">
                    <div class="mb-3">
                        <label for="id-sensor" class="form-label fw-bold">Nome</label>
                        <input type="text" class="form-control " id="edit-nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="setor-sensor" class="form-label fw-bold">Responsável</label>
                        <input type="text" class="form-control " id="edit-responsavel" required>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold form-label">Tipo</label>
                        <select class="form-select " id="edit-tipo">
                            <option>Temperatura</option>
                            <option>Velocidade</option>
                            <option>Energia</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nome-sensor" class="form-label fw-bold">Localização</label>
                        <input type="text" class="form-control " id="edit-localizacao" required>
                    </div>
                    <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-laranja" id="btn-salvar">Salvar Sensor</button>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
            </div>
        </div>
    </div>
</div>