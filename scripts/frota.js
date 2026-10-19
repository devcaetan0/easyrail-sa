document.querySelectorAll('.editar-trem').forEach(btn => {
    btn.addEventListener('click', () => {
        document.getElementById('modal-id').value = btn.dataset.id;
        document.getElementById('modal-modelo').value = btn.dataset.modelo;
        document.getElementById('modal-carga_id').value = btn.dataset.cargaId;
        document.getElementById('modal-usuario_id').value = btn.dataset.usuarioId;
    });
});

const pesquisa = document.getElementById('pesquisa');
const tabela = document.getElementById('tabelaTrens');
const filtroCarga = document.getElementById('filtroCarga');

function filtrarTrens() {
    const texto = pesquisa.value.toLowerCase();
    const cargaSelecionada = filtroCarga.value;

    const linhas = tabela.querySelectorAll('tr');

    linhas.forEach(linha => {
        const id = linha.children[0].textContent.toLowerCase();
        const modelo = linha.children[1].textContent.toLowerCase();
        const cargaId = linha.querySelector('.buttons').dataset.cargaId;

        if ((id.includes(texto) || modelo.includes(texto)) &&
            (!cargaSelecionada || cargaId === cargaSelecionada)) {
            linha.style.display = '';
        } else {
            linha.style.display = 'none';
        }
    });

        console.log("dsadasdas");
    console.log(modelo);
    console.log(texto);
}

pesquisa.addEventListener('input', filtrarTrens);
filtroCarga.addEventListener('change', filtrarTrens);