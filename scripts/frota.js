document.querySelectorAll('.editar-trem').forEach(btn => {
    btn.addEventListener('click', () => {
        document.getElementById('modal-id').value = btn.dataset.id;
        document.getElementById('modal-modelo').value = btn.dataset.modelo;
        document.getElementById('modal-carga_id').value = btn.dataset.cargaId;
        document.getElementById('modal-usuario_id').value = btn.dataset.usuarioId;
        document.getElementById('modal-status_id').value = btn.dataset.statusId || 1;
    });
});

const pesquisa = document.getElementById('pesquisa');
const tabela = document.getElementById('tabelaTrens');
const filtroCarga = document.getElementById('filtroCarga');
const filtroUsuario = document.getElementById('filtroUsuario');

function filtrarTrens() {
    const texto = pesquisa.value.toLowerCase();
    const cargaSelecionada = filtroCarga.value;
    const usuarioSelecionado = filtroUsuario.value;

    const linhas = tabela.querySelectorAll('tr');

    linhas.forEach(linha => {
        const id = linha.children[0].textContent.toLowerCase().replace('#', '');
        const modelo = linha.querySelector('.modelo-tr')?.textContent.toLowerCase() || '';
        const cargaId = linha.dataset.cargaId || '';
        const usuarioId = linha.dataset.usuarioId || '';

        const atendeTexto = id.includes(texto) || modelo.includes(texto);
        const atendeCarga = !cargaSelecionada || cargaId === cargaSelecionada;
        const atendeUsuario = !usuarioSelecionado || usuarioId === usuarioSelecionado;

        if (atendeTexto && atendeCarga && atendeUsuario) {
            linha.style.display = '';
        } else {
            linha.style.display = 'none';
        }
    });
}

pesquisa.addEventListener('input', filtrarTrens);
filtroCarga.addEventListener('change', filtrarTrens);
filtroUsuario.addEventListener('change', filtrarTrens);