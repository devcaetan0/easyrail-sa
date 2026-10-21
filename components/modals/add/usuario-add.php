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