<?php
$mensagem = $_SESSION['mensagem'] ?? '';
$tipoMensagem = $_SESSION['tipo_mensagem'] ?? 'success';
unset($_SESSION['mensagem'], $_SESSION['tipo_mensagem']);
?>

<?php if (!empty($mensagem)) { ?>
    <div class="alert alert-<?= $tipoMensagem ?> alert-dismissible fade show mt-3">
        <?= $mensagem ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
    </div>
<?php } ?>