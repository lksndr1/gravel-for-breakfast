document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.getElementById('header-dropdown-menu-toggle');
    const menuWrapper = document.querySelector('.header-dropdown-menu-wrapper');
    const closeButton = document.getElementById('close-dropdown-menu');
    const overlay = document.getElementById('menu-overlay');
    const navLinks = document.querySelectorAll('.dropdown-menu-nav a');


    function openMenu() {
        menuWrapper.classList.add('menu-visible');
        document.body.classList.add('body-scroll-lock');
        overlay.classList.add('overlay-visible');
    }

    function closeMenu() {
        menuWrapper.classList.remove('menu-visible');
        document.body.classList.remove('body-scroll-lock');
        overlay.classList.remove('overlay-visible');
    }

    toggleButton.addEventListener('click', openMenu);
    closeButton.addEventListener('click', closeMenu);
    overlay.addEventListener('click', closeMenu);

    navLinks.forEach(link => {
        link.addEventListener('click', function () {
            closeMenu();
        });
    });
});
