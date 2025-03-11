<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ICONO MENU GOOGLE FONTS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=menu" />
    <link href="../CSS/propiedades.css" rel="stylesheet">
 




    <title>Propiedades</title>
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
    
    <div class="contenedor-casas">
        <h1>Adquiere tu inmueble</h1>
        <div id="grid-container" class="grid-container"></div>
        <div id="pagination" class="pagination"></div>
    </div>

    <div class="menu-lateral">
        <ul class="menu-lista">
            <img src="../Recursos/Imagenes/Red inmobiliaria LOGO.png" alt="logo">
            <form id="form-propiedades">
                <li id="item-quiero">
                        <label for="opciones-quiero">Quiero</label>
                        <select name="quiero" id="opciones-quiero">
                            <option value="Selecciona">Selecciona</option>
                            <option value="1">Venta</option>
                            <option value=2>Renta</option>
                        </select>
                </li>
                <li id="item-busco">
                    <label for="opciones-busco">Busco</label>
                    <select name="busco" id="opciones-busco">
                        <option value="#">Selecciona</option>
                        <option value="casa">Casa</option>
                        <option value="departamento">Departamento</option>
                        <option value="terreno">Terreno</option>
                        <option value="local-comercial">Local Comercial</option>
                        <option value="bodega-comercial">Bodega Industrial</option>
                        <option value="rancho">Rancho</option>
                        <option value="quinta">Quinta</option>
                        <option value="villa">Villa</option>
                        <option value="casa-condominio">Casa en Condominio</option>
                        <option value="oficina">Oficina</option>
                    </select>
                </li>
                <li id="item-presupuesto">
                    <label for="presupuesto-range">Presupuesto</label>
                    <input type="range" name="presupuesto" id="presupuesto-range" min="5000" max="40000000" step="1000" value="5000">
                    <span id="presupuesto-valor">$5,000</span>
                </li>
                <li id="item-municipio">
                    <label for="opciones-municipio">Selecciona la Zona</label>
                    <select name="municipio" id="opciones-municipio">
                        <option value="" disabled select>Selecciona</option>
                        <option value="villahermosa">Villahermosa</option>
                        <option value="Centro, Villahermosa">Centro, Villahermosa</option>
                        <option value="Zona Country">Zona Country</option>
                        <option value="Industrial">Ciudad Industrial</option>
                        <option value="2000">Tabasco 2000</option>
                    </select>
                    <input type="submit" name="buscar" id="btn-buscar">
                </li>
            </form>
        </ul>
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
    <script src="../Js/tabla-casas.js"></script>
</body>
</html>