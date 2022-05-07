<?php

include_once 'Conexion.php';

class LoginController{
    public static function login($usuario, $clave){
        $con = Conexion::iniciar();
        $result = $con->query("SELECT * FROM usuario WHERE nickname = '$usuario' AND clave = '$clave'");
        return $result->fetch_assoc();
    }   
}