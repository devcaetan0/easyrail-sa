<div class="card  shadow-sm p-3">
    <div class="card-body">
        <form id="form-funcionarios" action="../components/create/usuario-create.php" method="POST" class="row g-3">
            <h2 id="titulo" class="text-center fw-bold"></h2>

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

                <label for="setor" class="form-label fw-bold">Setor</label>

                <select name="perfil_id" class="form-control " id="setor" required>
                    <option value="1">Administrador</option>
                    <option value="2">Operador</option>
                    <option value="3">Analista</option>
                    <option value="4">Gestor</option>
                    <option value="5">Maquinista</option>
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