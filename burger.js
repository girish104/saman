
document.addEventListener('DOMContentLoaded', function () {
    var burgerIcon = document.getElementById('burger-icon');
    console.log(burgerIcon)
    var menuDropdown = document.getElementById('menu-dropdown');

    burgerIcon.addEventListener('click', function () {
        menuDropdown.classList.toggle('active');
    });
});

