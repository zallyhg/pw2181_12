<?php
include 'conexiones.php';
function buscarusuario(){
	//variable php y arreglo post
	$usuario=$_POST["usuario"];
	//conectarnos al servidor de BD.
	$con=conecta();
	$consulta="select * from usuarios where usuario ='".$usuario."'limit 1";
	$resConsulta=mysqli_query($con,$consulta);
	if (mysqli_num_row($resConsulta) > 0) {
		
		$respuesta=true;
		while ($regConsulta=mysqli_fetch_array($resConsulta)) {
			$nombre=$regConsulta["nombre"];
			$nombre=$regConsulta["classkit_method_remove(classname, methodname)"];
		}
	}
	$salidaJSON = array('respuesta' => $respuesta,'nombre'=> $nombre ,'clave' => $clave );
	print json_encode($salidaJSON);
}

//array asociativo es como un diccionario pero sin indices, mas bien palabras
$opc=$_POST["opc"];
switch ($opc) {
	case 'buscarUsuario':
		buscarusuario();
		break;
	
	default:
		# code...
		break;
}

?>