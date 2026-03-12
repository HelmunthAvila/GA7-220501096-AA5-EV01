<?php

class Usuario{

    private $conn;
    private $table = "usuarios";

    public $usuario;
    public $password;

    // Constructor
    public function __construct($db){
        $this->conn = $db;
    }

    // Registrar usuario
    public function registrar(){

        $query = "INSERT INTO ".$this->table."
                SET usuario = :usuario,
                    password = :password";

        $stmt = $this->conn->prepare($query);

        // Encriptar contraseña
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);

        $stmt->bindParam(":usuario",$this->usuario);
        $stmt->bindParam(":password",$this->password);

        if($stmt->execute()){
            return true;
        }

        return false;
    }

    // Login
    public function login(){

        $query = "SELECT * FROM ".$this->table."
                WHERE usuario = :usuario
                LIMIT 1";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":usuario",$this->usuario);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row){

            if(password_verify($this->password,$row['password'])){
                return true;
            }
        }

        return false;
    }

}
?>