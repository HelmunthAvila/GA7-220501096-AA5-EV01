<?php

include("../conexion.php");

$usuario = $_GET['usuario'];
$password = $_GET['password'];

$sql = "SELECT * FROM usuarios 
        WHERE usuario='$usuario' 
        AND password='$password'";

$resultado = mysqli_query($conexion,$sql);

if(mysqli_num_rows($resultado) > 0){

    echo json_encode([
        "status"=>"success",
        "message"=>"Autenticación satisfactoria"
    ]);

}else{

    echo json_encode([
        "status"=>"error",
        "message"=>"Error en la autenticación"
    ]);

}
?>