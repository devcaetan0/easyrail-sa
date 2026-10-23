const pesquisa = document.getElementById('pesquisaSensor');
const tabela = document.getElementById('tabelaSensores');
const filtroTipo = document.getElementById('filtroTipo');
const filtroRota = document.getElementById('filtroRota');
const filtroTrem = document.getElementById('filtroTrem');
const filtroStatus = document.getElementById('filtroStatus');

function normalizarTexto(valor) {
    return String(valor || '')
        .toLowerCase()
        .normalize('NFD')
        .replace(/[\u0300-\u036f]/g, '')
        .trim();
}

if (pesquisa && tabela) {
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

            linha.style.display = (atendeTexto && atendeTipo && atendeRota && atendeTrem && atendeStatus) ? '' : 'none';
        });
    }

    pesquisa.addEventListener('input', filtrarSensores);
    [filtroTipo, filtroRota, filtroTrem, filtroStatus].forEach(filtro => {
        if (filtro) {
            filtro.addEventListener('change', filtrarSensores);
        }
    });
}