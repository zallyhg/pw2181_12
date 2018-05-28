<?php
include 'conexiones.php';
function borrarusuario(){
	$respuesta=false;
	//variable php y arreglo post
	$usuario=GetSQLValueString($_POST["usuario"],"text");
	//conectarnos al servidor de BD.
	$con=conecta();
	//$consulta="select * from usuarios where usuario ='".$usuario."'limit 1";
	$consulta=sprintf("delete from usuarios where usuario = %s", $usuario);
	mysqli_query($con,$consulta);
	//checar. en otras
	//Si ya existe en la tabla el usuario

	if (mysqli_affected_rows($con)  > 0) { //cantidad de registro afectados
		$respuesta=true;
	}


	$salidaJSON = array('respuesta' => $respuesta);
	print json_encode($salidaJSON);
}

//array asociativo es como un diccionario pero sin indices, mas bien palabras
$opc=$_POST["opc"];
switch ($opc) {
	case 'borrarUsuario':
		borrarusuario();
		break;
	
	default:
		# code...
		break;
}

?>