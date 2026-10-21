const pesquisa = document.getElementById('pesquisa');
const tabela = document.getElementById('tabelaSensores');

pesquisa.addEventListener('input', function () {
    const texto = pesquisa.value.toLowerCase();
    const linhas = tabela.querySelectorAll('tr');

    linhas.forEach(linha => {
        const id = linha.children[0].textContent.toLowerCase();
        const nome = linha.children[1].textContent.toLowerCase();

        if (id.includes(texto) || nome.includes(texto)) {
            linha.style.display = '';
        } else {
            linha.style.display = 'none';
        }
    });
});