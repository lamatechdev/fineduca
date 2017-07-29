jQuery.noConflict();
(function( $ ) {
  $(function() {
    $("#reg_sr_firstname, #reg_sr_lastname").closest('p').hide();
    
    $.mask.definitions['~'] = "[+-]";
    $("#reg_billing_cpf, #cpf").mask("999.999.999-99");
    $("#reg_billing_birthdate").mask("99/99/9999");
    $("#reg_billing_postcode").mask("99999-999");
    $('#reg_billing_cellphone').mask("(99) 99999-999?9");
    $('#reg_billing_phone, #reg_billing_phone_company').mask("(99) 9999-9999?9");

    //Quando o campo cep perde o foco.
    $("#reg_billing_postcode").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            $("#reg_billing_address_1, #reg_billing_neighborhood, #reg_billing_city").val("Carregando...");
            $("#reg_billing_state").val("");

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Consulta o webservice viacep.com.br/
                $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#reg_billing_address_1").val(dados.logradouro);
                        $("#reg_billing_neighborhood").val(dados.bairro);
                        $("#reg_billing_city").val(dados.localidade);
                        $("#reg_billing_state").val(dados.uf);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        alert("CEP não encontrado.");
	    		         $("#reg_billing_address_1, #reg_billing_neighborhood, #reg_billing_city, #reg_billing_state").val("");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                alert("Formato de CEP inválido.");
	            $("#reg_billing_address_1, #reg_billing_neighborhood, #reg_billing_city, #reg_billing_state").val("");
            }
        } 
    });
   
 });
})(jQuery);