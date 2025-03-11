document.addEventListener('DOMContentLoaded', function () {

    const casas = [];

    fetch('../CONTROLLERS/getPropiedades.php')
        .then(response => response.json())
        .then(data => {
            data.forEach(function(row) {
                const casa = {
                    id: row.id,
                    nombre: row.titulo,
                    precio: row.precioVenta,
                    operacion: row.operacion,
                    ubicacion: 'Villahermosa - Tabasco',
                    habitaciones: row.habitaciones,
                    cocinas: row.cocina,
                    banos: row.banos,
                    imagen: row.foto || '../Recursos/Imagenes/casa1.png'
                };
            
                casas.push(casa);
            });
    
            const perPage = 6;
            let currentPage = 1;

            function formatPrice(price) {
                // Eliminar el símbolo "$" y cualquier otra cosa que no sea un número o punto decimal
                const cleanedPrice = price.replace(/[^\d.-]/g, '');
                const priceNumber = parseFloat(cleanedPrice);
                
                if (isNaN(priceNumber)) {
                    return 'Precio no disponible';
                }
            
                // Formatear el precio como número sin el símbolo de la moneda
                const formattedPrice = new Intl.NumberFormat('es-MX').format(priceNumber);
                
                // Concatenar "MXN" al final del precio
                return `$${formattedPrice} MXN`;
            }
            
            
            function renderCards() {
                const gridContainer = document.getElementById("grid-container");
                gridContainer.innerHTML = "";
            
                const start = (currentPage - 1) * perPage;
                const end = start + perPage;
                const casasEnPagina = casas.slice(start, end);
            
                casasEnPagina.forEach(casa => {
                    const href = document.createElement("a");
                    href.setAttribute('href', `propiedad.php?id=${casa.id}`)
                    href.innerHTML = `
                    <div class="grid-item">
                        <div class="contenedor-img">
                            <img src="${casa.imagen}" alt="${casa.nombre}">
                        </div>
                        <div class="precio">
                            <h2>${casa.nombre}</h2>
                            <h2>${formatPrice(casa.precio)}</h2> <!-- Formateamos el precio aquí -->
                            <h2>${casa.operacion}</h2>
                            <h3>${casa.ubicacion}</h3>
                        </div>
                        <div class="iconos">
                            <div class="icono-item">
                                <img src="../Recursos/habitacion.png" alt="Habitación">
                                <p>Habitaciones</p>
                                <p class="cantidad">${casa.habitaciones}</p>
                            </div>
                            <div class="icono-item">
                                <img src="../Recursos/cocina.png" alt="Cocina">
                                <p>Cocinas</p>
                                <p class="cantidad">${casa.cocinas}</p>
                            </div>
                            <div class="icono-item">
                                <img src="../Recursos/baño.png" alt="Baño">
                                <p>Baños</p>
                                <p class="cantidad">${casa.banos}</p>
                            </div>
                        </div>
                    </div>
                    `;
                    gridContainer.appendChild(href);
                });
            }
            
            function renderPagination() {
                const pagination = document.getElementById("pagination");
                pagination.innerHTML = "";
            
                const totalPages = Math.ceil(casas.length / perPage);
            
                for (let i = 1; i <= totalPages; i++) {
                    const button = document.createElement("button");
                    button.textContent = i;
                    button.disabled = i === currentPage;
                    button.addEventListener("click", () => {
                        currentPage = i;
                        renderCards();
                        renderPagination();
                    });
                    pagination.appendChild(button);
                }
            }
            
            renderCards();
            renderPagination();            
        })
        .catch(error => console.error('Error:', error));

})

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById("form-propiedades");
    const gridContainer = document.getElementById("grid-container");

    form.addEventListener("submit", function(event) {
        event.preventDefault();

        const quiero = document.getElementById("opciones-quiero").value;
        const busco = document.getElementById("opciones-busco").value;
        const presupuesto = parseFloat(document.getElementById("presupuesto-range").value);
        const municipio = document.getElementById("opciones-municipio").value.trim().toLowerCase();

        const form_data = {
            quiero: quiero,
            busco: busco,
            presupuesto: presupuesto,
            municipio: municipio
        };

        console.log("Datos enviados al servidor:", form_data);

        fetch("../CONTROLLERS/formulario-end.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(form_data)
        })
        .then(response => response.json())
        .then(data => {
            console.log("Datos recibidos:", data);
            renderGrid(data, presupuesto, municipio, quiero, busco);
            
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });

    function renderGrid(casas, presupuesto, municipio, quiero, busco) {
        gridContainer.innerHTML = ""; // Limpiar el grid antes de añadir propiedades

        if (casas.length === 0) {
            gridContainer.innerHTML = "<p>No se encontraron propiedades con estos filtros.</p>";
            return;
        }

        const casasFiltradas = casas.filter(casa => {
            const precioVenta = parseFloat(casa.PropiedadVenta) || 0;
            const precioRenta = parseFloat(casa.PropiedadRenta) || 0;
            const municipioCasa = casa.ZonaNombre.trim().toLowerCase();
            const tipoPropiedad = casa.TipoNombre.trim().toLowerCase();

            const esVenta = (quiero === "1" && casa.OperacionNombre === "Venta");
            const esRenta = (quiero === "2" && casa.OperacionNombre === "Renta");

            const esTipoCorrecto = (busco === "" || tipoPropiedad.includes(busco.toLowerCase()));

            const cumplePresupuesto = (quiero === "1" && precioVenta <= presupuesto) || 
                                      (quiero === "2" && precioRenta <= presupuesto);

            return cumplePresupuesto && (quiero === "Selecciona" || esVenta || esRenta) && esTipoCorrecto &&
                   (municipio === "" || municipioCasa.includes(municipio.toLowerCase()));
        });

        if (casasFiltradas.length === 0) {
            gridContainer.innerHTML = "<p>No se encontraron propiedades con estos filtros.</p>";
            return;
        }

        casasFiltradas.forEach(casa => {
            const href = document.createElement("a");
            href.setAttribute('href', `propiedad.php?id=${casa.PropiedadId}`);
            href.innerHTML = `
                <div class="grid-item">
                    <div class="contenedor-img">
                        <img src="${casa.foto || '../Recursos/Imagenes/casa1.png'}" alt="${casa.PropiedadTitulo}">
                    </div>
                    <div class="precio">
                        <h2>${casa.PropiedadTitulo}</h2>
                        <h2>${formatPrice(casa.PropiedadVenta)}</h2>
                        <h3>Ubicación: ${casa.ZonaNombre}</h3>
                    </div>
                    <div class="iconos">
                        <div class="icono-item">
                            <img src="../Recursos/habitacion.png" alt="Habitación">
                            <p>Habitaciones</p>
                            <p class="cantidad">${casa.habitaciones || 'N/D'}</p> <!-- Valor por defecto si no hay datos -->
                        </div>
                        <div class="icono-item">
                            <img src="../Recursos/cocina.png" alt="Cocina">
                            <p>Cocinas</p>
                            <p class="cantidad">${casa.cocina || 'N/D'}</p> <!-- Valor por defecto si no hay datos -->
                        </div>
                        <div class="icono-item">
                            <img src="../Recursos/baño.png" alt="Baño">
                            <p>Baños</p>
                            <p class="cantidad">${casa.banos || 'N/D'}</p> <!-- Valor por defecto si no hay datos -->
                        </div>
                    </div>
                </div>
            `;
            gridContainer.appendChild(href);
        });
    }

    function formatPrice(price) {
        if (price === 0) return "Precio no disponible";
        return new Intl.NumberFormat('es-MX', { style: 'currency', currency: 'MXN' }).format(price);
    }
});

const scroll = document.getElementById("btn-buscar");

scroll.addEventListener("click", function(event){

})