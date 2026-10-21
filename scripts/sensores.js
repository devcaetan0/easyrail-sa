const pesquisa = document.getElementById('pesquisa');
const tabela = document.getElementById('tabelaSensores');

if (pesquisa && tabela) {
    pesquisa.addEventListener('input', function () {
        const texto = pesquisa.value.trim().toLocaleLowerCase();
        const linhas = tabela.querySelectorAll('tr');

        linhas.forEach(linha => {
            const id = linha.children[0].textContent.trim().toLocaleLowerCase();
            const nome = linha.querySelector('.nome-tr').textContent.trim().toLocaleLowerCase();

            if (id.includes(texto) || nome.includes(texto)) {
                linha.style.display = '';
            } else {
                linha.style.display = 'none';
            }
        });
    });
}