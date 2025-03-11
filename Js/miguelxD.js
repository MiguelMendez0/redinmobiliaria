// Seleccionamos el elemento que queremos animar
const rojo = document.querySelector('.rojo');

// Configuramos el IntersectionObserver
const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            // Cuando el elemento es visible, activamos la animación
            entry.target.classList.add('slide-in');
            entry.target.classList.remove('slide-out'); // Asegura que no tenga la animación de salida
        } else {
            // Cuando el elemento sale de la vista, activamos la animación de salida
            entry.target.classList.add('slide-out');
            entry.target.classList.remove('slide-in'); // Asegura que no tenga la animación de entrada
        }
    });
}, {
    threshold: 0.5 // Se activa cuando el 50% del segmento está en la vista
});

// Comenzamos a observar el contenedor del segmento
const segmento3 = document.querySelector('.segmento3');
observer.observe(segmento3);

