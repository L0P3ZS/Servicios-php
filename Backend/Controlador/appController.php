<?php

include ('../modelo/mascota.php');


$mascota = new mascotas("", "", ""); 

// if (isset($_POST['nombre']) && isset($_POST['raza'])) {
//     $mascota->guardar();
// }


if (isset($_POST['id'])) {
    $mascota->eliminar();
}


$data = file_get_contents('php://input');

if ($data) {
    $datos = json_decode($data, true); 

    if ($datos && isset($datos['nombre']) && isset($datos['raza']) && isset($datos['id'])) {
        $mascota->actualizar($datos); 
    }
}

if ($data) {
    $datos = json_decode($data, true); 

    if ($datos && isset($datos['nombre']) && isset($datos['raza'])) {
        $mascota->guardar($datos); 
    }
}

?>