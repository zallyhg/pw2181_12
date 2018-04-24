// son equivalentes:  jquery = $ 
var inicia = function () {
	alert("pagina lista")


	var nuevo = function(){
		$.ajax({
			url: 'https://randomuser.me/api/',
			dataType: 'json',
			success: function(data) {
				console.log(data);
				$("#nombre").html(data.results[0].name.first+" " +data.results[0].name.last);
				$("#foto").attr("src", data.results[0].picture.large);
			}
		});
	}
	$("#btnNuevo").on("click",nuevo);
	//$("#btnNuevo").off("click",nuevo);
}

$(document).ready(inicia);
