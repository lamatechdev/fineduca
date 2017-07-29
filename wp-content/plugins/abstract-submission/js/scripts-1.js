jQuery(document).ready(function( $ ){
    
    var str = window.location.href.toString();
    if (str.search( 'encontro-fineduca/submissao' ) != -1 ){
        $(".cpf").mask("999.999.999-99");
        var ext = $("input[name='attachment']").val().split(".");
        ext = ext[ext.length-1];
        if($("input[name='title']").val()!="" && $("input[name='cpf_author']").val()!=""  && $("select[name='thematic_axis']").val()!="" && $("input[name='attachment']").val()!="" && (ext=="doc" || ext=="docx")){
            $('button').removeAttr('disabled');
            $('.obs').css('display','none');
        } else {
            $('button').attr('disabled', 'disabled');
            console.log($('.obs'));
            $('.obs').css('display','block');
        }
    }

    $('form :input').change(function(){
        if (str.search( 'encontro-fineduca/submissao' ) != -1 ){
            var ext = $("input[name='attachment']").val().split(".");
            ext = ext[ext.length-1];
            if($("input[name='title']").val()!="" && $("input[name='cpf_author']").val()!="" && $("select[name='thematic_axis']").val()!="" && $("input[name='attachment']").val()!="" && (ext=="doc" || ext=="docx")){
                $('button').removeAttr('disabled');
                $('.obs').css('display','none');
            } else {
                $('button').attr('disabled', 'disabled');
                $('.obs').css('display','block');
            }
        }
    });
 });

