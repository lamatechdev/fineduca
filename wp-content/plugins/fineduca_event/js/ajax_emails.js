jQuery(document).ready(function( $ ){

    get_emails('todos');
    
    $("input[name='situacao']").click(function() {
        
        get_emails($(this).val());

        return false;
    });

    function get_emails(situacao){
        $("#retorno_email").text("Carregando...");

        // Montagem do objeto que será transmitido na requisição AJAX.​
        var dados = { 
          // Este é o sinal para o wordpress de qual função PHP será usada. Comporá o nome da action como veremos a seguir.​
          'action': 'get_emails',  
          'situacao': situacao
        };

        // Envia para o endereço (parâmetro 1, montado segundo explicado lá em cima) os dados (parâmetro 2). Como terceiro parâmetro passamos a função a ser executada no fim do processo, com a resposta.​
        var url = 'http://localhost/fineduca/wp-admin/admin-ajax.php';//'http://www.fineduca.org.br/wp-admin/admin-ajax.php';
        $.post(url, dados, function(resposta) { 
          // Coloca na div com id form-ajax-resposta a resposta enviada pelo servidor, que aqui presume-se ser texto puro.​
           $("#retorno_email").text(resposta.emails);
           $("input[name='situacao']").each(function(){
              $(this).prop( "checked", false );
           });
           $("#"+situacao).prop( "checked", true );
           
        }, 'json');
    }
});