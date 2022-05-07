<?php
include_once 'header.php';
include_once 'LoginController.php';
include_once 'Session.php';
if (isset($_POST['btnLogin'])){
    $res = LoginController::login($_POST['usuario'], $_POST['clave']);
    if($res){
        Session::iniciar($res["id"], $res["nickname"], $res["rol_id"]);
        // echo Session::hasSession();
        header('Location: home.php');
    }else{
        echo '<p class="mb-3 alert alert-danger">Las credenciales son incorrectas, por favor vuelva a intentarlo!</p>';
    }
}
?>
<div class="row text-center d-flex justify-content-center">
    <div class="col-md-3">
    <form method="post" action="">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Usuario</label>
            <input type="text" class="form-control" name="usuario">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="clave">
        </div>
        <button type="submit" class="btn btn-primary" name="btnLogin">Entrar</button>
        </form>
    </div>
</div>

<?php include_once 'footer.php' ?>