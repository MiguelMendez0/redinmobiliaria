<?php
require_once '../administrador/controllers/conn.php';

$db = new DbConn();
$pdo = $db->getPdo();

function GetPropiedades($pdo){

    $query = "SELECT * FROM propiedades INNER JOIN tipo ON propiedades.PropiedadTipo = tipo.TipoId INNER JOIN operacion ON propiedades.PropiedadOperacion = operacion.OperacionId INNER JOIN uso ON propiedades.PropiedadUso = uso.UsoId INNER JOIN antiguedad ON propiedades.PropiedadAntiguedad = antiguedad.AntiguedadId INNER JOIN asesores ON propiedades.PropiedadAsesor = asesores.AsesorId INNER JOIN status ON propiedades.PropiedadStatus = status.StatusId WHERE PropiedadPublicar = 1 ORDER BY propiedades.PropiedadId";
    $result = $pdo->prepare($query);
    $result->execute();
    $fetch = $result->fetchAll(PDO::FETCH_ASSOC); 

    return $fetch;

}

    $propiedades = GetPropiedades($pdo);

    function GetCaracteristicas($id, $pdo) {
        $query = "SELECT 
        p.PropiedadId,
        p.PropiedadTitulo,
        t.TipoNombre,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'M2 de Construccion' THEN pc.Valor ELSE NULL END) AS MetrosCuadrados,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Recámaras' THEN pc.Valor ELSE NULL END) AS Recamaras,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Baños' THEN pc.Valor ELSE NULL END) AS Baños,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Medio Baño' THEN pc.Valor ELSE NULL END) AS MedioBaño,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Estacionamiento' THEN pc.Valor ELSE NULL END) AS Estacionamiento,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Seguridad Privada' THEN pc.Valor ELSE NULL END) AS SeguridadPrivada,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Cocina Integral' THEN pc.Valor ELSE NULL END) AS CocinaIntegral,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Cuarto de Lavado' THEN pc.Valor ELSE NULL END) AS CuartoLavado,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Cuarto de Servicio' THEN pc.Valor ELSE NULL END) AS CuartoServicio,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Alberca Privada' THEN pc.Valor ELSE NULL END) AS AlbercaPrivada,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Sala de TV' THEN pc.Valor ELSE NULL END) AS SalaTV,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Área de Blancos' THEN pc.Valor ELSE NULL END) AS AreaBlancos,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'CCTV' THEN pc.Valor ELSE NULL END) AS CCTV,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Patio' THEN pc.Valor ELSE NULL END) AS Patio,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Cisterna' THEN pc.Valor ELSE NULL END) AS Cisterna,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Cocineta' THEN pc.Valor ELSE NULL END) AS Cocineta,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Calentador de Agua' THEN pc.Valor ELSE NULL END) AS CalentadorAgua,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Tinaco' THEN pc.Valor ELSE NULL END) AS Tinaco,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Jardín' THEN pc.Valor ELSE NULL END) AS Jardin,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Tanque de Gas Estacionario' THEN pc.Valor ELSE NULL END) AS TanqueEstacionario,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Portón' THEN pc.Valor ELSE NULL END) AS Porton,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Área Deportiva' THEN pc.Valor ELSE NULL END) AS AreaDeportiva,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Gimnasio Privado' THEN pc.Valor ELSE NULL END) AS GimnasioPrivado,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Gimnasio de uso común' THEN pc.Valor ELSE NULL END) AS GimnasioComun,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Parques / Áreas verdes' THEN pc.Valor ELSE NULL END) AS Parques,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Alberca de uso común' THEN pc.Valor ELSE NULL END) AS AlbercaComun,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Lavadora Secadora' THEN pc.Valor ELSE NULL END) AS LavadoraSecadora,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'INTERNET' THEN pc.Valor ELSE NULL END) AS Internet,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Vivero' THEN pc.Valor ELSE NULL END) AS Vivero,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Caverna' THEN pc.Valor ELSE NULL END) AS Caverna,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Jacuzzi' THEN pc.Valor ELSE NULL END) AS Jacuzzi,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'M2 de Terreno' THEN pc.Valor ELSE NULL END) AS M2Terreno,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Frente' THEN pc.Valor ELSE NULL END) AS Frente,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Fondo' THEN pc.Valor ELSE NULL END) AS Fondo,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Forma Regular' THEN pc.Valor ELSE NULL END) AS FormaRegular,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Forma Irregular' THEN pc.Valor ELSE NULL END) AS FormaIrregular,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Requiere Relleno' THEN pc.Valor ELSE NULL END) AS RequiereRelleno,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Energia Eléctrica' THEN pc.Valor ELSE NULL END) AS EnergiaElectrica,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Agua Potable' THEN pc.Valor ELSE NULL END) AS AguaPotable,
        MAX(CASE WHEN c.CaracteristicaDescripcion = 'Desván' THEN pc.Valor ELSE NULL END) AS Desvan
    FROM 
        propiedades p
    JOIN 
        tipo t ON p.PropiedadTipo = t.TipoId
    JOIN 
        propiedad_caracteristicas pc ON p.PropiedadId = pc.PropiedadId
    JOIN 
        caracteristicas c ON pc.CaracteristicaId = c.CaracteristicaId
    WHERE 
        p.PropiedadId = :id
    GROUP BY 
        p.PropiedadId, p.PropiedadTitulo, t.TipoNombre";
        $result = $pdo->prepare($query);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $fetch = $result->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($fetch as $data) {
            return $data;
        }
    }

function GetFoto($id, $pdo) {

    $queryFoto = "SELECT FotoArchivo FROM fotos WHERE FotoPropiedad = :id AND FotoPrincipal = 1 LIMIT 1";
    $resultFoto = $pdo->prepare($queryFoto);
    $resultFoto->bindParam(':id', $id, PDO::PARAM_INT);
    $resultFoto->execute();
    $foto = $resultFoto->fetch(PDO::FETCH_ASSOC);

    if ($foto) {
        return 'data:image/jpeg;base64,' . base64_encode($foto['FotoArchivo']);
    } else {
        return null;
    }

}

$data = [];

foreach ($propiedades as $propiedad) {

    $foto = GetFoto($propiedad['PropiedadId'], $pdo);
    $caracteristicas = GetCaracteristicas($propiedad['PropiedadId'], $pdo);

    $data[] = [
        'id' => $propiedad['PropiedadId'],
        'titulo' => $propiedad['PropiedadTitulo'],
        'precioVenta' => isset($propiedad['PropiedadVenta']) && $propiedad['PropiedadVenta'] !== null 
            ? "$" . $propiedad['PropiedadVenta'] . " MXN" 
            : (isset($propiedad['PropiedadRenta']) && $propiedad['PropiedadRenta'] !== null 
                ? "$" . $propiedad['PropiedadRenta'] . " MXN" 
                : "0 MXN"),
        'operacion' => $propiedad['OperacionNombre'],
        'habitaciones' => $caracteristicas['Recamaras'] ?? 0,
        'cocina' => $caracteristicas['CocinaIntegral'] ?? 0,
        'banos' => $caracteristicas['Baños'] ?? 0,
        'foto' => $foto
    ];
    
}

header('Content-Type: application/json');
echo json_encode($data);