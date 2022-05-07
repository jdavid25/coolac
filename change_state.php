<?php

include_once 'SolicitudSaldoController.php';

SolicitudSaldoController::changeState($_GET['id'],$_GET['state']);
header('Location: http://localhost/coolac/listado.php');
