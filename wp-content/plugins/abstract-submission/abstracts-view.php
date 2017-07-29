<?php

if($_POST){
	$result = $wpdb->update($wpdb->prefix."submitted_abstracts", array('avaliacao'=>$_POST['avaliacao'], 'observacao'=>$_POST['observacao']), array('id'=>$_POST['id']),array('%d', '%s'),array('%d'));
}

$abstracts = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."submitted_abstracts ORDER BY data DESC");
wp_enqueue_style( 'jquery_ui_style' );
?>
<link type="text/css" rel="stylesheet" href="<?php echo get_bloginfo('wpurl') ?>/wp-content/plugins/fineduca_association/css/jquery.dataTables.css" />
<script type="text/javascript" src="<?php echo get_bloginfo('wpurl') ?>/wp-content/plugins/abstract-submission/js/jquery-1.8.3.min.js" ></script>
<script type="text/javascript" src="<?php echo get_bloginfo('wpurl') ?>/wp-content/plugins/fineduca_association/js/jquery.dataTables.js" ></script>
<script type="text/javascript" src="<?php echo get_bloginfo('wpurl') ?>/wp-content/plugins/fineduca_association/js/jquery-ui.js" ></script>
<script type="text/javascript" src="<?php echo get_bloginfo('wpurl') ?>/wp-content/plugins/abstract-submission/js/scripts-1.js" ></script>
<script>

	function abs_delete_confirm(id) {
		if(confirm('Do you really want to delete the abstract and all his attachments?')) {
			location.href = "admin.php?page=abstract-submission/abstract-submission.php&id="+id+"&delete=true";
		}
	}
	
	function countChar(val) {
        var len = val.value.length;
        $('#charNum').text(1500 - len);
      };

	jQuery(document).ready(function( $ ){

		dialog = $( "#div-form-avaliar" ).dialog({
	      autoOpen: false,
	      height: 400,
	      width: 400,
	      modal: true,
	      buttons: {
	        "Salvar": function() {
	          $("#form-avaliar").submit();
	        },
	        "Cancelar": function() {
	          dialog.dialog( "close" );
	        }
	      }
	    });
 

		$( ".btn-avaliar" ).click(function() {
			$("#form-avaliar #id_submitted").val($(this).attr('id'));
			$("#form-avaliar #avaliacao").html($("#avaliacao-"+$(this).attr('id')).html());
			$("#form-avaliar #observacao").html($("#observacao-"+$(this).attr('id')).html());
			$(".ui-dialog-title").html("Avaliar Submissão ID: 2017."+ ('000' + ($(this).attr('id')-20)).slice(-3));
	      	dialog.dialog( "open" );
	    });

	     var config_datatable = {
	        "iDisplayLength": 20,
	        "aLengthMenu": [[10, 20, 40, 60, -1], [10, 20, 40, 60, "Todos"]],
	        "language": {
	            "sEmptyTable": "Nenhum registro encontrado",
	            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
	            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
	            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
	            "sInfoPostFix": "",
	            "sInfoThousands": ".",
	            "sLengthMenu": "_MENU_ resultados por página",
	            "sLoadingRecords": "Carregando...",
	            "sProcessing": "Processando...",
	            "sZeroRecords": "Nenhum registro encontrado",
	            "sSearch": "Pesquisar em qualquer coluna",
	            "oPaginate": {
	                "sNext": "Próximo",
	                "sPrevious": "Anterior",
	                "sFirst": "Primeiro",
	                "sLast": "Último"
	            },
	            "oAria": {
	                "sSortAscending": ": Ordenar colunas de forma ascendente",
	                "sSortDescending": ": Ordenar colunas de forma descendente"
	            }
	        }
	    }
	    var table_event = $('#table-event').DataTable(config_datatable);

	    $('.filtro_even').on('keyup', function(){
	         table_event
	            .columns( this.id )
	            .search( this.value )
	            .draw(); 
	     });

	    $('.filtro_even_select').change(function(){
         table_event
            .columns( 6 )
            .search( this.value )
            .draw(); 
     	});

	 });

</script>
<div class="wrap"> 
	<div id="icon-edit-pages" class="icon32"><br /></div> 
<h2><strong>Trabalhos Submetidos para o V Encontro Fineduca 2017</strong></h2><br>
<!-- <button onClick="salvarAvaliacao()"style="position:absolute;right:20px;top: 70px;">Salvar Avaliações</button> -->

