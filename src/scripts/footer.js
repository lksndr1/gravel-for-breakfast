document.addEventListener('DOMContentLoaded', function () {
    const toTopButton = document.getElementById('to_top_button');
    if (toTopButton) {
        toTopButton.addEventListener('click', function () {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
});