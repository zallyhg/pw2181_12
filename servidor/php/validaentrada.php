<?php
include 'conexiones.php';
function valida(){
	$respuesta=false;
	//variable php y arreglo post
	$usuario=$_POST["usuario"];
	$clave  =md5($_POST["clave"]);
	//conectarnos al servidor de BD.
	$con=conecta();
	$consulta="select * from usuarios where usuario ='".$usuario."' and clave='".$clave."' limit 1";
	//echo $consulta;
	$resConsulta=mysqli_query($con,$consulta);
	if (mysqli_num_rows($resConsulta) > 0) {
		
		$respuesta=true;
	}
	$salidaJSON = array('respuesta' => $respuesta );
	print json_encode($salidaJSON);
}
//array asociativo es como un diccionario pero sin indices, mas bien palabras
$opc=$_POST["opc"];
switch ($opc) {
	case 'validaentrada':
		valida();
		break;
	
	default:
		# code...
		break;
}

?>