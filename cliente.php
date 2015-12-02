<?php 
include_once 'lib/nusoap.php';


$fecha = $_GET['fecha'];
$componente = $_GET['componente'];
$servicio = $_GET['componente'];

$cliente = new nusoap_client("http://localhost/ws/".$servicio.".php",false);

function randomAlpha() {
   srand(time());
   $rnd = rand(0,100);
   return $rnd/100;
}

$probabilidad = randomAlpha();

$parametros = array('fecha'=>$fecha, 'componente'=>$componente, 'probabilidad'=>$probabilidad);

$respuesta = $cliente->call("MiFuncion", $parametros);

echo $respuesta;

?>