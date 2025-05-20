document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.getElementById('header-dropdown-menu-toggle');
    const menuWrapper = document.querySelector('.header-dropdown-menu-wrapper');

    toggleButton.addEventListener('click', function () {
        menuWrapper.classList.toggle('menu-visible');
    });
});
