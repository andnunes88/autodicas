$(function(){

	$("#estado_id").change(function(){
		
		var id_estado = $("#estado_id").val();

		$.ajax({

			url: "/cidades/" + id_estado,
			type: "get",
			dataType: "Json",
			success: function(data){
				
				$("#cidades").removeAttr("disabled");
				
				var selectbox = $('#cidades');

				selectbox.find('option').remove();

				$.each(data, function (indice, valor) {
                    $('<option>').val(valor.id).text(valor.cidade_nome).appendTo(selectbox);
                });

				console.log(data);
			}

		});

	});

});