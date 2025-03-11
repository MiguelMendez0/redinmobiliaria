const toggleBtn = document.querySelector('.toggle_btn');
const toggleBtnIcon = document.querySelector('.toggle_btn span'); // Seleccionamos el <span> con el icono
const dropDownMenu = document.querySelector('.dropdown_menu'); // Seleccionamos el menú desplegable

toggleBtn.onclick = function() {
    // Alternamos la visibilidad del menú
    dropDownMenu.classList.toggle('open');

    const isOpen = dropDownMenu.classList.contains('open');
}

