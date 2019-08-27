$(function(){
	
	$("#telefone").click(function(){
		
		var numero = $("#telefone").val();

		$("#telefone").text(numero);
		
		var id_anuncio = $("#anuncio_id").val();

		$.ajax({

			url: "/conta-contato/" + id_anuncio,
			type: "get",			
			success: function(data){						

				console.log(data);
			}

		});

	});

});