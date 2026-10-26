<?php
$resultadoPerfis = $conexao->query("SELECT id, nome FROM perfil ORDER BY nome ASC");
?>

<div class="card  shadow-sm p-3">
    <div class="card-body">
        <form id="form-funcionarios" action="../source/create/usuario-create.php" method="POST" class="row g-3">

            <div class="mb-2">
                <label for="nome" class="form-label fw-bold">Nome Usuário</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-person"></i>
                    </span>
                    <input type="text" class="form-control " id="nome" name="nome" placeholder=" Digite o nome do usuário" required>
                </div>
            </div>

            <div class="mb-2">
                <label for="email" class="form-label fw-bold">Email Institucional</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input type="email" class="form-control " id="email" name="email" placeholder="exemplo@easyrail.com"
                        required>
                </div>
            </div>

            <div class="mb-2">
                <label for="senha" class="form-label fw-bold">Senha</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input type="password" class="form-control " id="senha" name="senha" placeholder="Digite a senha"
                        required>
                </div>
            </div>

            <div class="row g-2">
                <div class=" col-md-6 mb-2">
                    <label for="cep" class="form-label fw-bold">CEP</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-truck"></i>
                        </span>
                        <input type="text" class="form-control" id="cep" name="cep" maxlength="9" placeholder="00000-000"
                            required>
                    </div>
                </div>


                <div class="col-md-6 mb-2">
                    <label for="estado" class="form-label fw-bold">Estado (UF)</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-flag"></i>
                        </span>
                        <select class="form-select" name="estado" id="estado">
                            <option value="">Selecione o estado</option>

                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                </div>
            </div>

            <div class="row g-2">

                <div class="col-md-6 mb-2">
                    <label for="numero" class="form-label fw-bold">Bairro</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-building"></i>
                        </span>
                        <input type="text" class="form-control" id="bairro" name="bairro"
                            required>
                    </div>
                </div>


                <div class="col-md-6 mb-2">
                    <label for="cidade" class="form-label fw-bold">Cidade</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-geo-alt"></i>
                        </span>
                        <input type="text" class="form-control" id="cidade" name="cidade" 
                            required>
                    </div>
                </div>
            </div>

            <div class="mb-2">
                <label for="rua" class="form-label fw-bold">Rua</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-geo-alt"></i>
                    </span>
                    <input type="text" class="form-control" id="logradouro" name="rua" 
                        required>
                </div>
            </div>
</div>
            <small hidden id="mensagemCep" class="form-text"></small>

       <div class="mb-2">
                <label for="perfil_id" class="form-label fw-bold">Setor</label>
    <div class="input-group">
        <span class="input-group-text">
            <i class="bi bi-building"></i>
        </span>
       
                <select name="perfil_id" class="form-select" id="perfil_id" required>
                    <option value="">Selecione o Setor </option>
                    <?php while ($perfil = $resultadoPerfis->fetch_assoc()) { ?>
                        <option value="<?= $perfil['id'] ?>">
                            <?= $perfil['nome'] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>

            <div class="mb-2 mt-4">
                <button type="submit" class="btn btn-laranja w-100 py-2 fw-bold">Cadastrar</button>
            </div>
        </form>
        <div id="mensagem" class="text-center mt-3"></div>
        <div class="toggle text-center mt-2" id="toggle"></div>
    </div>
</div>

<script src="../scripts/api-CEP.js"></script>