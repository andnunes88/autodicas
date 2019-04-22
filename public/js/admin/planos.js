$(function(){

	var quantidade_anuncio;
	var preco_individual_anuncio;
	var valor_total;

	$("#quantidade_anuncio").blur(function(){

		quantidade_anuncio = $("#quantidade_anuncio").val();

		$("#qdt_anuncio").text(quantidade_anuncio);

		valor_total = quantidade_anuncio * 5;

		$("#total_anuncio").text(valor_total);
    	//alert(quantidade_anuncio);

  	});

});
