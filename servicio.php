<?php

include_once 'lib/nusoap.php';
$servicio = new soap_server();

$ns = "urn:miserviciowsdl";
$servicio->configureWSDL("MiPrimerServicioWeb",$ns);
$servicio->schemaTargetNamespace = $ns;

$servicio->register("MiFuncion", array('fecha' => 'xsd:string','componente' => 'xsd:string', 'probabilidad' => 'xsd:float'), array('return' => 'xsd:string'), $ns );

function MiFuncion($fecha, $componente, $probabilidad){

	$resultadoDisponibilidad = $probabilidad*100;
	$resultado = "La dispnibilidad del componente " . $componente . " en la fecha: " . $fecha . " es: " . $resultadoDisponibilidad;	
	return $resultado;
 
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$servicio->service($HTTP_RAW_POST_DATA);


?>