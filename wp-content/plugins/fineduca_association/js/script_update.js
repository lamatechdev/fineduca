jQuery(document).ready(function( $ ){
    
    //check radios
    $('input:radio[name="sex"][value="'+$("#sex").val()+'"]').prop('checked', true);
    $('input:radio[name="ocupacao"][value="'+$("#ocupacao").val()+'"]').prop('checked', true);
    $('input:radio[name="titulacao"][value="'+$("#titulacao").val()+'"]').prop('checked', true);
    carregaEnd($("#billing_postcode").val());

    //masks
    $.mask.definitions['~'] = "[+-]";
    $("#cpf").mask("999.999.999-99");
    $("#birthdate").mask("99/99/9999");
    $("#billing_postcode").mask("99999-999");
    $('#cellphone').mask("(99) 99999-999?9");
    $('#phone, #phone_company').mask("(99) 9999-9999?9");

    //Quando o campo cep perde o foco.
    $("#billing_postcode").blur(function() {
      carregaEnd($(this).val());
        
    });
function carregaEnd(cep){
       //Nova variável "cep" somente com dígitos.
        var cep = cep.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            $("#billing_address_1, #billing_neighborhood, #billing_city").val("Carregando...");
            $("#state").val("");

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Consulta o webservice viacep.com.br/
                $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                    $("#billing_address_1").val(dados.logradouro);
                    $("#billing_neighborhood").val(dados.bairro);
                    $("#billing_city").val(dados.localidade);
                    $("#state").val(dados.uf);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        alert("CEP não encontrado.");
	    		 $("#billing_address_1, #billing_neighborhood, #billing_city, #state").val("");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                alert("Formato de CEP inválido.");
		 $("#billing_address_1, #billing_neighborhood, #billing_city, #state").val("");
            }
        } 
}
   
 });

