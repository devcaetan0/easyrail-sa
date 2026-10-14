const caminhoAtual = window.location.pathname;

const links = document.querySelectorAll('.nav-link');

links.forEach(link => {
  const hrefDoLink = link.getAttribute('href');

  if (caminhoAtual === hrefDoLink) {
    link.classList.add('text-decoration-underline', 'fw-bold');
  } else {
    link.classList.add('text-decoration-none');
  }
});