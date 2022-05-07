<?php 
include_once 'header.php';
include_once 'Session.php'; 
include_once 'SolicitudSaldoController.php'; 
if(!Session::hasSession()){
    header('Location: login.php');
}
$res = SolicitudSaldoController::getAll();
// print_r($res);
?>
<?php if($_SESSION["rol"] == 2) { ?>
<a class="btn btn-primary" href="/coolac/form.php">Crear Solicitud de Saldo</a>
<?php } ?>
<h1 class="my-3">Listado de Solicitudes de Saldo</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Solicitante</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Estado</th>
      <?php if($_SESSION["rol"] == 1) { ?>
      <th scope="col">Acción</th>
      <?php } ?>
    </tr>
  </thead>
  <tbody>
    <?php while($item = mysqli_fetch_assoc($res)) { ?>  
    <tr>
      <th scope="row"><?=$item["id"]?></th>
      <td><?php echo $item["nombre"] . " " . $item["apellido"]?></td>
      <td>$<?=$item["cantidad"]?></td>
      <td>
          <?php 
            if($item["estado_id"] == 3 ) echo '<h5><span class="badge bg-warning">Pendiente</span></h5>'; 
            if($item["estado_id"] == 5 ) echo '<h5><span class="badge bg-danger">Rechazado</span></h5>'; 
            if($item["estado_id"] == 6 ) echo '<h5><span class="badge bg-success">Aprobado</span></h5>'; 
          ?>
      </td>
      <?php if($_SESSION["rol"] == 1 && $item["estado_id"] == 3) { ?>
      <td><a class="btn btn-sm btn-success" href="change_state.php?id=<?=$item["id"]?>&state=6" onclick="return confirm('Está seguro que desea aprobar la Solicitud')">Aprobar</a>
      <a class="btn btn-sm btn-danger" href="change_state.php?id=<?=$item["id"]?>&state=5" onclick="return confirm('Está seguro que desea rechazar la Solicitud')">Rechazar</a>
      </td>
      <?php } ?>
    </tr>
    <?php } ?>
  </tbody>
</table>
<?php include_once 'footer.php' ?>