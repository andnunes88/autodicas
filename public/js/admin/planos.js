$(function(){

	var quantidade_anuncio;
	var preco_individual_anuncio;
	var valor_total;

	$("#quantidade_anuncio").focusout(function(){

		quantidade_anuncio = $("#quantidade_anuncio").val();

		$("#qdt_anuncio").text(quantidade_anuncio);

		valor_total = quantidade_anuncio * 5;

		$("#total_anuncio").text((valor_total).toFixed(2) + ' R$');
    	//alert(quantidade_anuncio);

  	});

});
