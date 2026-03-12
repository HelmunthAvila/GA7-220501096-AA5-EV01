<?php
// Servicio de registro de usuario

// Verificar si llegan los datos
if(isset($_GET['usuario']) && isset($_GET['password'])){

    $usuario = $_GET['usuario'];
    $password = $_GET['password'];

    // Usuario de prueba
    $usuario_db = "helmunth";
    $password_db = "123456";

    // Validar autenticación
    if($usuario == $usuario_db && $password == $password_db){

        echo json_encode([
            "status" => "success",
            "message" => "Autenticación satisfactoria"
        ]);

    }else{

        echo json_encode([
            "status" => "error",
            "message" => "Error en la autenticación"
        ]);

    }

}else{

    echo json_encode([
        "status" => "error",
        "message" => "Datos incompletos"
    ]);

}
?>