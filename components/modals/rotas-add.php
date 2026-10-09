<?php


$sql = "SELECT id, nome FROM usuario ORDER BY nome ASC";
$resultado = mysqli_query($conexao, $sql);

?>


<div class="modal fade" id="modalCadastroTrem" tabindex="-1" aria-labelledby="modalCadastroTremLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-start">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="modalCadastroTremLabel">Cadastrar Rota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-sensor">
                    <div class="mb-3">
                        <label for="edit-nome" class="form-label fw-bold">Trem</label>
                        <select class="form-select" id="edit-tipo">
                            <option>Locomotiva GE AC44i - Alpha</option>
                            <option>Locomotiva GE AC44i - Beta</option>
                            <option>Locomotiva EMD SD70MAC - Gama</option>
                            <option>Locomotiva EMD SD70MAC - Delta</option>
                            <option>Locomotiva GE ES43BBi - Eco</option>
                            <option>Locomotiva GE ES43BBi - Fox</option>
                            <option>Vagão Motorizado Leve - VML-01</option>
                            <option>Vagão Motorizado Leve - VML-02</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit-tipo" class="fw-bold form-label">Codigo de Trecho</label>
                        <select class="form-select" id="edit-tipo">
                            <option>TR-NORTE-001</option>
                            <option>TR-NORTE-002</option>
                            <option>TR-NORTE-003</option>
                            <option>TR-NORTE-004</option>
                            <option>TR-NORTE-005</option>
                            <option>PÁTIO-CENTRAL</option>
                            <option>TR-SUL-001</option>
                            <option>TR-SUL-002</option>
                            <option>TR-SUL-003</option>
                            <option>TR-SUL-004</option>
                            <option>TR-SUL-005</option>
                            <option>TR-LESTE-001</option>
                            <option>TR-LESTE-002</option>
                            <option>TR-OESTE-001</option>
                            <option>TR-OESTE-002</option>
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