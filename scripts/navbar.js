const caminhoAtual = window.location.pathname;

document.querySelectorAll('.nav-link').forEach(link => {
  if (link.pathname === caminhoAtual) {
    link.classList.add('text-decoration-underline', 'fw-bold' );
  } else {
    link.classList.add('text-decoration-none');
  }
});