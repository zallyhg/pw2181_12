var inicioApp = function(){
	var Aceptar= function{
		var usuario=$("#txtUsuario").val();
		var clave =$("#txtClave").val();
		var parametros="opc=validaentrada"+"&usuario"+usuario+"&clave"+clave+"&aleatorio"+Math.random();

		$.ajax({
			cache:false,
			type: "POST",
			dataType: "json",
			url: "php/validaentrada.php",
			data: parametros,
			succes: function(response){
				if (response.respuesta)==true{
					alert("Bienvenido");
					//ocultamos el inicio
					$("#secInicio").hide("slow");
					//aparecer usuarios
					$("#frmUsuarios").show("slow");
					//cursor en el primer cuadro de texto
					$("#txtNombreUsuario").focus();

				} else {
					alert("Usuario o clave incorrecto(s)");
				}
			},
			error: function(xhr,ajaxOptions,thrownError){

			}
		});
	}
	var buscarUsuario = function(){
		var usuario =$("#txtNombreUsuario").val();
		var parametros="opc=buscarUsuario"+
		"&usuario="+usuario+
		"&aleatorio="+Math.random();
		if(usuario != ""){


			$.ajax({
				cache:false,
				type: "POST",
				dataType: "json",
				url: "php/validaentrada.php",
				data: parametros,
				succes: function(response){
					if (response.respuesta)==true{
						alert("Bienvenido");

						$("#txtNombre").val(response.nombre);

						$("#txtClaveUsuario").val(response.clave);
					//cursor en  2 cuadro de texto
					

				} else {
					alert("Usuario o clave incorrecto(s)");
					$("#txtNombre").focus();
				}
			},
			error: function(xhr,ajaxOptions,thrownError){

			}
		});
		}
	}

	var Guardar= function{
		var usuario =$("#txtNombreUsuario").val();
		var nombre =$("#txtNombre").val();
		var clave =$("#txtClaveUsuario").val();
		var parametros="opc=guardarUsuario"+
		"&usuario="+usuario+
		"&clave="+clave+
		"&nombre"+nombre+
		"&aleatorio"+Math.random();
		if (usuario!="" && nombre!="" && clave!="") {
			$.ajax({
				cache:false,
				type: "POST",
				dataType: "json",
				url: "php/guardarusuario.php",
				data: parametros,
				succes: function(response){
					if (response.respuesta)==true{
						alert("datos guardados correctamente");
						$("#frmUsuarios">input).val();

					} else {
						alert("Ocurrio un error intente mas tarde");
					}
				},
				error: function(xhr,ajaxOptions,thrownError){

				}
			});

		}else{
			alert("Llene todos los campos");
		}
	}
	var teclaNombreUsuario = function(tecla){
		if (tecla.which==13) {//enter 10 + 13
			buscarUsuario();
		}
	}

	var Borrar = function () {
		var usuario = $("#txtNombreUsuario").val();
		var nombre = $("#txtNombre").val();
		var pregunta = prompt("Seguro de borrar a"+nombre+"?", "No");
		var parametros = "opc=borrarUsuario"+
		"&usuario="+usuario+
		"&nombre"+nombre;

		if (pregunta != null&&pregunta=="si") {
			//ajax

			$.ajax({
				url: "php/borrarusuario.php",
				type: 'POST',
				data: parametros,
				succes: function(response){
					if (response.respuesta)==true{
						alert("Se ha eliminado exitosamente");	
						$("#frmUsuarios > input").val("");

				} else {
					alert("Datos incorrecto(s)");
					
				}
			},
			});
			
		}
	}

	var Listado = function(){
		$("main > section").hide("slow");
		$("#frmListado").show("slow");
		$.ajax({
				url: "php/listado.php",
				type: 'POST',
				data: parametros,
				succes: function(response){
					if (response.respuesta)==true{
						alert("");	
						

				} else {
					alert("Datos incorrecto(s)");
					
				}
			},
			});
	}

	$("#btnAceptar").on("click",Aceptar);
	$("#txtNombreUsuario").on("keypress", teclaNombreUsuario);
	$("#btnGuardar").on("click",Guardar);
	$("#btnBorrar").on("click",Borrar);
	$("#btnListado").on("click",Listado);
}
$(document).ready(inicioApp);