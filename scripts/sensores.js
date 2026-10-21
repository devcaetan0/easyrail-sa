const pesquisa = document.getElementById('pesquisaSensor');
const tabela = document.getElementById('tabelaSensores');

if (pesquisa && tabela) {
    pesquisa.addEventListener('input', function () {
        const texto = pesquisa.value.trim().toLowerCase();
        const linhas = tabela.querySelectorAll('tr');

        linhas.forEach(linha => {
            const id = linha.children[0].textContent.trim().toLowerCase();
            const nome = linha.children[1].textContent.trim().toLowerCase();

            if (id.includes(texto) || nome.includes(texto)) {
                linha.style.display = '';
            } else {
                linha.style.display = 'none';
            }
        });
    });
}