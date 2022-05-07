<?php

include_once 'Conexion.php';
include_once 'Session.php';

class UsuarioController {
    public static function getAll(){
        $con = Conexion::iniciar();
        $rol = $_SESSION["rol"];
        $usuario = $_SESSION["usuario"];
        $id = $_SESSION["id"];
        $result = '';
        if($rol == 1)
            $result = $con->query("SELECT * FROM usuario");
        return $result;
    }

    public static function getUsuario(){
        $con = Conexion::iniciar();
        $id = $_SESSION["id"];
        $result = $con->query("SELECT * FROM usuario WHERE id = '$id'");
        return $result->fetch_assoc();
        
    }

}