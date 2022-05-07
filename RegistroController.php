<?php

include_once 'Conexion.php';

class RegistroController {

    public static function registrar($tipo_documento, $num_documento, $nombre, $apellido, $email, $telefono, $usuario, $clave){
        $con = Conexion::iniciar();
        $result = $con->query("INSERT INTO usuario (tipo_documento, num_documento, nombre, apellido, email, telefono, nickname, clave) VALUES ('$tipo_documento', '$num_documento', '$nombre', '$apellido', '$email', '$telefono', '$usuario', '$clave')");
        return $result;
    }
}