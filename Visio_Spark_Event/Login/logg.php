<?php

require_once 'conn1.php';
$email =$_POST['email'];
$Password=$_POST['pass'];
$consultar=$connect->query("SELECT * FROM users WHERE email LIKE '".$email."' AND password LIKE '".$Password."' ");

$resultado=array();

while($extraerDatos=$consultar->fetch_assoc()){
    $resultado[]=$extraerDatos;
}

echo json_encode($resultado);

?>