<?php
require '../CONTROLLERS/getPropiedad.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ICONO MENU GOOGLE FONTS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=menu" />
    <link href="../CSS/propiedades.css" rel="stylesheet">
    <link href="../CSS/propiedad.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Propiedad</title>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">
           
            </div>
            <ul class="links">
                <li id="nav-style"><a href="../index.php">INICIO</a></li>
                <li id="nav-style"><a href="../HTML/propiedades.php">INMUEBLES</a></li>
                <li id="nav-style"><a href="../index.php#contacto">CONTACTO</a></li>
                <li id="nav-style"><a href="../administrador/index.php">ACCESO</a></li>
            </ul>
            <div class="toggle_btn">
                <span class="material-symbols-outlined">menu</span>
            </div>
            
        </div>

        <div class="dropdown_menu">
            <li><a href="../index.php">INICIO</a></li>
            <li><a href="../HTML/propiedades.php">PROPIEDADES</a></li>
            <li><a href="../index.php#contacto">CONTACTO</a></li>
            <li><a href="../administrador/index.php">ACCESO</a></li>
        </div>
    </header>

   <!-- Modal para mostrar imagen a pantalla completa -->
<div id="imageModal" class="modal">
    <span class="close" id="closeModal">&times;</span>
    <img id="modalImage" class="modal-content">
    <div id="caption"></div>
</div>

<div class="slider">
    <div class="list">
        <?php echo $fotos ?>
    </div>
    <div class="buttons">
        <button id="prev"><</button>
        <button id="next">></button>
    </div>
    <ul class="dots">
        <?php echo $dots ?>
    </ul>
</div>

    <div class="contenedor-descripcion">
        <div class="descripcion">
            <h2>Descripcion</h2>
            <p id="descripcion-casa"><?php echo $propiedad['PropiedadDescripcion'] ?></p>
        </div>
    </div>

    <div class="info-casa">
        <div class="caracteristicas-casa">
            <h2>Caracteristicas</h2>
            <ul>
                <?php echo $propiedadCaracteristica; ?>
            </ul>
        </div>
    
        <div class="servicios-casa">
            <h2>Servicios</h2>
            <ul>
                <?php echo $propiedadServicio; ?>
            </ul>
        </div>
    </div>

    <div class="asesor-container">
        <h2>Asesor</h2>
        <img src="<?php echo $asesorFoto ?>" alt="avatar">
        <p class="asesor-nombre"><?php echo ($propiedad['AsesorNombre'] . " " . $propiedad['AsesorApellidoPaterno'] . " " . $propiedad['AsesorApellidoMaterno'])  ?></p>
        <a href="https://wa.me/<?php echo $propiedad['AsesorCelular'] ?>" target="_blank" class="asesor-contacto">
            <span>WhatsApp: +52 <?php echo $propiedad['AsesorCelular'] ?></span>
        </a>
    </div>
    
    <div class="contenedor-formulario">
    <div class="formulario-propiedad">
        <h2>Contactar</h2>
        <form action="../CONTROLLERS/formulario-propiedad.php" method="POST">
            <!-- Campo de Nombre Completo -->
            <label for="nombre">Nombre Completo:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre completo" required>

            <!-- Campo de Teléfono -->
            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" placeholder="Escribe tu número de teléfono" required>

            <!-- Campo de Correo -->
            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" placeholder="Escribe tu correo electrónico" required>

            <!-- Cuadro de Texto Prellenado -->
            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" rows="5">Hola, me interesa este inmueble y quiero que me contacten, gracias.</textarea>

            <!-- Botón de Enviar -->
            <button type="submit">Enviar</button>       
        </form>
    </div>
</div>


                <div class="contact-icons">
                    <a href="https://wa.me/9931562417" target="_blank" title="WhatsApp">
                        <img src="../Recursos/whatsapp.png" alt="whatsapp" >
                    </a>
                    <a href="tel:+1234567890" title="Teléfono">
                        <span class="material-icons">phone</span>
                    </a>
                    <a href="mailto:correo@ejemplo.com" title="Correo">
                        <span class="material-icons">email</span>
                    </a>
                </div>
            </div>
        </div>

    

    <footer class="footer">
        <div class="footer-content">
            <p>
                Todas las medidas enunciadas son meramente orientativas, las medidas exactas serán las que se expresen en el respectivo título de propiedad de cada inmueble. 
                Todas las fotos, imágenes y videos son meramente ilustrativos y no contractuales. Los precios enunciados son meramente orientativos y no contractuales.
            </p>
            <p>
                <strong><span class="highlight-red">Red</span>Inmobiliaria</strong> | Todos los derechos reservados 2024.
            </p>
        </div>
    </footer>

    <!-- Boton Desplegable -->
    <script src="../Js/boton-index.js"></script>
    <script src="../Js/range-propiedades.js"></script>
    <script src="../Js/carrusel-propiedad.js"></script>
    <script src="../Js/pantalla-completa.js"></script>
</body>
</html>