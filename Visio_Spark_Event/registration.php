<?php



include 'conn1.php';

$SEName='u';


$consultar=$connect->query("SELECT id FROM events WHERE display_name LIKE '".$SEName."'");

    $resultado=array();

    while($extraerDatos=$consultar->fetch_assoc()){
        $resultado[]=$extraerDatos;
    }

echo json_encode($resultado);






?>