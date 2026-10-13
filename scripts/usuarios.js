document.querySelectorAll('.editar-usuario').forEach(btn => {
    btn.addEventListener('click', () => {
        document.getElementById('modal-id').value = btn.dataset.id;
        document.getElementById('modal-nome').value = btn.dataset.nome;
        document.getElementById('modal-email').value = btn.dataset.email;
        document.getElementById('modal-cargo').value = btn.dataset.perfil;
        document.getElementById('modal-senha').value = '';
    });
});

const pesquisa = document.getElementById('pesquisa');
const tabela = document.getElementById('tabelaUsuarios');
const filtroPerfil = document.getElementById('filtroPerfil');

function filtrarUsuarios() {
    const texto = pesquisa.value.toLowerCase();

    const linhas = tabela.querySelectorAll('tr');

    linhas.forEach(linha => {
        const id = linha.children[0].textContent.toLowerCase();
        const nome = linha.children[2].textContent.toLowerCase();
        const perfilSelecionado = filtroPerfil.value;

        if ((id.includes(texto) || nome.includes(texto)) &&
            (!perfilSelecionado || linha.dataset.perfilId === perfilSelecionado)) {
            linha.style.display = '';
        } else {
            linha.style.display = 'none';
        }
    });
}

pesquisa.addEventListener('input', filtrarUsuarios);
filtroPerfil.addEventListener('change', filtrarUsuarios);
