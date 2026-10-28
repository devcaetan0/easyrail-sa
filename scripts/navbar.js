document.addEventListener('DOMContentLoaded', () => {
    const paginaAtual = window.location.pathname.split('/').filter(Boolean).pop();
    const navLinks = document.querySelectorAll('.nav-hover .nav-link');

    navLinks.forEach(link => {
        const href = link.getAttribute('href');
        if (href) {
            const paginaLink = href.split('/').filter(Boolean).pop();
            if (paginaLink === paginaAtual) {
                link.classList.add('active');
            }
        }

        link.addEventListener('click', function(e) {
            if (!this.classList.contains('active') && href) {
                e.preventDefault();
                this.style.setProperty('--trava-hover', '100%');
                setTimeout(() => {
                    window.location.href = href;
                }, 200);
            }
        });
    });
});