const ITENS_POR_PAGINA = 10;

function criarPaginacao(corpoTabela) {
    const nav = document.createElement('nav');
    nav.className = 'paginacao-tabela';
    nav.setAttribute('aria-label', 'Paginação da tabela');

    const resumo = document.createElement('span');
    const lista = document.createElement('ul');
    lista.className = 'pagination mb-0';

    nav.append(resumo, lista);
    corpoTabela.closest('.card').after(nav);

    let paginaAtual = 1;

    function irParaPagina(pagina) {
        paginaAtual = pagina;
        desenhar();
        lista.querySelector('.active .page-link').focus({ preventScroll: true });
    }

    function criarItem(texto, pagina, ativo, desabilitado) {
        const item = document.createElement('li');
        item.className = 'page-item';
        item.classList.toggle('active', ativo);
        item.classList.toggle('disabled', desabilitado);

        const botao = document.createElement('button');
        botao.type = 'button';
        botao.className = 'page-link';
        botao.textContent = texto;
        botao.disabled = desabilitado;
        botao.addEventListener('click', () => irParaPagina(pagina));

        item.append(botao);
        return item;
    }

    function criarReticencias() {
        const item = document.createElement('li');
        item.className = 'page-item disabled';

        const texto = document.createElement('span');
        texto.className = 'page-link';
        texto.textContent = '…';

        item.append(texto);
        return item;
    }

    function desenharBotoes(totalPaginas) {
        lista.replaceChildren(criarItem('Anterior', paginaAtual - 1, false, paginaAtual === 1));

        let ultimaPagina = 0;
        for (let pagina = 1; pagina <= totalPaginas; pagina++) {
            const exibir = pagina === 1 || pagina === totalPaginas || Math.abs(pagina - paginaAtual) <= 1;
            if (!exibir) {
                continue;
            }
            if (pagina - ultimaPagina > 1) {
                lista.append(criarReticencias());
            }
            lista.append(criarItem(String(pagina), pagina, pagina === paginaAtual, false));
            ultimaPagina = pagina;
        }

        lista.append(criarItem('Próxima', paginaAtual + 1, false, paginaAtual === totalPaginas));
    }

    function desenhar() {
        const linhas = [...corpoTabela.querySelectorAll('tr')];
        const linhasFiltradas = linhas.filter(linha => !linha.classList.contains('linha-oculta'));
        const totalPaginas = Math.max(1, Math.ceil(linhasFiltradas.length / ITENS_POR_PAGINA));
        const inicio = (paginaAtual - 1) * ITENS_POR_PAGINA;
        const fim = Math.min(inicio + ITENS_POR_PAGINA, linhasFiltradas.length);

        linhas.forEach(linha => linha.classList.remove('linha-fora-pagina'));
        linhasFiltradas.forEach((linha, indice) => {
            linha.classList.toggle('linha-fora-pagina', indice < inicio || indice >= fim);
        });

        resumo.textContent = `Mostrando ${inicio + 1}–${fim} de ${linhasFiltradas.length}`;
        nav.hidden = totalPaginas === 1;
        desenharBotoes(totalPaginas);
    }

    function atualizar() {
        paginaAtual = 1;
        desenhar();
    }

    desenhar();

    return { atualizar };
}
