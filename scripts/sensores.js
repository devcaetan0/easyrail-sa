document.querySelectorAll('.editar-sensor').forEach(button => {
    button.addEventListener('click', () => {
        document.getElementById('modal-sensor-id').value = button.dataset.id;
        document.getElementById('modal-nome').value = button.dataset.nome || '';
        document.getElementById('modal-tipo').value = button.dataset.tipo || '';
        document.getElementById('modal-status_id').value = button.dataset.statusId || '1';
        document.getElementById('modal-trem_id').value = button.dataset.tremId || '';
        document.getElementById('modal-rota_id').value = button.dataset.rotaId || '';
    });
});



const pesquisa = document.getElementById('pesquisaSensor');
const tabela = document.getElementById('tabelaSensores');
const filtroTipo = document.getElementById('filtroTipo');
const filtroRota = document.getElementById('filtroRota');
const filtroTrem = document.getElementById('filtroTrem');
const filtroStatus = document.getElementById('filtroStatus');

function normalizarTexto(texto) {
    return texto.normalize('NFD').replace(/[̀-ͯ]/g, '').toLowerCase().trim();
}

if (pesquisa && tabela) {
    const paginacao = criarPaginacao(tabela);

    function filtrarSensores() {
        const texto = normalizarTexto(pesquisa.value);
        const tipoSelecionado = normalizarTexto(filtroTipo?.value || '');
        const rotaSelecionada = normalizarTexto(filtroRota?.value || '');
        const tremSelecionado = normalizarTexto(filtroTrem?.value || '');
        const statusSelecionado = normalizarTexto(filtroStatus?.value || '');
        const linhas = tabela.querySelectorAll('tr');

        linhas.forEach(linha => {
            const id = normalizarTexto(linha.children[0]?.textContent || '');
            const nome = normalizarTexto(linha.querySelector('.nome-tr')?.textContent || '');
            const tipo = normalizarTexto(linha.dataset.tipo || '');
            const rota = normalizarTexto(linha.dataset.rota || '');
            const trem = normalizarTexto(linha.dataset.trem || '');
            const status = normalizarTexto(linha.dataset.status || '');

            const atendeTexto = !texto || id.includes(texto) || nome.includes(texto);
            const atendeTipo = !tipoSelecionado || tipo === tipoSelecionado;
            const atendeRota = !rotaSelecionada || rota === rotaSelecionada;
            const atendeTrem = !tremSelecionado || trem === tremSelecionado;
            const atendeStatus = !statusSelecionado || status === statusSelecionado;

            const atendeFiltros = atendeTexto && atendeTipo && atendeRota && atendeTrem && atendeStatus;
            linha.classList.toggle('linha-oculta', !atendeFiltros);
        });

        paginacao.atualizar();
    }

    pesquisa.addEventListener('input', filtrarSensores);
    [filtroTipo, filtroRota, filtroTrem, filtroStatus].forEach(filtro => {
        if (filtro) {
            filtro.addEventListener('change', filtrarSensores);
        }
    });
}