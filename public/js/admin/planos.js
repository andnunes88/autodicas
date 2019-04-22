$(function(){

	var quantidade_anuncio;
	var preco_individual_anuncio;
	var valor_total;

	$("#quantidade_anuncio").keyup(function(){

		quantidade_anuncio = $("#quantidade_anuncio").val();

		$("#qdt_anuncio").text(quantidade_anuncio);

		valor_total = quantidade_anuncio * 5;

		$("#total_anuncio").text(valor_total + ' R$');
    	//alert(quantidade_anuncio);

  	});

});
