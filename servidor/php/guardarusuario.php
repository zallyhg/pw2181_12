<?php
include 'conexiones.php';
function guardarusuario(){
	$respuesta=false;

	//variable php y arreglo post
	$usuario=GetSQLValueString($_POST["usuario"],"text");
	$nombre=GetSQLValueString($_POST["nombre"],"text");
	$clave = GetSQLValueString(md5($_POST["clave"]),"text");
	//conectarnos al servidor de BD.
	$con=conecta();
	//$consulta="select * from usuarios where usuario ='".$usuario."'limit 1";
	$consulta=sprintf("select usuario from usuarios where usuario = %s", $usuario);
	$resConsulta=mysqli_query($con,$consulta);
	$consultaGuarda="";
	//Si ya existe en la tabla el usuario
	if (mysqli_num_rows($resConsulta) > 0) {
		//actualizamos
		$consultaGuarda=sprintf("update usuarios set nombre= %s,clave= %s, 
			where usuario = %s",$nombre,$clave,$usuario);
	}else{
		$consultaGuarda=sprintf("insert into usuarios values(default,%s,%s,%s)",$usuario,$nombre,$clave);
	}
	mysqli_query($con,$consultaGuarda); //ejecuta la consulta
	if (mysqli_affected_rows($con)  > 0) { //cantidad de registro afectados
		$respuesta=true;
	}



	$salidaJSON = array('respuesta' => $respuesta,'nombre'=> $nombre ,'clave' => $clave );

	var_dump($salidaJSON);
	print json_encode($salidaJSON);
}

//array asociativo es como un diccionario pero sin indices, mas bien palabras
$opc=$_POST["opc"];
switch ($opc) {
	case 'guardarUsuario':
		guardarusuario();
		break;
	
	default:
		# code...
		break;
}

?>