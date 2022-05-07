<?php

include_once 'Conexion.php';
include_once 'Session.php';

class SolicitudSaldoController {
    public static function getAll(){
        $con = Conexion::iniciar();
        $rol = $_SESSION["rol"];
        $usuario = $_SESSION["usuario"];
        $id = $_SESSION["id"];
        
        if($rol == 1){
            // $result = $con->query("SELECT * FROM solicitud_saldo");
            $result = $con->query("SELECT ss.*, u.nombre, u.apellido FROM solicitud_saldo ss INNER JOIN usuario u ON ss.usuario_id = u.id;");
        }
        else if ($rol == 2){
            // $result = $con->query("SELECT * FROM solicitud_saldo WHERE usuario_id = '$id'");
            $result = $con->query("SELECT ss.*, u.nombre, u.apellido FROM solicitud_saldo ss INNER JOIN usuario u ON ss.usuario_id = u.id WHERE usuario_id = '$id';");
        }
        return $result;
    }

    public static function create($cantidad){
        $con = Conexion::iniciar();
        $id = $_SESSION["id"];
        $result = $con->query("INSERT INTO solicitud_saldo (cantidad,usuario_id) VALUES ('$cantidad','$id')");
        return $result;
        
    }

    public static function changeState($id, $state){
        $con = Conexion::iniciar();
        $result = $con->query("UPDATE solicitud_saldo SET estado_id = '$state' WHERE id = '$id'");
        // echo state;
        if($state == 6){
            $result = $con->query("SELECT * FROM solicitud_saldo WHERE id = '$id'");
            $solicitud = $result->fetch_assoc();
            $usuario_id = $solicitud['usuario_id'];
            $cantidad = $solicitud['cantidad'];
            $result = $con->query("UPDATE usuario SET saldo = saldo + '$cantidad' WHERE id = '$usuario_id'");    
        }
        return $result;
    }
}