<?php


include('../modelo/mascota.php');

$mascota = new mascotas("", "", ""); 

$dastos = $mascota->listar();


echo json_encode($dastos);
?>