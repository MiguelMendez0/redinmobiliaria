<?php
require_once '../administrador/controllers/conn.php';

$db = new DbConn();
$pdo = $db->getPdo();

$PropiedadId= isset($_GET['id']) ? $_GET['id'] : null;;

function GetFotos($id, $pdo) {
    $query = "SELECT * FROM fotos WHERE FotoPropiedad = :id";
    $result = $pdo->prepare($query);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();
    $fetch = $result->fetchAll(PDO::FETCH_ASSOC);

    $html = '';

    foreach ($fetch as $data) {
        $fotoBase64 = base64_encode($data['FotoArchivo']);
        $html .= '<div class="item">
                      <img src="data:image/jpeg;base64,' . $fotoBase64 . '" alt="">
                  </div>';
    }

    return $html;
}

$fotos = GetFotos($PropiedadId, $pdo);

function GetDots($id, $pdo) {
    $query = "SELECT * FROM fotos WHERE FotoPropiedad = :id";
    $result = $pdo->prepare($query);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();
    $fetch = $result->fetchAll(PDO::FETCH_ASSOC);

    $html = '';
    $first = true;

    foreach ($fetch as $data) {
        if ($first) {
            $html .= '<li class="active"></li>';
            $first = false;
        } else {
            $html .= '<li></li>';
        }
    }

    return $html;
}

$dots = GetDots($PropiedadId, $pdo);

function GetPropiedad($id, $pdo) {
    $query = "SELECT * FROM propiedades INNER JOIN tipo ON propiedades.PropiedadTipo = tipo.TipoId INNER JOIN operacion ON propiedades.PropiedadOperacion = operacion.OperacionId INNER JOIN uso ON propiedades.PropiedadUso = uso.UsoId INNER JOIN antiguedad ON propiedades.PropiedadAntiguedad = antiguedad.AntiguedadId INNER JOIN asesores ON propiedades.PropiedadAsesor = asesores.AsesorId INNER JOIN status ON propiedades.PropiedadStatus = status.StatusId WHERE PropiedadId = :id ORDER BY propiedades.PropiedadId";
    $result = $pdo->prepare($query);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();
    $fetch = $result->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($fetch as $data) {
        return $data;
    }
}

$propiedad = GetPropiedad($PropiedadId, $pdo);

function GetFoto($id, $pdo) {
    $query = "SELECT AsesorFoto FROM asesores WHERE AsesorId = :id";
    $result = $pdo->prepare($query);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();
    $fetch = $result->fetch(PDO::FETCH_ASSOC);


    return ($fetch && !empty($fetch['AsesorFoto']))
        ? 'data:image/jpeg;base64,' . base64_encode($fetch['AsesorFoto'])
        : '../recursos/avatar.png';
}

$AsesorId = $propiedad['AsesorId'];

$asesorFoto = GetFoto($AsesorId, $pdo);

function GetPropiedadCaracteristica($id, $pdo) {
    $query = 'SELECT * FROM propiedad_caracteristicas INNER JOIN caracteristicas ON propiedad_caracteristicas.CaracteristicaId = caracteristicas.CaracteristicaId WHERE PropiedadId = :id AND CaracteristicaTipo = "Caracteristica"';
    $result = $pdo->prepare($query);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();
    $fetch = $result->fetchAll(PDO::FETCH_ASSOC);

    $html = '';
    
    foreach ($fetch as $data) {
        if ($data['CaracteristicaUnidadMedida'] === "Metros") {
            $html .= '<li>' . htmlspecialchars($data['CaracteristicaDescripcion']) . ': ' . htmlspecialchars($data['Valor']) . 'm</li>';
        } else if ($data['CaracteristicaUnidadMedida'] === "Cantidad") {
            $html .= '<li>' . htmlspecialchars($data['CaracteristicaDescripcion']) . ': ' . htmlspecialchars($data['Valor']) . '</li>';
        } else if ($data['CaracteristicaMedible'] === 0 && $data['Valor'] === 1) {
            $html .= '<li>' . htmlspecialchars($data['CaracteristicaDescripcion']) . ': Si</li>';
        } else if ($data['CaracteristicaMedible'] === 0 && $data['Valor'] === 0) {
            $html .= '<li>' . htmlspecialchars($data['CaracteristicaDescripcion']) . ': No</li>';
        }
    }

    return $html;

}

$propiedadCaracteristica = GetPropiedadCaracteristica($PropiedadId, $pdo);

function GetPropiedadServicio($id, $pdo) {
    $query = 'SELECT * FROM propiedad_caracteristicas INNER JOIN caracteristicas ON propiedad_caracteristicas.CaracteristicaId = caracteristicas.CaracteristicaId WHERE PropiedadId = :id AND CaracteristicaTipo = "Servicio"';
    $result = $pdo->prepare($query);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();
    $fetch = $result->fetchAll(PDO::FETCH_ASSOC);

    $html = '';
    
    foreach ($fetch as $data) {
        if ($data['Valor'] === 1) {
            $html .= '<li>' . htmlspecialchars($data['CaracteristicaDescripcion']) . ': Si</li>';
        } else if ($data['Valor'] === 0) {
            $html .= '<li>' . htmlspecialchars($data['CaracteristicaDescripcion']) . ': No</li>';
        }
    }

    return $html;

}

$propiedadServicio = GetPropiedadServicio($PropiedadId, $pdo);