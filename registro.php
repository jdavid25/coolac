<?php 
include_once 'header.php';
include_once 'RegistroController.php';
if (isset($_POST['btnRegistrar'])){
    $res = RegistroController::registrar($_POST['tipo_documento'], $_POST['num_documento'], $_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['telefono'], $_POST['usuario'], $_POST['clave']);
    if($res){
        header('Location: login.php');
    }else{
        echo '<p class="mb-3 alert alert-danger">Ha ocurrido un error por favor vuelva a intentarlo!</p>';
        echo '<p class="mb-3 alert alert-danger">Asegurese de ingresar todos lo datos que se le solicitan</p>';
    }
}
?>
    <div class="d-flex justify-content-center">
    <form method="post" action="">
        <div class="row">
        <div class="m-2 col-md-3">
            <label for="exampleInputEmail1" class="form-label">Tipo de documento</label>
            <select name="tipo_documento" class="form-select" aria-label="Default select example">
                <option selected>Opciones</option>
                <option value="cedula ciudadania">Cedula Ciudadania</option>
                <option value="cedula extranjeria">Cedula Extranjeria</option>
                <option value="NIT">NIT</option>
            </select>
        </div>
        <div class="m-2 col-md-3">
            <label for="exampleInputPassword1" class="form-label"># Documento</label>
            <input name="num_documento" type="text" class="form-control">
        </div>
        <div class="m-2 col-md-3">
            <label for="exampleInputPassword1" class="form-label">Nombre</label>
            <input name="nombre" type="text" class="form-control">
        </div>
        <div class="m-2 col-md-3">
            <label for="exampleInputPassword1" class="form-label">Apellido</label>
            <input name="apellido" type="text" class="form-control">
        </div>
        <div class="m-2 col-md-3">
            <label for="exampleInputPassword1" class="form-label">Email</label>
            <input name="email" type="email" class="form-control">
        </div>
        <div class="m-2 col-md-3">
            <label for="exampleInputPassword1" class="form-label">Teléfono</label>
            <input name="telefono" type="text" class="form-control">
        </div>
        <div class="m-2 col-md-3">
            <label for="exampleInputPassword1" class="form-label">Usuario</label>
            <input name="usuario" type="text" class="form-control">
        </div>
        <div class="m-2 col-md-3">
            <label for="exampleInputPassword1" class="form-label">Contraseña</label>
            <input name="clave" type="password" class="form-control">
        </div>
        <div class="col-md-12 text-center my-3">
        <button type="submit" class="btn btn-xl btn-primary" name="btnRegistrar">Registrarse</button>
        </div>    
        </div>
        
        </form>
        </div>
<?php include_once 'footer.php' ?>