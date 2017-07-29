jQuery(document).ready(function( $ ){
    
    //hide unwanted fields
    $("h2:contains('Opções pessoais')").next('.form-table').hide();
    $("h2:contains('Opções pessoais')").hide();
    $("h2:contains('Nome')").hide();
    $("h2:contains('Endereço de Cobrança do Cliente')").text("Endereço");
    $("h2:contains('Endereço de Envio do Cliente')").next('.form-table').hide();
    $("h2:contains('Endereço de Envio do Cliente')").hide();
    $("#billing_first_name, #billing_last_name, #billing_cpf, #billing_phone, #billing_cellphone, #billing_email, #billing_country").parent().parent().hide();
    $("label[for='billing_address_1']").text("Logradouro");
    $("#billing_state").next().next().hide();
});