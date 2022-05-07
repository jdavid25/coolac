<?php 
include_once 'header.php';
include_once 'Session.php'; 
include_once 'UsuarioController.php'; 
if(!Session::hasSession()){
    header('Location: login.php');
}
$usuario = UsuarioController::getUsuario();
?>
<h1>Bienvenido</h1>
<?php if($_SESSION["rol"] == 1) { ?>
<h3><?php echo $usuario['nombre'] . " " . $usuario['apellido']?></h3>
<?php } ?>
<?php if($_SESSION["rol"] == 2) { ?>
<h3><?php echo $usuario['nombre'] . " " . $usuario['apellido']. " su saldo actal es de $". $usuario['saldo']?></h3>
<?php } ?>
<p><?php echo "Tipo de docuemtno: ".$usuario['tipo_documento']?></p>
<p><?php echo "Número de documento: ".$usuario['num_documento']?></p>
<p><?php echo "Correco electrónico: ".$usuario['email']?></p>
<p><?php echo "Teléfono: ".$usuario['telefono']?></p>
<?php include_once 'footer.php' ?>