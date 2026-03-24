

document.getElementById('menu-toggle').addEventListener('click',function(){
    let slidebar =document.getElementById('slidebar')
    slidebar.classList.toggle('hidden')
})

document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll('.element-slidebar-btn');

    // Recuperar el estado guardado en sessionStorage
    const activeIndex = sessionStorage.getItem('activeSlidebarIndex');

    if (activeIndex !== null) {
        buttons[activeIndex].classList.add('active');
        buttons[activeIndex].parentElement.classList.add('active');
    }

    buttons.forEach((btn, index) => {
        btn.addEventListener('click', function () {
            // Remueve la clase 'active' de todos los botones
            buttons.forEach(el => {
                el.classList.remove('active');
                el.parentElement.classList.remove('active');
            });

            // Agrega 'active' solo al botón clickeado
            this.classList.add('active');
            this.parentElement.classList.add('active');

            // Guardar el índice del botón seleccionado en sessionStorage
            sessionStorage.setItem('activeSlidebarIndex', index);
        });
    });
});
