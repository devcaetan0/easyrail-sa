document.querySelectorAll('.editar-rota').forEach(btn => {
    btn.addEventListener('click', () => {
        document.getElementById('modal-id').value = btn.dataset.id;
        document.getElementById('modal-nome').value = btn.dataset.nome;
        document.getElementById('modal-distancia').value = btn.dataset.distancia;
        document.getElementById('modal-descricao').value = btn.dataset.descricao;
        document.getElementById('modal-trem_id').value = btn.dataset.tremId;
    });
});

document.querySelectorAll('.editar-trem').forEach(btn => {
    btn.addEventListener('click', () => {
        document.getElementById('modal-id').value = btn.dataset.id;
        document.getElementById('modal-modelo').value = btn.dataset.modelo;
        document.getElementById('modal-carga_id').value = btn.dataset.cargaId;
        document.getElementById('modal-usuario_id').value = btn.dataset.usuarioId;
    });
});

const pesquisa = document.getElementById('pesquisa');
const tabela = document.getElementById('tabelaRotas');
const filtroTrem = document.getElementById('filtroTrem');

function filtrarRotas() {
    const texto = pesquisa.value.toLowerCase();
    const tremSelecionado = filtroTrem.value;

    const linhas = tabela.querySelectorAll('tr');

    linhas.forEach(linha => {
        const id = linha.children[0].textContent.toLowerCase();
        const nome = linha.children[1].textContent.toLowerCase();
        const tremId = linha.dataset.tremId;

        if ((id.includes(texto) || nome.includes(texto)) &&
            (!tremSelecionado || tremId === tremSelecionado)) {
            linha.style.display = '';
        } else {
            linha.style.display = 'none';
        }
    });
}

pesquisa.addEventListener('input', filtrarRotas);
filtroTrem.addEventListener('change', filtrarRotas);