document.querySelectorAll('.editar-usuario').forEach(btn => {
    btn.addEventListener('click', () => {
        document.getElementById('modal-id').value = btn.dataset.id;
        document.getElementById('modal-nome').value = btn.dataset.nome;
        document.getElementById('modal-email').value = btn.dataset.email;
        document.getElementById('modal-setor').value = btn.dataset.perfil;
        document.getElementById('modal-senha').value = '';
    });
});


const pesquisa = document.getElementById('pesquisa');
const tabela = document.getElementById('tabelaUsuarios');

pesquisa.addEventListener('input', function () {
    const texto = pesquisa.value.toLowerCase();

    const linhas = tabela.querySelectorAll('tr');

    linhas.forEach(linha => {

        const id = linha.children[0].textContent.toLowerCase();
        const nome = linha.children[2].textContent.toLowerCase();

        if (id.includes(texto) || nome.includes(texto)) {
            linha.style.display = '';
        } else {
            linha.style.display = 'none';
        }
    });
});