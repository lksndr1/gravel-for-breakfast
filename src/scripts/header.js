document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.getElementById('header-dropdown-menu-toggle');
    const menuWrapper = document.querySelector('.header-dropdown-menu-wrapper');
    const closeButton = document.getElementById('close-dropdown-menu');

    toggleButton.addEventListener('click', function () {
        menuWrapper.classList.toggle('menu-visible');
    });

    closeButton.addEventListener('click', function () {
        menuWrapper.classList.remove('menu-visible');
    });
});
