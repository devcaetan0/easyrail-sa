<?php
$resultadoPerfis = $conexao->query("SELECT id, nome FROM perfil ORDER BY nome ASC");
?>

<div class="card  shadow-sm p-3">
    <div class="card-body">
        <form id="form-funcionarios" action="../source/create/usuario-create.php" method="POST" class="row g-3">

            <div class="mb-2">
                <label for="nome" class="form-label fw-bold">Nome Usuário</label>
                <input type="text" class="form-control " id="nome" name="nome" required>
            </div>

            <div class="mb-2">
                <label for="email" class="form-label fw-bold">Email Institucional</label>
                <input type="email" class="form-control " id="email" name="email" required>
            </div>

            <div class="mb-2">
                <label for="senha" class="form-label fw-bold">Senha</label>
                <input type="password" class="form-control " id="senha" name="senha" required>
            </div>

            <div class="row">
                <div class=" col-md-6 mb-2">
                    <label for="cep" class="form-label fw-bold">CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep" maxlength="9" placeholder="00000-000" required>
                    
                </div>
              

        <div class="col-md-6 mb-2">
                <label for="estado" class="form-label fw-bold">Estado (UF)</label>
                 <select  class="form-select" name="estado" id="estado">
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

            <div class="row">

            <div class="col-md-6 mb-2">
                <label for="numero" class="form-label fw-bold">Bairro</label>
                <input type="text" class="form-control" id="bairro" name="bairro">
            </div>


            <div class="col-md-6 mb-2">
                <label for="cidade" class="form-label fw-bold">Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade">

            </div>
        </div>
            
             <div class="mb-2">
                <label for="logradouro" class="form-label fw-bold">Logradouro</label>
                <input type="text" class="form-control" id="logradouro" name="logradouro">
            </div>

             <small id="mensagemCep" class="form-text"></small>

        
            <div class="mb-2">
                <label for="perfil_id" class="form-label fw-bold">Setor</label>

                <select name="perfil_id" class="form-control" id="perfil_id" required>
                    <?php while ($perfil = $resultadoPerfis->fetch_assoc()) { ?>
                        <option value="<?= $perfil['id'] ?>">
                            <?= $perfil['nome'] ?>
                        </option>
                    <?php } ?>
                </select>
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