document.querySelectorAll('.editar-rota').forEach(btn => {
    btn.addEventListener('click', () => {
        document.getElementById('modal-id').value = btn.dataset.id;
        document.getElementById('modal-nome').value = btn.dataset.nome;
        document.getElementById('modal-distancia').value = btn.dataset.distancia;
        document.getElementById('modal-descricao').value = btn.dataset.descricao;
        document.getElementById('modal-trem_id').value = btn.dataset.tremId;
    });
});