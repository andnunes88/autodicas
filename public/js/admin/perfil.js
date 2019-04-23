$(function(){

	$("#estado_id").change(function(){
		
		var id_estado = $("#estado_id").val();

		$.ajax({

			url: "/cidades/" + id_estado,
			type: "get",
			dataType: "Json",
			success: function(data){
				
				$("#cidades_id").removeAttr("disabled");
				
				var selectbox = $('#cidades_id');

				selectbox.find('option').remove();

				$.each(data, function (indice, valor) {
                    $('<option>').val(valor.id).text(valor.cidade_nome).appendTo(selectbox);
                });

				console.log(data);
			}

		});

	});

});

$("#cpfcnpj").keydown(function(){
    try {
    	$("#cpfcnpj").unmask();
    } catch (e) {}
    
	var tamanho = $("#cpfcnpj").val().length;
	
    if(tamanho < 11){
		$("#cpfcnpj").mask("999.999.999-99");
    } else if(tamanho >= 11){
        $("#cpfcnpj").mask("99.999.999/9999-99");
    }
    
    var elem = this;
    setTimeout(function(){
    	elem.selectionStart = elem.selectionEnd = 10000;
    }, 0);
    
    var currentValue = $(this).val();
    $(this).val('');
    $(this).val(currentValue);
});


$('input[type=radio][name=tipo]').change(function(){
	if(this.value == 'particular') {
		$('#cpfcnpj').attr('name', 'cpf');
		$('#cpfcnpj').removeAttr('disabled');
	} else {
		$('#cpfcnpj').attr('name', 'cnpj');
		$('#cpfcnpj').removeAttr('disabled');
	}
});