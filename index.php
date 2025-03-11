<!DOCTYPE html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/index.css" rel="stylesheet">
    <!-- ANIMACION DE BIENVENIDA -->
    <link
    rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- ICONO MENU GOOGLE FONTS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=menu" />
    <title>Red Inmobiliaria</title>
</head>
<body>


    <!-- PRIMER SEGMENTO -->
    <div class="segmento1">
        <video class="video-background" autoplay muted loop>
            <source src="Recursos/index_background.mp4" type="video/mp4">
        </video>

        <header>
            <div class="navbar">
                <div class="logo">
                    <a href="#">Red Inmobiliaria</a>
                </div>
                <ul class="links">
                    <li><a href="index.php">INICIO</a></li>
                    <li><a href="HTML/propiedades.php">INMUEBLES</a></li>
                    <li><a href="#contacto-index">CONTACTO</a></li>
                    <li><a href="administrador/index.php">ACCESO</a></li>
                </ul>
                <div class="toggle_btn">
                    <span class="material-symbols-outlined">
                        menu
                        </span>
                </div>
            </div>
    
            <div class="dropdown_menu">
                <li><a href="index.php">INICIO</a></li>
                <li><a href="HTML/propiedades.php">PROPIEDADES</a></li>
                <li><a href="#contacto-index">CONTACTO</a></li>
                <li><a href="administrador/index.php">ACCESO</a></li>
            </div>
        </header>

            <div class="bienvenida">
                <h1 class="animate__animated animate__fadeInDown">Bienvenido <span id="rojo">RED</span><span id="blanco">Inmobiliaria</span></h1>
            </div>

            <div class="logo-index">
                <img class="animate__animated animate__fadeInDown" src="Recursos/Imagenes/Red inmobiliaria LOGO.png" alt="Logo Red">
            </div>
    </div>
        

    <div class="segmento3">
        <div class="negro">
            <p>En RedInmobiliaria, nuestros asesores de ventas son expertos comprometidos en ofrecer un servicio personalizado y de calidad, asegurando que cada cliente tome decisiones informadas y encuentre la mejor opción para sus necesidades.</p>
            <img src="Recursos/Red-inmobiliaria.png" alt="User1">
        </div>

        <div class="rojo">
            <img src="Recursos/Imagenes/render1.png" alt="Demostración">
            <p>Encuentra el inmueble ideal con <span>Red</span><span id="gris">Inmobiliaria</span></p>
            <p>Casas, departamentos, oficinas y más, todo con el respaldo y la confianza que mereces.</p>
            <p>¡Haz realidad tu próximo proyecto con nosotros!"</p>
        </div>
    </div>

    <div class="segmento4" id="contacto-index">
        <div class="contenedor-formulario">
            <h2><span>C</span>ontacto</h2>
                <p>Lo invitamos a dejarnos sus datos</p>
                <p>y nos pondremos en contacto con usted a la brevedad.</p>
                    <div class="tabla-grid">
                        <div class="icono">
                            <img src="Recursos/tel.png" alt="Icono 1">
                        </div>
                        <div class="info">
                            <a href="tel: 9935240420">+52 9935240420</a>
                        </div>
                        <div class="icono">
                            <img src="Recursos/correo.png" alt="Icono 2">
                        </div>
                        <div class="info">
                            <a href="hola@redinmb.com">hola@redinmb.com</a>
                        </div>
                        <div class="icono">
                            <img src="Recursos/whatsapp.png" alt="Icono 3">
                        </div>
                        <div class="info">
                            <a href="https://wa.me/9932594650?text=Hola%20estoy%20interesado%20en%20más%20información" target="_blank">9932594650</a>
                        </div>
                    </div>

                    <div class="formulario">
                        <h2><span>C</span>ontacto</h2>
                        <p>Por favor, complete el formulario y nos pondremos en contacto con usted a la brevedad.</p>
                        <form action="CONTROLLERS/formulario-index.php" method="POST">
                            <div class="form-group">
                                <label for="nombre">Nombre completo</label>
                                <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre completo" required>
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="tel" id="telefono" name="telefono" placeholder="Ingrese su teléfono" required>
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo electrónico</label>
                                <input type="email" id="correo" name="correo" placeholder="Ingrese su correo electrónico" required>
                            </div>
                            <div class="form-group">
                                <label for="mensaje">Mensaje</label>
                                <textarea id="mensaje" name="mensaje" rows="5" placeholder="Escriba su mensaje aquí..." required></textarea>
                            </div>
                            <button type="submit" class="btn-enviar">Enviar</button>
                        </form>
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
            <strong><span class="highlight-red">Red</span>Inmobiliaria</strong> | Todos los derechos reservados 2025.
        </p>
    </div>
</footer>

    
    <!-- Script de boton menu responsive barras -->
    <script src="Js/boton-index.js"></script>
    <!-- Script de range -->
    <script src="Js/range.js"></script>
    <!-- animacion miguel -->
    <script src="Js/miguelxD.js"></script>
</body>
</html>