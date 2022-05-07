<?php
include_once 'header.php';
include_once 'SolicitudSaldoController.php';
include_once 'Session.php';
if(!Session::hasSession()){
    header('Location: login.php');
}else {
    if (isset($_POST['btnCrearSolicitudSaldo'])){
        $res = SolicitudSaldoController::create($_POST['cantidad']);
        if($res){
            header('Location: listado.php');
        }else{
            echo '<p class="mb-3 alert alert-danger">Ha ocurrido un error por favor vuelva a intentarlo!</p>';
        }
    }
}
?>
<div class="row text-center d-flex justify-content-center">
    <div class="col-md-4">
    <h1>Solicitud de Saldo</h1>
    <form method="post" action="">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Cantidad a solicitar</label>
            <input type="text" class="form-control" name="cantidad">
        </div>
        <button type="submit" class="btn btn-primary" name="btnCrearSolicitudSaldo">Enviar</button>
        </form>
    </div>
</div>

<?php include_once 'footer.php' ?>