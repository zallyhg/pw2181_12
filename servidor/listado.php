<?php  
include 'conexiones.php';
function listado(){
	$respuesta=false;
	//conectarnos al servidor de BD.
	$con=conecta();
	$consulta=sprintf("select * from usuarios order by nombre", $usuario);
	$resConsulta=mysqli_query($con,$consulta);
	tabla="";

	if (mysqli_num_rows($resConsulta)  > 0) { //cantidad de registro afectados
		$respuesta=true;
		$tabla.="<thead>";
		$tabla.="<tr>"; //concatena el .
		$tabla.="<th>No.</th><th>Usuario</th><th>Nombre</th>";
		$tabla.="</tr>";
		$tabla.="</thead>";
		$tabla.="<tbody>";
		$cuenta=0;
			while ($registro=mysqli_fetch_array($resConsulta)) {
				$cuenta=$cuenta + 1;
				$tabla.="<tr>";
				$tabla.="<td>".$cuenta."</td>";
				$tabla.="<td>".$registro["usuario"]." </td>";
				$tabla.="<td>".$registro["nombre"]." </td>";
				$tabla.="</tr>";
			}
		$tabla.="<tbody>";
	}


	$salidaJSON = array('respuesta' => $respuesta,
						'tabla' =>$tabla);
	print json_encode($salidaJSON);
}

//array asociativo es como un diccionario pero sin indices, mas bien palabras
$opc=$_POST["opc"];
switch ($opc) {
	case 'listado':
		listado();
		break;
	
	default:
		# code...
		break;
}

?>