<?php
class Session {

    public static function iniciar($id,$usuario,$rol){
        if (session_id() == '') {
            session_start();
        }
        $_SESSION["id"] = $id;
        $_SESSION["usuario"] = $usuario;
        $_SESSION["rol"] = $rol;
    }

    public static function hasSession(){
        if (session_id() == '') {
            session_start();
        }
        if(isset($_SESSION["usuario"]))
            return true;
        return false;
    }

    public static function cerrar(){
        if (session_id() == '') {
            session_start();
        }
        session_unset();
        session_destroy();
    }
}