<div class="clear"></div> 
<div>
    <h2 id='title' style="display:inline-table;">Filtros:</h2>
    <input type="text" class="filtro_even" id="1" placeholder="Procurar Eixo Temático">
    <input type="text" class="filtro_even" id="2" placeholder="Procurar Título">
    <input type="text" class="filtro_even" id="3" placeholder="Procurar Autor">
    <input type="text" class="filtro_even" id="4" placeholder="Procurar Coautor">
    <select class="filtro_even_select" style="margin-top:-5px">
    	<option value="" selected>Escolher Status</option>
    	<option value="Em Análise">Em Análise</option>
    	<option value="Aceito">Aceito</option>
    	<option value="Não Aceito">Não Aceito</option>
    </select>
</div>
<br>
<table id="table-event" class="users display" cellspacing="0"> 
  <thead> 
  <tr> 
  	<th>Id.</th>
    <th>Eixo Temático</th>
	<th>Título</th> 
	<th>Autor</th> 
	<th>Coautores</th>
	<th>Data</th> 
	<th>Status de Avaliação</th> 
	<th></th> 
  </tr> 
  </thead> 
  
  <tbody> 
<?php

foreach($abstracts as $abstract) {
	$aux = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."abstracts_attachments WHERE abstracts_id=".$abstract->id);
	$archive = $aux[0];
?>
  <tr> 
    <td style="width: 5%;"><?php echo "2017.".str_pad(($abstract->id-20), 3, '0', STR_PAD_LEFT) ?></td>
    <td style="width: 25%;"><?php echo $abstract->thematic_axis ?></td>
	<td style="width: 30%;"><a href="<?php echo $archive->fileurl ?>"><?php echo $abstract->title ?></a></td>
	<td style="width: 15%;"><a href="<?php echo self_admin_url('user-edit.php?user_id='.$abstract->author) ?>"><?php echo get_user_meta($abstract->author,"billing_full_name",true); ?></a></td>
	<td style="width: 15%;">
	<?php if($abstract->co_author1>0){ ?>
		<span style="font-weight: bold;">1- </span><a href="<?php echo self_admin_url('user-edit.php?user_id='.$abstract->co_author1) ?>"><?php echo get_user_meta($abstract->co_author1,"billing_full_name",true) ?> </a>
		<?php if($abstract->co_author2>0){ ?><hr/><span style="font-weight: bold;">2- </span>
			<a href="<?php echo self_admin_url('user-edit.php?user_id='.$abstract->co_author2) ?>"><?php echo get_user_meta($abstract->co_author2,"billing_full_name",true); ?></td> 
		<?php } ?>
	<?php } ?>
	<td style="width: 5%;"><?php echo date('d/m/Y',  strtotime($abstract->data)); ?></td>
	<td style="width: 5%;">
		<?php if ($abstract->avaliacao=="0") echo "Em Análise";
			else if ($abstract->avaliacao=="1") echo "Aceito";
			else echo "Não Aceito";
		?>
	</td>
	<td>
	    <select name="avaliacao-<?php echo $abstract->id ?>" id="avaliacao-<?php echo $abstract->id ?>" style="display: none;">
	    	<option value="0" <?php echo ($abstract->avaliacao=="0" ? "selected" : "")?>>Em Análise</option>
	    	<option value="1" <?php echo ($abstract->avaliacao=="1" ? "selected" : "")?>>Aceito</option>
	    	<option value="2" <?php echo ($abstract->avaliacao=="2" ? "selected" : "")?>>Não Aceito</option>
	    </select>
		<textarea maxlength="500" style="display: none;" name="observacao-<?php echo $abstract->id ?>" id="observacao-<?php echo $abstract->id ?>"><?php echo $abstract->observacao ?></textarea> 

		<button type="button" style="cursor:pointer;" class="btn-avaliar" id="<?php echo $abstract->id ?>"><?php echo ($abstract->avaliacao>0) ? "Ver Avaliação" : "Avaliar"; ?></button>
	</td>
  </tr> 
<?php } ?>
  </tbody> 
 </table>
 

<div id="div-form-avaliar" title="Avaliar Submissão">
<form method="post" id="form-avaliar">
<input type="hidden" name="id" id="id_submitted" value="">
	<div class="form-group">
		<label for="status">Status:</label><br/>
		<select class="form-control" name="avaliacao" id="avaliacao" style="width:100px">
		</select> 
	</div>
	<br/>
	<div class="form-group">
		<label for="observacao">Observação:</label><br/>
		<textarea class="form-control" maxlength="1500" cols="45" rows="9" name="observacao" id="observacao" onkeyup="countChar(this)"></textarea><br/>
		<small id="contTextArea" class="form-text text-muted">Caracteres restantes: <div style="display: inline; font-weight: bold;" id="charNum">1500</div></small>
	</div>
</form>
</div>

