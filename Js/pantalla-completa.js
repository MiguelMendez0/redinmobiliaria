// Obtener el modal
var modal = document.getElementById('imageModal');

// Obtener la imagen y el elemento de la descripción
var modalImg = document.getElementById("modalImage");
var captionText = document.getElementById("caption");

// Obtener todos los elementos de las imágenes en el carrusel
var images = document.querySelectorAll('.slider .list img');

// Iterar sobre las imágenes y agregar un event listener
images.forEach(image => {
    image.onclick = function() {
        modal.style.display = "block";
        modalImg.src = this.src; // Establecer la fuente de la imagen en el modal
        captionText.innerHTML = this.alt; // Establecer la descripción (si tiene)
    }
});

// Obtener el botón de cerrar el modal
var span = document.getElementById("closeModal");

// Cuando el usuario haga clic en el botón de cerrar, cerrar el modal
span.onclick = function() {
    modal.style.display = "none";
}

// También cerrar el modal si el usuario hace clic fuera de la imagen
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
