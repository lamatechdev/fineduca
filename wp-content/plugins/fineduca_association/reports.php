<?php
/* 
 * FINEDUCA REPORTS 
 */
// create top level admin menu
add_action('admin_menu', 'endo_fineduca_report_admin_menu');

function endo_fineduca_report_admin_menu() {
  add_menu_page('Fineduca Reports', 'Fineduca Reports', 10, 'endo_fineduca_report', 'endo_admin_fineduca_report_page');
}

function endo_admin_fineduca_report_page() {
    wp_enqueue_script('jquery');
    wp_enqueue_style( 'data_table_style' );
    wp_enqueue_style( 'jquery_ui_style' );
    ?>
    <script type="text/javascript" src="<?php echo plugins_url( 'fineduca_association/js/jquery.dataTables.js', dirname(__FILE__) ); ?>"></script>
    <script type="text/javascript" src="<?php echo plugins_url( 'fineduca_association/js/jquery-ui.js', dirname(__FILE__) ); ?>"></script>
    <script type="text/javascript" src="<?php echo plugins_url( 'fineduca_association/js/ajax_emails.js', dirname(__FILE__) ); ?>"></script>

<script>
   jQuery(document).ready(function( $ ){
    $( "#tabs" ).tabs();

            // DataTable
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
            var table_assoc = $('#users').DataTable(config_datatable);
            var table_event = $('#users_encontro').DataTable(config_datatable);

            $('.filtro_assoc').on('keyup', function(){
                 table_assoc
                    .columns( this.id )
                    .search( this.value )
                    .draw(); 
             });
            $('.filtro_event').on('keyup', function(){
                 table_event
                    .columns( this.id )
                    .search( this.value )
                    .draw(); 
             });
        } );
</script>

<?php
    global $wpdb;
    $sql = "SELECT 
        u.ID as user_id, 
        u.user_email, 
        u.user_registered, 
        group_concat(um.meta_value SEPARATOR ';') as user_data
    FROM 
        $wpdb->users u
        JOIN $wpdb->usermeta um ON u.ID=um.user_id
    WHERE 
        (um.meta_key LIKE 'first_name' OR um.meta_key LIKE 'last_name' OR um.meta_key LIKE 'cpf' OR um.meta_key LIKE 'ocupacao' OR um.meta_key LIKE 'billing_city' OR um.meta_key LIKE 'billing_state' ) AND  
        u.user_nicename NOT LIKE 'admin'
    GROUP BY u.ID";
    $users = $wpdb->get_results($sql , OBJECT );
    ?>
    <br class="clear" />
        <h1>Relatórios Fineduca</h1>
    <br class="clear" />
    <div id="tabs">
  <ul>
    <li><a href="#tabs-1">Associados 2017</a></li>
    <li><a href="#tabs-2">Inscritos V Encontro Fineduca 2017</a></li>
  </ul>
  <div id="tabs-1">
        <h1>Associados Fineduca 2017</h1>
        <br class="clear" />
        <div>
            <h2 id='title' style="display:inline-table;">Filtros:</h2>
            <input type="text" class="filtro_assoc" id="4" placeholder="Procurar Ocupação">
            <input type="text" class="filtro_assoc" id="6" placeholder="Procurar Estado">
            <input type="text" class="filtro_assoc" id="7" placeholder="Procurar Status">
        </div>
        <table id="users" class="users display">
        <thead>
            <tr>
                <th>Perfil</th>
                <th>CPF</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ocupação</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Status</th>
                <th>Data Filiação</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $status = array('trash'=>'Excluído', 'wc-cancelled'=>'Cancelado', 'wc-on-hold'=>'Aguardando', 'wc-processing'=>'Pago', 'wc-completed'=>'Pago');

        foreach ($users as $user) {
            $dados_usuario = explode(";", $user->user_data);
            $nome = $dados_usuario[0]." ".$dados_usuario[1];
            $cpf = $dados_usuario[2];
            $cidade = $dados_usuario[3];
            $estado = $dados_usuario[4];
            $ocupacao = $dados_usuario[5];

            $sql = "SELECT 
                        p.post_status as order_status
                    FROM 
                        $wpdb->postmeta pm 
                        JOIN $wpdb->posts p ON pm.post_id=p.ID
                        JOIN {$wpdb->prefix}woocommerce_order_items o ON p.ID=o.order_id 
                    WHERE 
                        pm.meta_key like '_customer_user' AND 
                        o.order_item_name like 'Anuidade 2017%' AND
                        pm.meta_value like '".$user->user_id."'";
            $pedidos = $wpdb->get_results($sql , OBJECT );
            if(!empty($pedidos)){
                echo "<tr>
                        <td><a href='".self_admin_url('user-edit.php?user_id='.$user->user_id)."' >Ver</a></td>
                        <td>".$cpf."</td>
                        <td>".$nome."</td>
                        <td>".$user->user_email."</td>
                        <td>".$ocupacao."</td>
                        <td>".$cidade."</td>
                        <td>".$estado."</td>
                        <td>".$status[end($pedidos)->order_status]."</td>
                        <td>".date("d/m/Y \à\s H\hi\m", strtotime($user->user_registered))."</td>
                     </tr>";
             }
        }
        ?>
        </tbody>
    </table>
</div>
<div id="tabs-2">
    <h1>Inscritos V Encontro Fineduca 2017</h1>
    <br class="clear" />
    <div>
        <h2 id='title' style="display:inline-table;">Filtros:</h2>
        <input type="text" class="filtro_event" id="4" placeholder="Procurar Ocupação">
        <input type="text" class="filtro_event" id="6" placeholder="Procurar Estado">
        <input type="text" class="filtro_event" id="7" placeholder="Procurar Status">
    </div>
    <table id="users_encontro" class="users display">
    <thead>
        <tr>
            <th>Perfil</th>
            <th>CPF</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ocupação</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Status</th>
            <th>Data Filiação</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $status = array('trash'=>'Excluído', 'wc-cancelled'=>'Cancelado', 'wc-on-hold'=>'Aguardando', 'wc-processing'=>'Pago', 'wc-completed'=>'Pago');

    foreach ($users as $user) {
        $dados_usuario = explode(";", $user->user_data);
        $nome = $dados_usuario[0]." ".$dados_usuario[1];
        $cpf = $dados_usuario[2];
        $cidade = $dados_usuario[3];
        $estado = $dados_usuario[4];
        $ocupacao = $dados_usuario[5];

        $sql = "SELECT 
                    p.post_status as order_status
                FROM 
                    $wpdb->postmeta pm 
                    JOIN $wpdb->posts p ON pm.post_id=p.ID
                    JOIN {$wpdb->prefix}woocommerce_order_items o ON p.ID=o.order_id 
                WHERE 
                    pm.meta_key like '_customer_user' AND 
                    o.order_item_name like 'Encontro FINEDUCA 2017' AND
                    pm.meta_value like '".$user->user_id."'";
        $pedidos = $wpdb->get_results($sql , OBJECT );
        if(!empty($pedidos)){
            echo "<tr>
                    <td><a href='".self_admin_url('user-edit.php?user_id='.$user->user_id)."' >Ver</a></td>
                    <td>".$cpf."</td>
                    <td>".$nome."</td>
                    <td>".$user->user_email."</td>
                    <td>".$ocupacao."</td>
                    <td>".$cidade."</td>
                    <td>".$estado."</td>
                    <td>".$status[end($pedidos)->order_status]."</td>
                    <td>".date("d/m/Y \à\s H\hi\m", strtotime($user->user_registered))."</td>
                 </tr>";
         }
    }
    ?>
    </tbody>
</table>
</div>
</div>
<br class="clear" />
<h1>Lista de E-mails</h1>
<table class="form-table">
    <tbody>
        <tr>
            <th>
                <form id="form-ajax-emails" method="post" action="">​
                    <label for="situacao">Situação:</label>
                    <input type="hidden" name="action" value="get_emails">​
                    <input name="situacao" value="todos" id="todos" checked="checked" type="radio">&nbsp;Todos&nbsp;&nbsp;
                    <input name="situacao" value="quites" id="quites" type="radio">&nbsp;Quites&nbsp;&nbsp;
                    <input name="situacao" value="naoquites" id="naoquites" type="radio">&nbsp;Não quites
                    <br /><br />
                    <textarea rows="4" cols="150" id="retorno_email" onclick="this.focus();this.select()" readonly="readonly" ></textarea>
                </form>​
            </th>
        </tr>
    </tbody>
</table>

    <?php 
}
