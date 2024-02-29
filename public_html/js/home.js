document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.button');
    buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            const category = button.getAttribute('id');
            const url = '/products?categories%5B%5D=' + category;
            window.location.href = url;
        });
    });
});